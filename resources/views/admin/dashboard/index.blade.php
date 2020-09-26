@extends('layouts.app')
@section('content')
    @if(!$progress['progress_completed'])
        @include('admin.dashboard.get_started')
    @endif
    <div class="row ">

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $totalOpenings }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.totalOpenings')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $totalApplications }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.totalApplications')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $totalHired }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.totalHired')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $totalRejected }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.totalRejected')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $newApplications }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.newApplications')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $shortlisted }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.shortlistedCandidates')</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center rounded">
                    <h1 class="font-light text-white">{{ $totalTodayInterview }}</h1>
                    <h6 class="text-white">@lang('modules.dashboard.todayInterview')</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
