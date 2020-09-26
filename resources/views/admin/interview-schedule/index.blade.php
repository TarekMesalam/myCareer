@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            @permission('view_schedule')
                <a href="{{ route('admin.interview-schedule.table-view') }}" class="btn btn-sm btn-primary">@lang('app.tableView') <i class="fa fa-table"></i></a>
            @endpermission
            @permission('add_schedule')
                <a href="#" data-toggle="modal" onclick="createSchedule()" class="btn btn-sm btn-success waves-effect waves-light"><i class="ti-plus"></i> @lang('modules.interviewSchedule.addInterviewSchedule')</a>
            @endpermission
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex p-0 ui-sortable-handle">
                    <h3 class="card-title p-3">
                        <i class="fa fa-file"></i> @lang('modules.interviewSchedule.interviewSchedule')
                    </h3>
                </div>
                <div class="card-body">
                    @forelse($upComingSchedules as $key => $upComingSchedule)
                        <div>
                            @php
                                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $key);
                            @endphp
                            <h4>{{ $date->format('M d, Y') }}</h4>
                            <ul class="scheduleul">
                                @forelse($upComingSchedule as $key => $dtData)
                                    <li class="deco" id="schedule-{{$dtData->id}}" onclick="getScheduleDetail(event, {{$dtData->id}}) ">
                                        <h5 class="text-muted">{{ ucfirst($dtData->title) }} </h5>
                                        <div class="pull-right">
                                            @if($user->can('edit_schedule'))
                                                <span id="edit-interview-schedule">
                                                    <button onclick="editUpcomingSchedule(event, '{{ $dtData->id }}')" class="btn btn-sm btn-info notify-button editSchedule" title="Edit"> <i class="fa fa-pencil"></i></button>
                                                </span>
                                            @endif
                                            @if($user->can('delete_schedule'))
                                                <span id="delete-interview-schedule">
                                                    <button data-schedule-id="{{ $dtData->id }}" class="btn btn-sm btn-danger notify-button deleteSchedule" title="Delete"> <i class="fa fa-trash"></i></button>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="direct-chat-name">{{ ucfirst($dtData->full_name) }}</div>
                                        <span class="direct-chat-timestamp">{{ $dtData->schedule_date->format('h:i a') }}</span>
                                        @if(in_array($user->id, $dtData->employee->pluck('user_id')->toArray()))
                                            @php
                                                $empData = $dtData->employeeData($user->id);
                                            @endphp
                                            @if($empData->user_accept_status == 'accept')
                                                <label class="badge badge-success float-right">@lang('app.accepted')</label>
                                            @elseif($empData->user_accept_status == 'refuse')
                                                <label class="badge badge-danger float-right">@lang('app.refused')</label>
                                            @else
                                                <span class="float-right">
                                                    <button onclick="employeeResponse({{$empData->id}}, 'accept')" class="btn btn-sm btn-success notify-button responseButton">@lang('app.accept')</button>
                                                    <button onclick="employeeResponse({{$empData->id}}, 'refuse')" class="btn btn-sm btn-danger notify-button responseButton">@lang('app.refuse')</button>
                                                </span>
                                            @endif
                                        @endif
                                    </li>
                                    @if($key != (count($upComingSchedule)-1))
                                        <hr>
                                    @endif
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <hr>
                        @empty
                        <div>
                            <p>@lang('messages.noUpcomingScheduleFund')</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
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
                    @lang('messages.loading')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn blue">@lang('app.save')</button>
                </div>
            </div>
        </div>
    </div>
    {{--Ajax Modal Ends--}}
    {{--Ajax Modal Start for--}}
    <div class="modal fade bs-modal-md in" id="scheduleEditModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    @lang('messages.loading')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn blue">@lang('app.save')</button>
                </div>
            </div>
        </div>
    </div>
    {{--Ajax Modal Ends--}}
