<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCMS | Jobs</title>
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
                    <li class="breadcrumb-item active">{{__('app.Jobs')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4 mb-4 mb-md-0">
                <form action="#" method="get">
                    <div class="filter-jobs">
                        <h1 class="title">Jobs By Category</h1>
                        <ul class="by-title">
                            @foreach($categories as $category)
                            <li>
                                <div class="check-control">
                                    <label class="control control-checkbox">
                                        <input type="checkbox" name="by_title"/>
                                        <div class="control-indicator"></div>
                                    </label>
                                    <span>{{$category->name}}</span>
                                </div>
                                <span>{{count($category->jobs)}}</span>
                            </li>
                            @endforeach

                        </ul>
                        <h2 class="title mt-4">Jobs By Location</h2>
                        <ul class="by-exp">
                            @foreach($locations as $location)
                                <li>
                                    <div class="check-control">
                                        <label class="control control-checkbox">
                                            <input type="checkbox" name="by_title"/>
                                            <div class="control-indicator"></div>
                                        </label>
                                        <span>{{$location->location}}</span>
                                    </div>
                                    <span>{{count($location->jobs)}}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-5 pt-2">
                            <button type="submit" class="btn btn-search-filter">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <ul class="latest-jobs-container jobs-page-card m-0 p-0 h-auto">
                    @foreach($jobs as $key => $job)
                        <li class="latest-job-card" rel="{{route('jobs.jobDetail',$job->slug)}}">
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
                {!! $jobs->links()!!}
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
<script>
    $('.latest-job-card').on('click',function (){
        window.open($(this).attr('rel'));
    });
</script>
</body>
</html>