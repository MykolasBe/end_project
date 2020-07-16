@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.job.job_listings', ['jobs.jobs' => $jobs])
    </div>
@endsection
