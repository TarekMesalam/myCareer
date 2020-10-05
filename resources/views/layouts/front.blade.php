
<!DOCTYPE html>
<html lang="en" dir="{{Session::get('locale') == 'en'? '':'rtl'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <style>
        :root {
            --main-color: {{ $frontTheme->primary_color }};
        }
        header {
        }
        {!! $frontTheme->front_custom_css !!}
        .page-item.active .page-link{
            z-index: 1;
            color: #fff;
            background-color: #3a325e !important;
            border-color: #3a325e !important;
        }
        .page-wraper { overflow-x: hidden; }
    </style>
    <link rel="icon" type="image/png" href="{{url('/')}}/front/new_assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/slick.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/front/new_assets/css/style{{Session::get('locale') == 'en'? '':'.rtl'}}.css">
</head>
<body>
<!-- Navbar -->
@include('sections.header')
<!-- Header -->
<header class="header">
    <ul class="social-media">
        <li>
            <a href="#">
                <svg class="path" data-name="Group 225" xmlns="http://www.w3.org/2000/svg" width="21.715" height="23.193" viewBox="0 0 21.715 23.193">
                    <g transform="translate(3.843 5.614)">
                        <path class="path" data-name="Path 1564" d="M15.157,7.633a6.027,6.027,0,0,1-1.724.473,3.017,3.017,0,0,0,1.319-1.661,6.01,6.01,0,0,1-1.907.728A3,3,0,0,0,7.734,9.91,8.521,8.521,0,0,1,1.549,6.774a3.005,3.005,0,0,0,.929,4.008,2.975,2.975,0,0,1-1.36-.375v.038a3,3,0,0,0,2.407,2.943,2.975,2.975,0,0,1-.79.1,2.937,2.937,0,0,1-.565-.054,3,3,0,0,0,2.8,2.083A6.006,6.006,0,0,1,1.246,16.8a6.271,6.271,0,0,1-.714-.04,8.492,8.492,0,0,0,4.6,1.346,8.479,8.479,0,0,0,8.538-8.535c0-.132,0-.261-.009-.391a6,6,0,0,0,1.5-1.552" transform="translate(-0.531 -6.227)" fill="#3a325e"/>
                    </g>
                    <path class="path" data-name="Path 1566" d="M653.959,390.262H640.414a4.2,4.2,0,0,1-4.085-4.289V371.358a4.2,4.2,0,0,1,4.085-4.289h13.545a4.2,4.2,0,0,1,4.085,4.289v14.615A4.2,4.2,0,0,1,653.959,390.262Zm-13.791-21.087a1.877,1.877,0,0,0-1.828,1.919v15.144a1.877,1.877,0,0,0,1.828,1.919H654.2a1.877,1.877,0,0,0,1.827-1.919V371.094a1.877,1.877,0,0,0-1.827-1.919Z" transform="translate(-636.329 -367.069)" fill="#3a325e"/>
                </svg>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.331" height="19.882" viewBox="0 0 20.331 19.882">
                    <path class="path" data-name="Path 1563" d="M12.31,10A2.3,2.3,0,0,0,10,12.259V27.623a2.3,2.3,0,0,0,2.31,2.259H28.021a2.3,2.3,0,0,0,2.31-2.259V12.259A2.3,2.3,0,0,0,28.021,10Zm0,1.807H28.021a.447.447,0,0,1,.462.452V27.623a.447.447,0,0,1-.462.452H12.31a.447.447,0,0,1-.462-.452V12.259A.447.447,0,0,1,12.31,11.807Zm2.715,1.553a1.554,1.554,0,1,0,1.588,1.553A1.571,1.571,0,0,0,15.025,13.361Zm8.346,4.123a2.862,2.862,0,0,0-2.57,1.384h-.058V17.682h-2.6v8.586h2.715V22.031c0-1.119.227-2.2,1.646-2.2,1.4,0,1.415,1.264,1.415,2.259v4.18h2.715V21.551C26.635,19.242,26.133,17.484,23.371,17.484Zm-9.675.2v8.586H16.44V17.682Z" transform="translate(-10 -10)" fill="#3a325e"/>
                </svg>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="23.738" height="25.027" viewBox="0 0 23.738 25.027">
                    <g id="Group_250" data-name="Group 250" transform="translate(0)">
                        <path class="path" data-name="Path 15" d="M648.282,388.24c-6.489,0-11.748,5.521-11.748,12.334a12.718,12.718,0,0,0,1.513,6.054l-1.758,6.639,6.327-1.888a11.256,11.256,0,0,0,5.666,1.527c6.487,0,11.746-5.521,11.746-12.332S654.769,388.24,648.282,388.24Zm0,22.559a9.358,9.358,0,0,1-5.474-1.768l-3.584,1.1,1.007-3.8a10.512,10.512,0,0,1-1.691-5.756,9.752,9.752,0,1,1,9.742,10.226Z" transform="translate(-636.289 -388.24)" fill="#3a325e"/>
                        <path class="path" data-name="Path 16" d="M651.279,400.28c-.305-.154-1.743-.91-2.01-1.02-.294-.084-.479-.154-.678.166a13.2,13.2,0,0,1-.931,1.188c-.174.224-.347.237-.626.1a7.383,7.383,0,0,1-2.382-1.535,9.088,9.088,0,0,1-1.65-2.11.507.507,0,0,1,.12-.656,3.763,3.763,0,0,0,.452-.531.539.539,0,0,0,.105-.14,3.152,3.152,0,0,0,.187-.363.5.5,0,0,0-.027-.531c-.053-.154-.651-1.691-.9-2.293-.239-.628-.492-.515-.651-.515-.188,0-.374-.028-.573-.028a1,1,0,0,0-.786.391,3.383,3.383,0,0,0-1.052,2.57,3.343,3.343,0,0,0,.174,1.034,7.024,7.024,0,0,0,1.038,2.138c.147.209,2.037,3.409,5.043,4.638s3.02.811,3.553.769a2.941,2.941,0,0,0,2-1.467,2.657,2.657,0,0,0,.16-1.467,1.66,1.66,0,0,0-.559-.335Z" transform="translate(-633.889 -385.403)" fill="#3a325e" fill-rule="evenodd"/>
                    </g>
                </svg>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.83" height="23.316" viewBox="0 0 21.83 23.316">
                    <g data-name="Group 22" transform="translate(0 0)">
                        <g data-name="Group 20">
                            <path class="path" data-name="Path 13" d="M654.053,390.385H640.436a4.218,4.218,0,0,1-4.107-4.312V371.381a4.217,4.217,0,0,1,4.107-4.312h13.617a4.217,4.217,0,0,1,4.107,4.312v14.693A4.218,4.218,0,0,1,654.053,390.385Zm-13.864-21.2a1.887,1.887,0,0,0-1.837,1.929v15.224a1.887,1.887,0,0,0,1.837,1.929H654.3a1.887,1.887,0,0,0,1.837-1.929V371.115a1.887,1.887,0,0,0-1.837-1.929Z" transform="translate(-636.329 -367.069)" fill="#3a325e"/>
                        </g>
                        <g data-name="Group 21" transform="translate(5.793 6.28)">
                            <path class="path" data-name="Path 14" d="M645.2,381.7a5.385,5.385,0,1,1,5.123-5.378A5.261,5.261,0,0,1,645.2,381.7Zm0-8.773a3.4,3.4,0,1,0,3.231,3.394A3.319,3.319,0,0,0,645.2,372.927Z" transform="translate(-640.081 -370.943)" fill="#3a325e"/>
                        </g>
                        <ellipse class="path" data-name="Ellipse 1" cx="1.461" cy="1.534" rx="1.461" ry="1.534" transform="translate(15.481 3.838)" fill="#3a325e"/>
                    </g>
                </svg>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.369" height="23.192" viewBox="0 0 21.369 23.192">
                    <g data-name="Group 224" transform="translate(0)">
                        <path class="path" data-name="Path 12" d="M647.813,345.97v2.453h-1.772a1.093,1.093,0,0,0-1.094,1.092v2.055H647.7l-.357,2.829h-2.4v7.132h-2.923v-7.151h-2.406v-2.81h2.424V349.1a3.2,3.2,0,0,1,3.278-3.19Z" transform="translate(-633.935 -342.335)" fill="#3a325e"/>
                        <path class="path" data-name="Path 1565" d="M653.678,390.261H640.349a4.166,4.166,0,0,1-4.02-4.289V371.358a4.165,4.165,0,0,1,4.02-4.289h13.329a4.165,4.165,0,0,1,4.02,4.289v14.614A4.166,4.166,0,0,1,653.678,390.261Zm-13.571-21.087a1.864,1.864,0,0,0-1.8,1.919v15.143a1.864,1.864,0,0,0,1.8,1.919H653.92a1.864,1.864,0,0,0,1.8-1.919V371.094a1.864,1.864,0,0,0-1.8-1.919Z" transform="translate(-636.329 -367.069)" fill="#3a325e"/>
                    </g>
                </svg>
            </a>
        </li>
    </ul>
    <div class="scroll-down" id="scrollDownControl">
        <svg xmlns="http://www.w3.org/2000/svg" width="17.391" height="24.696" viewBox="0 0 17.391 24.696">
            <g data-name="Group 108" transform="translate(0)">
                <g data-name="Group 107" transform="translate(0)">
                    <path data-name="Path 446" d="M84.421,0a8.774,8.774,0,0,0-8.7,8.832v7.033a8.7,8.7,0,1,0,17.391.027V8.832A8.774,8.774,0,0,0,84.421,0Zm7.06,15.892a7.061,7.061,0,1,1-14.12-.027V8.832a7.061,7.061,0,1,1,14.12,0Z" transform="translate(-75.726)" fill="#11044c"/>
                </g>
            </g>
            <g data-name="Group 110" transform="translate(7.878 6.76)">
                <g id="scrollDot" data-name="Group 109" transform="translate(0)">
                    <path data-name="Path 447" d="M239.864,140.15a.818.818,0,0,0-.818.818v2.862a.818.818,0,0,0,1.636,0v-2.862A.818.818,0,0,0,239.864,140.15Z" transform="translate(-239.046 -140.15)" fill="#e28f25"/>
                </g>
            </g>
        </svg>
        <span>{{__('app.Scroll Down')}}</span>
    </div>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 start-side">
                <div class="header-slider">
                    <div>
                        <h1>
                            {{__('app.The National Company for Mechanical Systems')}}
                            <span>({{__('app.NCMS')}})</span>
                        </h1>
                        <p>{{__('app.desc1')}}</p>
                    </div>
                    <div>
                        <h2 class="h1">
                            {{__('app.The National Company for Mechanical Systems')}}
                            <span>({{__('app.NCMS')}})</span>
                        </h2>
                        <p>{{__('app.desc2')}}</p>
                    </div>
                </div>
                <div class="header-search row mt-5">
                    <div class="col-sm-9 mx-auto">
                        <label class="text-uppercase">{{__('app.we are hiring:')}}</label>
                        <form method="GET" action="" class="input-group search-form">
                            <input type="text" class="form-control" placeholder="{{__('app.job title keywords..')}}" name="keyword">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn btn-main">
                                    {{__('app.Join Now')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 main-vector">
                <div class="main-vector-container">
                    <div class="avatar-group">
                        <div class="avatar-group-slider">
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                            <div>
                                <img src="{{url('/')}}/front/new_assets/images/avatar-group.svg" alt="avatar vector">
                            </div>
                        </div>
                    </div>
                    <img src="{{url('/')}}/front/new_assets/images/zoom-full.svg" class="zoom" alt="zoom icon">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /Header -->
<main class="page-wraper">
    <!-- Jobs Catergory -->
    <!-- Jobs Catergory -->
    <section id="category" class="jobs-category">
        <h3 class="section-head">
                <span class="text">
                    <p>{{__('app.Jobs')}}</p>
                    <p>{{__('app.Category')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="container-fluid">
                <div class="jobs-category-slider" style="direction: ltr">
                    @foreach($categories as $key=>$category)
                        <div>
                            <div class="row" style="text-align: center">
                                <div class="col-sm-3 category-icon"></div>
                                <div class="col-sm-1 category-icon">
                                    @if($category->photo)
                                        <img src="user-uploads/category-photos/{{ $category->photo }}" alt="business category">
                                    @else
                                        <img src="{{url('/')}}/front/new_assets/images/business-icon.svg" alt="business category">
                                    @endif
                                </div>
                                <div class="col-sm-8">
                                    <h4 class="category-title">
                                        <a href="#">{{ ucwords($category->name) }}</a>
                                    </h4>
                                    <ul class="category-links">
                                        @foreach($category->jobs as $key1 =>$cat_job)
                                            @if ($key1 < 4)
                                                <li>
                                                    <a href="{{ route('jobs.jobDetail', [$cat_job->slug]) }}">{{$cat_job->title}}</a>
                                                </li>
                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /Jobs Catergory -->

    <!-- Our Technologies -->
    <section id="Technologies" class="our-technologies">
        <h3 class="section-head mb-2">
                <span class="text">
                    <p>{{__('app.Our')}}</p>
                    <p>{{__('app.Technolog')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="container">
                <p class="text-center sub-head mx-auto">
                    {{__('app.desc3')}}
                </p>
                <div class="row justify-content-center slides-section mx-auto">
                    <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                        <a href="#" class="tech-card active">
                            <div class="image">
                                <img src="{{url('/')}}/front/new_assets/images/tech2.png" alt="Electronic">
                            </div>
                            <div class="overlay-content">
                                <h4>{{__('app.Composite Material')}}</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                        <a href="#" class="tech-card">
                            <div class="image">
                                <img src="{{url('/')}}/front/new_assets/images/tech.png" alt="Electronic">
                            </div>
                            <div class="overlay-content">
                                <h4>{{__('app.Electronic')}}</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                        <a href="#" class="tech-card">
                            <div class="image">
                                <img src="{{url('/')}}/front/new_assets/images/tech3.png" alt="Electronic">
                            </div>
                            <div class="overlay-content">
                                <h4>{{__('app.Optics and Optronics')}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /Our Technologies -->

    <!-- Latest Jobs -->
    <section class="latest-jobs">
        <h3 class="section-head mb-2">
                <span class="text">
                    <p>{{__('app.Latest')}}</p>
                    <p>{{__('app.Jobs')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="container">
                <p class="text-center sub-head mx-auto">
                    {{__('app.desc4')}}
                </p>
                <div class="row content">
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="join-now">
                            <a href="#" class="btn btn-join">{{__('app.joinnow')}}</a>
                            <img src="{{url('/')}}/front/new_assets/images/chair.svg" alt="join now">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <ul class="latest-jobs-container m-0 p-0"  id="latestJobsScroll">
                            @foreach($jobs as $key => $job)
                                <li class="latest-job-card" rel="{{ route('jobs.jobDetail', [$job->slug]) }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="mb-1 title">{{$job->title}}</h4>
                                        </div>
                                        <div class="col-2">
                                            <span class="section">{{$job->category->name}}</span>
                                        </div>
                                        <div class="col-8">
                                            <p class="mb-0">{!! substr($job->job_description,0,90) !!}</p>
                                        </div>
                                        <div class="col-2 d-flex flex-column align-items-center date-more-container">
                                            <span class="date mb-2">{{$job->start_date->format('y-m-d')}}</span>
                                            <a href="{{ route('jobs.jobDetail', [$job->slug]) }}" class="more">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                                    <defs>
                                                        <clipPath id="clip-path2">
                                                            <rect width="16" height="16" fill="none"/>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Component_44_1" data-name="Component 44 – 1" transform="translate(16 16) rotate(180)" clip-path="url(#clip-path2)">
                                                        <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(16 16) rotate(180)" fill="#3a325e"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /Latest Jobs -->

    <!-- Why Us -->
    <section class="why-us" id="why_us">
        <h3 class="section-head mb-2">
                <span class="text">
                    <p>{{__('app.Why')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="container">
                <div class="features-vector mx-auto">
                    <ul class="left">
                        <li>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/continuous-professional.svg" width="33" alt=" Continuous professional">
                                    </span>
                                <span class="title">{{__('app.Continuous professional')}}</span>
                            </div>
                            <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70.004" height="8.295" viewBox="0 0 70.004 8.295">
                                        <g id="pin4" transform="translate(-657.538 -2615.171)">
                                        <line id="Line_18" data-name="Line 18" x2="67.505" transform="translate(660.037 2620.045)" fill="none" stroke="#3a325e" stroke-miterlimit="10" stroke-width="0.825"/>
                                        <path id="Path_50581" data-name="Path 50581" d="M208.923,200.562a4.148,4.148,0,1,1-4.148-4.147A4.148,4.148,0,0,1,208.923,200.562Z" transform="translate(456.912 2418.756)" fill="#3a325e"/>
                                        </g>
                                    </svg>
                                </span>
                        </li>
                        <li>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/membership-in-clubs.svg" width="33"
                                             alt="Membership in Clubs">
                                    </span>
                                <span class="title">{{__('app.Membership in Clubs')}}</span>
                            </div>
                            <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="110.713" height="8.296" viewBox="0 0 110.713 8.296">
                                        <g id="pin5" transform="translate(-616.829 -2703.241)">
                                        <path id="Path_50582" data-name="Path 50582" d="M180.227,262.637a4.147,4.147,0,1,1-4.148-4.147A4.15,4.15,0,0,1,180.227,262.637Z" transform="translate(444.896 2444.751)" fill="#f99202"/>
                                        <line id="Line_20" data-name="Line 20" x2="106.567" transform="translate(620.976 2707.388)" fill="none" stroke="#e6bb83" stroke-miterlimit="10" stroke-width="0.825"/>
                                        </g>
                                    </svg>
                                </span>
                        </li>
                        <li>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/health-insurance.svg" width="33"
                                             alt="Health insurance">
                                    </span>
                                <span class="title"> {{__('app.Health insurance')}}</span>
                            </div>
                            <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="71.718" height="8.295" viewBox="0 0 71.718 8.295">
                                        <g id="pin6" transform="translate(-34.849 -182.9)">
                                            <line id="Line_19" data-name="Line 19" x2="67.572" transform="translate(38.995 187.048)" fill="none" stroke="#3a325e" stroke-miterlimit="10" stroke-width="0.825"/>
                                            <path id="Path_50583" data-name="Path 50583" d="M207.714,332.911a4.148,4.148,0,1,1-4.148-4.146A4.15,4.15,0,0,1,207.714,332.911Z" transform="translate(-164.569 -145.865)" fill="#3a325e"/>
                                        </g>
                                    </svg>
                                </span>
                        </li>
                    </ul>
                    <ul class="right">
                        <li>
                                <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="53.487" height="8.295" viewBox="0 0 53.487 8.295">
                                        <g id="pin1" transform="translate(-729.409 -2575.619)">
                                        <line id="Line_15" data-name="Line 15" x1="49.34" transform="translate(729.409 2579.766)" fill="none" stroke="#e6bb83" stroke-miterlimit="10" stroke-width="0.825"/>
                                        <path id="Path_50565" data-name="Path 50565" d="M291.431,172.684a4.147,4.147,0,1,1-4.148-4.147A4.148,4.148,0,0,1,291.431,172.684Z" transform="translate(491.465 2407.082)" fill="#f99202"/>
                                        </g>
                                    </svg>
                                </span>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/competitive-salaries.svg" width="33" alt="Competitive salaries">
                                    </span>
                                <span class="title">{{__('app.Competitive salaries')}}</span>
                            </div>
                        </li>
                        <li>
                                <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="95.351" height="8.294" viewBox="0 0 95.351 8.294">
                                        <g id="pin2" transform="translate(-729.409 -2662.964)">
                                            <line id="Line_17" data-name="Line 17" x1="91.203" transform="translate(729.409 2667.111)" fill="none" stroke="#3a325e" stroke-miterlimit="10" stroke-width="0.825"/>
                                            <path id="Path_50566" data-name="Path 50566" d="M320.938,234.247a4.147,4.147,0,1,1-4.148-4.146A4.147,4.147,0,0,1,320.938,234.247Z" transform="translate(503.821 2432.863)" fill="#3a325e"/>
                                        </g>
                                    </svg>
                                </span>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/housing-allowance.svg" width="33" alt="Housing allowance">
                                    </span>
                                <span class="title">{{__("app.Housing allowance")}}</span>
                            </div>
                        </li>
                        <li>
                                <span class="pin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="76.43" height="8.3" viewBox="0 0 76.43 8.3">
                                        <g id="pin3" transform="translate(0 -182.898)">
                                            <line id="Line_16" data-name="Line 16" x1="72.284" transform="translate(0 187.047)" fill="none" stroke="#e6bb83" stroke-miterlimit="10" stroke-width="0.825"/>
                                            <path id="Path_50567" data-name="Path 50567" d="M307.6,304.522a4.147,4.147,0,1,1-4.147-4.148A4.15,4.15,0,0,1,307.6,304.522Z" transform="translate(-231.172 -117.476)" fill="#f99202"/>
                                        </g>
                                    </svg>
                                </span>
                            <div class="text">
                                    <span class="icon">
                                        <img src="{{url('/')}}/front/new_assets/images/why-us-vector/transport-allowance.svg" width="33" alt="Transport allowance">
                                    </span>
                                <span class="title">{{__("app.Transport allowance")}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> <!-- /Why Us -->

    <!-- Our Success -->
    <section class="our-success">
        <h3 class="section-head mb-2">
                <span class="text">
                    <p>{{__('app.OursuccessState')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="container">
                <div class="row stats-numbers">
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">222</span>
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.Departments')}}</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">24</span>
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.certificates')}}</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">12</span>
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.Partners')}}</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">9</span>K
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.Products')}}</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">2</span>K
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.Clients')}}</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 d-flex align-items-center mb-3 stat-item">
                        <div class="circle-container">
                            <div class="circle">
                                <span class="num">80</span>K
                            </div>
                        </div>
                        <div class="text">
                            <span class="text-uppercase total">{{__('app.Total')}}</span>
                            <h5 class="text-capitalize stat-text">{{__('app.Sell')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row become-partner align-items-center">
                <div class="col-lg-4"></div>
                <div class="col-12 col-sm-6 col-lg-4 text-center mb-3 mb-sm-0">
                    <h4>{{__('app.Become Our Success Partner')}}</h4>
                    <a href="#" class="btn btn-partner">{{__('app.Start Now')}}</a>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 text-center">
                    <img src="{{url('/')}}/front/new_assets//images/rock.svg" alt="Become Our Success Partner">
                </div>
            </div>
            <div class="row students align-items-end">
                <div class="col-lg-7 vector mb-4 mb-lg-0 text-center">
                    <img src="{{url('/')}}/front/new_assets//images/graduation.svg" alt="graduation">
                </div>
                <div class="col-lg-5 form text-center">
                    <h4>{{__('app.Students and graduates')}}</h4>
                    <form method="GET" action=""
                          class="search-form mx-auto">
                        <label>{{__('app.Jumpstart your care:')}}</label>
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="{{__('app.search student jobs')}}" name="students_jobs">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn btn-main">
                                    {{__('app.Find Jobs')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Our Success -->

    <!-- News -->
    <section class="news">
        <h3 class="section-head mb-2">
                <span class="text">
                    <p>{{__('app.news')}}</p>
                </span>
        </h3>
        <div class="section-body">
            <div class="grid-container">
                <div class="item1">
                    <div class="card">
                        <a href="{{url('/')}}/front/new_assets//images/news1.png" class="image-link card-img-top">
                            <img src="{{url('/')}}/front/new_assets//images/news1.png" alt="news1">
                        </a>
                        <div class="card-body">
                            <span>1440 {{__('app.H')}}.</span>
                            <a href="#" class="card-title">
                                <h5>{{__('app.Dr.Faleh Bin Abdullah Alsuliman, Chairman of the Board of Directors')}}</h5>
                            </a>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="item2">
                    <div class="card">
                        <a href="{{url('/')}}/front/new_assets//images/news2.png" class="image-link card-img-top">
                            <img src="{{url('/')}}/front/new_assets//images/news2.png" alt="news2">
                        </a>
                        <div class="card-body">
                            <span>1440 {{__('app.H')}}.</span>
                            <a href="#" class="card-title">
                                <h5>{{__('app.Celebrate Eid al-Adha for a year')}}</h5>
                            </a>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="item3">
                    <div class="card">
                        <a href="{{url('/')}}/front/new_assets//images/news3.png" class="image-link card-img-top">
                            <img src="{{url('/')}}/front/new_assets//images/news3.png" alt="news3">
                        </a>
                        <div class="card-body">
                            <span>1440 {{__('app.H')}}.</span>
                            <a href="#" class="card-title">
                                <h5>{{__('app.Celebration of the blessed Eid al-Fitr for the year')}}</h5>
                            </a>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="item4">
                    <div class="card">
                        <a href="{{url('/')}}/front/new_assets//images/news4.png" class="image-link card-img-top">
                            <img src="{{url('/')}}/front/new_assets//images/news4.png" alt="news4">
                        </a>
                        <div class="card-body">
                            <span>1440 {{__('app.H')}}.</span>
                            <a href="#" class="card-title">
                                <h5>{{__('app.NCMS PARTICIPATED IN KFUPM CAREER DAY')}}</h5>
                            </a>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /News -->
</main>

<!-- Footer -->
@include('sections.footer')
<!-- /Footer -->

<script src="{{url('/')}}/front/new_assets/js/jquery-3.4.1.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/slick.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/jquery.nicescroll.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('/')}}/front/new_assets/js/main.js"></script>
<script>
    $(function (){
        $('.menu_head li a').on('click',function (){
            $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top},
                1000);
        });

    });
    $('.latest-job-card').on('click',function (){
        window.open($(this).attr('rel'));
    });
</script>
</body>
</html>
