@extends('layouts.app')
@permission('add_job_applications')
@section('create-button')
    <a href="{{ route('admin.job-applications.create') }}" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> @lang('app.createNew')</a>
@endsection
@endpermission
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{ route('admin.job-applications.table') }}" class="btn btn-sm btn-primary">@lang('app.tableView') <i class="fa fa-table"></i></a>
        </div>
    </div>
    <div class="container-scroll">
        <div class="row">        
            <div class="col-md-4">
                <div class="input-daterange input-group">
                    <input type="text" class="form-control" id="date-start" value="{{ $startDate }}" name="start_date">
                    <span class="input-group-addon bg-info b-0 text-white p-1">@lang('app.to')</span>
                    <input type="text" class="form-control" id="date-end" name="end_date" value="{{ $endDate }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="select2" name="jobs" id="jobs" data-style="form-control">
                        <option value="all">@lang('modules.jobApplication.allJobs')</option>
                        @forelse($jobs as $job)
                            <option title="{{ucfirst($job->title)}}" value="{{$job->id}}">{{ucfirst($job->title)}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="button" id="apply-filters" class="btn btn-success btn-sm col-md-6"><i class="fa fa-check"></i> @lang('app.apply')</button>
                    <button type="button" id="reset-filters" class="btn btn-info btn-sm col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> @lang('app.reset')</button>
                </div>
            </div>
        </div>
        <div class="row container-row"></div>
    </div>
    {{--Ajax Modal Start for--}}
    <div class="modal fade bs-modal-md in" id="scheduleDetailModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn blue">@lang('app.close')</button>
                </div>
            </div>
        </div>
    </div>
    {{--Ajax Modal Ends--}}
@endsection
@push('footer-script')
    <script>
        "use strict";

        loadData();

        $('#apply-filters').on('click', function(){
            loadData();
        });

        $('#reset-filters').on('click', function(){
            $('#date-start').val('{{ $startDate }}');
            $('#date-end').val('{{ $endDate }}');
            $('#jobs').val('all').trigger('change');

            loadData();
        })

        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
        {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });

        function createSchedule (id) {
            var url = "{{ route('admin.job-applications.create-schedule',':id') }}";
            url = url.replace(':id', id);
            $('#modelHeading').html('Schedule');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        function loadData () {
            var startDate = $('#date-start').val();
            var jobs = $('#jobs').val();

            if (startDate == '') {
                startDate = null;
            }

            var endDate = $('#date-end').val();

            if (endDate == '') {
                endDate = null;
            }

            var url = '{{route('admin.job-applications.index')}}?startDate=' + startDate + '&endDate=' + endDate + '&jobs=' + jobs;

            $.easyAjax({
                url: url,
                container: '.container-row',
                type: "GET",
                success: function (response) {
                    $('.container-row').html(response.view);
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }

            })
        }
    </script>
@endpush
