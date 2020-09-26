<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCMS | {{$job->title}}</title>
    <link rel="icon" type="image/png" href="{{url('/')}}/front/new_assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/slick.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/style.css">
</head>
<body>
<!-- Navbar -->
@include('sections.header')
<!-- /Navbar -->
<main class="page-wrapper single-job">
    <div class="page-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb" class="m-0 p-0">
                <ol class="breadcrumb m-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$job->category->name}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.jobDetail', [$job->slug]) }}">{{$job->title}}</a></li>
                    <li class="breadcrumb-item active">Apply Form</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5">
            <form id="createForm" method="POST">
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="container">
                    <div class="row gap-y">

                        <div class="col-md-4 px-20 pb-30 bb-1">
                            <h5>@lang('modules.front.personalInformation')</h5>
                        </div>
                        <div class="col-md-8 pb-30 bb-1">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="full_name" placeholder="@lang('modules.front.fullName')">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="@lang('modules.front.email')">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="tel" name="phone" placeholder="@lang('modules.front.phone')">
                            </div>
                            <div class="form-group">
                                <h6>@lang('modules.front.photo')</h6>
                                <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                                <span class="help-block">@lang('modules.front.photoFileType')</span>
                            </div>
                        </div>
                        <div class="col-md-4 px-20 py-30 bb-1">
                            <h5>@lang('modules.front.resume')</h5>
                        </div>
                        <div class="col-md-8 py-30 bb-1">
                            <div class="form-group">
                                <input class="select-file" type="file" name="resume"><br>
                            </div>
                        </div>
                        @if(count($jobQuestion) > 0)
                            <div class="col-md-4 px-20 pb-30 bb-1">
                                <h5>@lang('modules.front.additionalDetails')</h5>
                            </div>
                            <div class="col-md-8 pb-30 bb-1">
                                @forelse($jobQuestion as $question)
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" id="answer[{{ $question->question->id}}]" name="answer[{{ $question->question->id}}]" placeholder="{{ $question->question->question }}">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        @endif
                        <div class="col-md-4 px-20 pt-30 mb-50">
                            <h5>@lang('modules.front.coverLetter')</h5>
                        </div>
                        <div class="col-md-8 pt-30 mb-50">
                            <div class="form-group">
                                <textarea class="form-control form-control-lg" name="cover_letter" rows="4"></textarea>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block theme-background" style="
    background: #3a325e;" id="save-form" type="button">@lang('modules.front.submitApplication')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
@include('sections.footer')
<!-- /Footer -->

<script src="{{url('/')}}/front/new_assets/js/jquery-3.4.1.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/slick.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/jquery.nicescroll.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/main.js"></script>
<script src="{{ asset('mycareer-helper/helper.js') }}"></script>
<script>
    "use strict";

    $('#save-form').on('click', function(){
        $.easyAjax({
            url: '{{route('jobs.saveApplication')}}',
            container: '#createForm',
            type: "POST",
            file:true,
            redirect: true,
            success: function (response) {
                if(response.status == 'success'){
                    var successMsg = '<div class="alert alert-success my-100" role="alert">' +
                        response.msg + ' <a class="" href="{{ route('jobs.jobOpenings') }}">@lang("app.view") @lang("modules.front.jobOpenings") <i class="fa fa-arrow-right"></i></a>'
                    '</div>';
                    $('.main-content .container').html(successMsg);
                }
            },
            error: function (response) {
                handleFails(response);
            }
        })
    });

    function handleFails(response) {
        if (typeof response.responseJSON.errors != "undefined") {
            var keys = Object.keys(response.responseJSON.errors);

            $('#createForm').find(".has-error").find(".help-block").remove();
            $('#createForm').find(".has-error").removeClass("has-error");

            for (var i = 0; i < keys.length; i++) {
                var key = keys[i].replace(".", '\\.');
                var formarray = keys[i];

                if(formarray.indexOf('.') >0){
                    var array = formarray.split('.');
                    response.responseJSON.errors[keys[i]] = response.responseJSON.errors[keys[i]];
                    key = array[0]+'['+array[1]+']';
                }

                var ele = $('#createForm').find("[name='" + key + "']");

                var grp = ele.closest(".form-group");
                $(grp).find(".help-block").remove();

                var wys = $(grp).find(".wysihtml5-toolbar").length;

                if(wys > 0){
                    var helpBlockContainer = $(grp);
                }
                else{
                    var helpBlockContainer = $(grp).find("div:first");
                }

                if($(ele).is(':radio')){
                    helpBlockContainer = $(grp).find("div:eq(2)");
                }

                if (helpBlockContainer.length == 0) {
                    helpBlockContainer = $(grp);
                }

                helpBlockContainer.append('<div class="help-block">' + response.responseJSON.errors[keys[i]] + '</div>');
                $(grp).addClass("has-error");
            }

            if (keys.length > 0) {
                var element = $("[name='" + keys[0] + "']");
                if (element.length > 0) {
                    $("html, body").animate({scrollTop: element.offset().top - 150}, 200);
                }
            }
        }
    }
</script>
</body>
</html>
