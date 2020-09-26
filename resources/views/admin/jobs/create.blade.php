@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@lang('app.createNew')</h4>
                    @if(count($locations) == 0)
                        <div id="no-locations" class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> @lang('messages.jobLocationEmpty')</h4>
                            <p>@lang('messages.noLocations')
                                <a href="{{ route('admin.locations.create') }}" class="btn btn-info btn-sm m-l-15"><i class="fa fa-plus-circle"></i> @lang('app.createNew') @lang('menu.locations')</a>
                            </p>
                        </div>
                    @elseif(count($categories) == 0)
                        <div id="no-categories" class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> @lang('messages.jobCategoryEmpty')</h4>
                            <p>
                            @lang('messages.noJobCategory')
                                <a href="{{ route('admin.job-categories.create') }}" class="btn btn-info btn-sm m-l-15"><i class="fa fa-plus-circle"></i> @lang('app.createNew') @lang('menu.jobCategories')</a>
                            </p>
                        </div>
                    @else
                        <form class="ajax-form" method="POST" id="createForm">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.jobs.jobTitle')</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.jobs.jobDescription')</label>
                                        <textarea class="form-control" id="job_description" name="job_description" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.jobs.jobRequirement')</label>
                                        <textarea class="form-control" id="job_requirement" name="job_requirement" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('menu.locations')</label>
                                        <select name="location_id" id="location_id" class="form-control select2 custom-select">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ ucfirst($location->location). ' ('.$location->country->country_code.')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('menu.jobCategories')</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">@lang('app.choose') @lang('menu.jobCategories')</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('menu.skills')</label>
                                        <select class="select2 m-b-10 select2-multiple" id="job_skills" multiple="multiple" data-placeholder="@lang('app.add') @lang('menu.skills')" name="skill_id[]"></select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.jobs.totalPositions')</label>
                                        <input type="number" class="form-control" name="total_positions" id="total_positions">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('app.startDate')</label>
                                        <input type="text" class="form-control" id="date-start" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="start_date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('app.endDate')</label>
                                        <input type="text" class="form-control" id="date-end" name="end_date" value="{{ \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('app.status')</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">@lang('app.active')</option>
                                            <option value="inactive">@lang('app.inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <h4 class="m-b-0 m-l-10 box-title">Questions</h4>
                                    @forelse($questions as $question)
                                        <div class="form-group col-md-6">
                                            <label class="">
                                                <div id="job-questions" class="icheckbox_flat-green" aria-checked="false" aria-disabled="false">
                                                    <input type="checkbox" value="{{$question->id}}" name="question[]" class="flat-red">
                                                    <ins class="iCheck-helper"></ins>
                                                </div>
                                                {{ ucfirst($question->question)}} @if($question->required == 'yes') (@lang('app.required'))@endif
                                            </label>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <button type="button" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> @lang('app.save')</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-script')
    <script>
        "use strict";

        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
        });

        $('#date-end').bootstrapMaterialDatePicker({weekStart: 0, time: false});

        $('#date-start').bootstrapMaterialDatePicker({weekStart: 0, time: false}).on('change', function (e, date) {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });

        var jobDescription = $('#job_description').wysihtml5({
            "font-styles": true,
            "emphasis": true,
            "lists": true,
            "html": true,
            "link": true,
            "image": true,
            "color": true,
            stylesheets: ["{{ asset('assets/node_modules/html5-editor/wysiwyg-color.css') }}"],
        });

        $('#job_requirement').wysihtml5({
            "font-styles": true,
            "emphasis": true,
            "lists": true,
            "html": true,
            "link": true,
            "image": true,
            "color": true,
            stylesheets: ["{{ asset('assets/node_modules/html5-editor/wysiwyg-color.css') }}"],
        });

        $('#category_id').on('change', function(){
            var id = $(this).val();

            var url = "{{route('admin.job-categories.getSkills', ':id')}}";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                success: function (response) {
                    $('#job_skills').html(response.data);
                    $(".select2").select2();
                }
            })
        });

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '{{route('admin.jobs.store')}}',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
@endpush
