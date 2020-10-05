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
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/style{{Session::get('locale') == 'en'? '':'.rtl'}}.css">
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
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('app.Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$job->category->name}}</a></li>
                    <li class="breadcrumb-item active">{{$job->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4 col-lg-3">
                <div class="job-details">
                    <div class="title bg-gray">
                        <h1 class="detail-head">{{$job->title}}</h1>
                        <h2 class="category dark-text">{{$job->category->name}}</h2>
                    </div>
                    <ul class="details m-10 bg-gray">
                        <li class="mb-4">
                            <h3 class="detail-head">{{__('app.Start Date')}}</h3>
                            <span class="dark-text">{{$job->start_date->format('Y-M-D')}}</span>
                        </li>
                        <li class="mb-4">
                            <h3 class="detail-head">{{__("app.End Date")}}</h3>
                            <span class="dark-text">{{$job->end_date->format('Y-M-D')}}</span>
                        </li>
                        <li class="mb-4">
                            <h3 class="detail-head text-center">{{__('app.Skills')}}</h3>
                            <div class="row pt-2">
                                @foreach($job->skills as $skill)
                                    <div class="col-6 text-center">
                                        <span class="skill">{{\App\Skill::find($skill->skill_id)->name}}</span>
                                    </div>
                                @endforeach

                            </div>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <div class="social">--}}
                        {{--                                <a href="#">--}}
                        {{--                                    <img src="{{url('/')}}/front/new_assets/images/instagram.svg" alt="instagram" width="22px">--}}
                        {{--                                </a>--}}
                        {{--                                <a href="#" class="mx-3">--}}
                        {{--                                    <img src="{{url('/')}}/front/new_assets/images/whatsapp.svg" alt="whatsapp" width="22px">--}}
                        {{--                                </a>--}}
                        {{--                                <a href="#">--}}
                        {{--                                    <img src="{{url('/')}}/front/new_assets/images/facebook.svg" alt="instagram" width="22px">--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="job-details">
                    <h3 class="detail-head pre-line">{{__('app.Job Description:')}}</h3>
                        {!! $job->job_description !!}
                </div>
                <div class="job-requirment" style="margin-top: 50px">
                    <h3 class="detail-head pre-line">{{__('app.Job Requirment:')}}</h3>
                    {!! $job->job_requirement !!}
                </div>
            </div>
            <div class="col-md-10 col-lg-3 mx-auto mt-5 mt-lg-0">
                <div class="job-map">
                    <div class="apply bg-gray text-center">
                        <a href="{{ route('jobs.jobApply', $job->slug) }}" class="btn btn-apply text-uppercase">
                            {{__('app.Apply Now')}}
                        </a>
                    </div>
                    <div id="map" class="bg-gray">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3633.8956573069286!2d47.09205968460757!3d24.384932970155468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f8c507ff57c03%3A0x85765d831f6d4387!2sNCMS!5e0!3m2!1sar!2seg!4v1601902529265!5m2!1sar!2seg" width="250" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
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
</body>
</html>