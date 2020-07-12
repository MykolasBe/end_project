@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.job_listings', ['jobs' => $jobs])
    </div>
@endsection