@endsection
@push('footer-script')
    <script>
        "use strict";

        var userCanAdd = false;
        var userCanEdit = false;
        @if($user->can('add_schedule'))
            userCanAdd = true;
        @endif
        @if($user->can('edit_schedule'))
            userCanEdit = true;
        @endif
        var taskEvents = [
            @foreach($schedules as $schedule)
            {
                id: '{{ ucfirst($schedule->id) }}',
                title: '{{ $schedule->title }} on {{ $schedule->full_name }}',
                start: '{{ $schedule->schedule_date }}',
                end: '{{ $schedule->schedule_date }}',
            },
            @endforeach
        ];

        @if($user->can('edit_schedule'))
            function editUpcomingSchedule(event, id) {
                if (!$(event.target).closest('.editSchedule').length) {
                    return false;
                }
                var url = "{{ route('admin.interview-schedule.edit',':id') }}";
                url = url.replace(':id', id);
                $('#modelHeading').html('Schedule');
                $('#scheduleEditModal').modal('hide');
                $.ajaxModal('#scheduleEditModal', url);
            }
        @endif

        function reloadSchedule() {
            $.easyAjax({
                url: '{{route('admin.interview-schedule.index')}}',
                container: '#updateSchedule',
                type: "GET",
                success: function (response) {
                    $('.upcomingdata').html(response.data);
                    taskEvents = [];
                    response.scheduleData.forEach(function(schedule){
                        const taskEvent = {
                            id: schedule.id,
                            title: schedule.title +' on '+  schedule.full_name ,
                            start: schedule.schedule_date ,
                            end: schedule.schedule_date,
                        };
                        taskEvents.push(taskEvent);
                    });
                    $.CalendarApp.reInit();
                }
            })
        }

        @if($user->can('delete_schedule'))
            $('body').on('click', '.deleteSchedule', function (event) {
                var id = $(this).data('schedule-id');
                if (!$(event.target).closest('.deleteSchedule').length) {
                    return false;
                }
                swal({
                    title: "@lang('errors.areYouSure')",
                    text: "@lang('errors.deleteWarning')",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('app.delete')",
                    cancelButtonText: "@lang('app.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        var url = "{{ route('admin.interview-schedule.destroy',':id') }}";
                        url = url.replace(':id', id);

                        var token = "{{ csrf_token() }}";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    $('#schedule-'+id).remove();
                                    reloadSchedule();
                                }
                            }
                        });
                    }
                });
            });
        @endif

        function employeeResponse(id, type) {
            var msg;
            if (type == 'accept') {
                msg = "@lang('errors.acceptSchedule')";
            } else {
                msg = "@lang('errors.refuseSchedule')";
            }
            swal({
                title: "@lang('errors.areYouSure')",
                text: msg,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('app.yes')",
                cancelButtonText: "@lang('app.cancel')",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var url = "{{ route('admin.interview-schedule.response',[':id',':type']) }}";
                    url = url.replace(':id', id);
                    url = url.replace(':type', type);

                    $.easyAjax({
                        url: url,
                        type: 'GET',
                        success: function (response) {
                            if (response.status == 'success') {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }

        var getScheduleDetail = function (event, id) {
            if ($(event.target).closest('.editSchedule, .deleteSchedule, .responseButton').length) {
                return false;
            }
            var url = '{{ route('admin.interview-schedule.show', ':id')}}';
            url = url.replace(':id', id);

            $('#modelHeading').html('Schedule');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        @if($user->can('add_schedule'))
            function createSchedule(scheduleDate) {
                if (typeof scheduleDate === "undefined") {
                    scheduleDate = '';
                }
                var url = '{{ route('admin.interview-schedule.create')}}?date=' + scheduleDate;
                $('#modelHeading').html('Schedule');
                $.ajaxModal('#scheduleDetailModal', url);
            }
        @endif

        @if($user->can('add_schedule'))
            function addScheduleModal(start, end, allDay) {
                var scheduleDate;
                if (start) {
                    var sd = new Date(start);
                    var curr_date = sd.getDate();
                    if (curr_date < 10) {
                        curr_date = '0' + curr_date;
                    }
                    var curr_month = sd.getMonth();
                    curr_month = curr_month + 1;
                    if (curr_month < 10) {
                        curr_month = '0' + curr_month;
                    }
                    var curr_year = sd.getFullYear();
                    scheduleDate = curr_year + '-' + curr_month + '-' + curr_date;
                }

                createSchedule(scheduleDate);
            }
        @endif
    </script>
    <script src="{{ asset('js/schedule-calendar.js') }}"></script>
@endpush
