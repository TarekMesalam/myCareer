@extends('layouts.front')
@section('header-text')
    <h1 class="hidden-sm-down"><i class="icon-ribbon"></i> @lang('modules.front.homeHeader') </h1>
    <h4 class="hidden-sm-up"><i class="icon-ribbon"></i> @lang('modules.front.homeHeader') </h4>
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div data-provide="shuffle">
                <div class="text-center gap-multiline-items-2 job-filters" data-shuffle="filter">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                            <h2 class="mb-5">@lang('modules.front.jobCategoriesTitle')</h2>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-12 col-md-6 col-lg-4 portfolio-2">
                                <div id="jobCategories" data-shuffle="button" data-group="{{ $category->name }}" class="job-opening-card">
                                    <div class="card card-bordered">
                                        @if($category->photo == null)
                                            <img class="card-img-top" src="logo-not-found.png" alt="{{ $category->name }}">
                                        @else
                                            <img class="card-img-top" src="user-uploads/category-photos/{{ $category->photo }}" alt="{{ $category->name }}">
                                        @endif
                                        <div class="card-block">
                                            <h5 class="card-title">{{ ucwords($category->name) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(count($categories) == 0)
                    <h3>@lang('modules.front.noCategories')</h3>
                @endif
                <br><br>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                        <h2 class="mb-5">@lang('modules.front.jobs')</h2>
                    </div>
                </div>
                <p>&nbsp;</p>
                @if(count($locations) == 0)
                    <h3>@lang('modules.front.noLocations')</h3>
                @endif
                @if(count($locations) > 0)
                    <div class="text-center gap-multiline-items-2 job-filters" data-shuffle="filter">
                        <button class="btn btn-w-md btn-outline btn-round btn-primary active" data-shuffle="button">@lang('modules.front.locationAllTitle')</button>
                        @foreach($locations as $location)
                            <button class="btn btn-w-md btn-outline btn-round btn-primary" data-shuffle="button" data-group="{{ $location->location }}">{{ ucwords($location->location) }}</button>
                        @endforeach
                    </div>
                @endif
                <p>&nbsp;</p>
                @if(count($jobs) == 0)
                    <h3>@lang('modules.front.noJobs')</h3>
                @endif
                <div class="row gap-y" data-shuffle="list">
                    @foreach($jobs as $job)
                        <div class="col-md-8 mb-5 mb-md-0" data-shuffle="item" data-groups="{{ $job->location->location.','.$job->category->name }}">
                            <div id="jobs" class="rounded border jobs-wrap">
                                <a href="{{ route('jobs.jobDetail', [$job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                    <div class="company-logo blank-logo text-center text-md-left pl-3">
                                        @if($job->company->logo == null)
                                            <img src="logo-not-found.png" alt="{{ $job->title }}" class="img-fluid mx-auto">
                                        @else
                                            <img src="{{ $job->company->logo }}" alt="{{ $job->title }}" class="img-fluid mx-auto">
                                        @endif
                                    </div>
                                    <div class="job-details">
                                        <div class="p-3 align-self-center">
                                            <h3>{{ ucwords($job->title) }}</h3>
                                            <div class="d-block d-lg-flex">
                                                <div class="mr-3">{{ ucwords($job->category->name) }}</div>
                                                <div class="mr-3"><i class="fa fa-map-marker"></i> {{ ucwords($job->location->location).', '.ucwords($job->location->country->country_name) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="jobLeftDays" class="job-category align-self-center">
                                        <div class="p-3">
                                            <span class="text-info p-2 rounded border border-info">{{ \Carbon\Carbon::parse( $job->end_date )->diffInDays( date('Y-m-d') ) }} days left</span>
                                        </div>
                                    </div>  
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
