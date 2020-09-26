@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('app.createNew')</h4>
                    <form class="ajax-form" method="POST" id="createForm" onsubmit="return false;">
                        @csrf
                    <div id="education_fields"></div>
                    <div class="row">
                        <div class="col-sm-9 nopadding">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="@lang('menu.jobCategories') @lang('app.name')">
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>@lang('modules.front.photo')</h6>
                                <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                                <span class="help-block">@lang('modules.front.photoFileType')</span>
                            </div>
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

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '{{route('admin.job-categories.store')}}',
                container: '#createForm',
                type: "POST",
                redirect: true,
                file: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
@endpush