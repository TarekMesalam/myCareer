@extends('layouts.app')
@section('content')
    {!!  $smtpSetting->set_smtp_message !!}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('app.createNew')</h4>
                    <form id="editSettings" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('app.name')</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('app.email')</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="company_phone">@lang('app.password')</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('app.image')</label>
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="image" accept=".png,.jpg,.jpeg" class="dropify" data-default-file="{{ asset('avatar.png') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_phone">@lang('modules.permission.roleName')</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">@lang('app.save')</button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
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
                url: '{{route('admin.team.store')}}',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            });
        });
    </script>
@endpush
