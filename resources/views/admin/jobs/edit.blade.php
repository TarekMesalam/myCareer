@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@lang('app.edit')</h4>
                    <form class="ajax-form" method="POST" id="createForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('modules.jobs.jobTitle')</label>
                                    <input type="text" class="form-control" name="title" value="{{ $job->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('modules.jobs.jobDescription')</label>
                                    <textarea class="form-control" id="job_description" name="job_description" rows="15" placeholder="Enter text ...">{!! $job->job_description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('modules.jobs.jobRequirement')</label>
                                    <textarea class="form-control" id="job_requirement" name="job_requirement" rows="15" placeholder="Enter text ...">{!! $job->job_requirement !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('menu.locations')</label>
                                    <select name="location_id" id="location_id" class="form-control select2 custom-select">
                                        @foreach($locations as $location)
                                            <option
                                                @if($location->id == $job->location_id) selected @endif
                                                value="{{ $location->id }}">{{ ucfirst($location->location). ' ('.$location->country->country_code.')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('menu.jobCategories')</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option
                                                @if($category->id == $job->category_id) selected @endif
                                                value="{{ $category->id }}">{{ ucfirst($category->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('menu.skills')</label>
                                    <select class="select2 m-b-10 select2-multiple" id="job_skills" multiple="multiple" data-placeholder="@lang('app.add') @lang('menu.skills')" name="skill_id[]">
                                        @foreach($skills as $skill)
                                            <option
                                                @foreach($job->skills as $jskill)
                                                    @if($skill->id == $jskill->skill_id)
                                                        selected
                                                    @endif
                                                @endforeach
                                                value="{{ $skill->id }}">{{ ucwords($skill->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('modules.jobs.totalPositions')</label>
                                    <input type="number" class="form-control" name="total_positions" id="total_positions" value="{{ $job->total_positions }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('app.startDate')</label>
                                    <input type="text" class="form-control" id="date-start" value="{{ $job->start_date->format('Y-m-d') }}" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('app.endDate')</label>
                                    <input type="text" class="form-control" id="date-end" name="end_date" value="{{ $job->end_date->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('app.status')</label>
                                    <select name="status" id="status" class="form-control">
                                        <option
                                            @if($job->status == 'active') selected @endif
                                            value="active">@lang('app.active')</option>
                                        <option
                                            @if($job->status == 'inactive') selected @endif
                                            value="inactive">@lang('app.inactive')
                                        </option>
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
                                                <input @if(in_array($question->id, $jobQuestion)) checked @endif type="checkbox" value="{{$question->id}}" name="question[]" class="flat-red">
                                                <ins class="iCheck-helper"></ins>
                                            </div>
                                            {{ ucfirst($question->question)}} @if($question->required == 'yes')(@lang('app.required'))@endif
                                        </label>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <button type="button" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> @lang('app.save')</button>
                    </form>
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
        })

        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
        {
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
                url: '{{route('admin.jobs.update', $job->id)}}',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
@endpush
