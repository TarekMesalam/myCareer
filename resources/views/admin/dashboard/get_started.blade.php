<div class="card">
    <div class="card-header bg-secondary" style="background: #1b274a !important">
        @lang('messages.installationWelcome')
        <div class="row">
            <div class="col-md-12 col-sm-10">
                <div class="progress progress-striped m-t-20 progress-lg">
                    <div id="dbprogressbar" role="progressbar" aria-valuenow="{{$progressPercent}}" aria-valuemin="0"
                        aria-valuemax="100"
                        class="progress-bar progress-bar-success progress-bar-striped"
                        style="width: {{$progressPercent}}%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 c-white m-t-10">
                <strong>@lang('messages.installationProgress') : </strong> 
                {{$progressPercent}}%
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div id="db-info-box" class="info-box">
                <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <div class="info-box-content">
                    <div class="info-box-number"><a href="#">@lang('messages.installationStep1')</a></div>
                    <h6 class="info-box-text">@lang('messages.installationCongratulation')</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box1" class="info-box">
                @if(isset($progress['smtp_setting_completed']))
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                @else
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                @endif
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="{{route('admin.smtp-settings.index')}}" class="">@lang('messages.installationStep2')</a>
                    </div>
                    <h6 class="info-box-text">@lang('messages.installationSmtp')</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box2" class="info-box">
                @if(isset($progress['company_setting_completed']))
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                @else
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                @endif
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="{{route('admin.settings.index')}}">@lang('messages.installationStep3')</a>
                    </div>
                    <h6 class="info-box-text">@lang('messages.installationCompanySetting')</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="db-info-box3" class="info-box">
                @if(isset($progress['profile_setting_completed']))
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                @else
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                @endif
                <div class="info-box-content">
                    <div class="info-box-number">
                        <a href="{{route('admin.profile.index')}}" class="">@lang('messages.installationStep4')</a>
                    </div>
                    <h6 class="info-box-text">@lang('messages.installationProfileSetting')</h6>
                </div>
            </div>
        </div>
    </div>
</div>
