@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.job.job_application_form', ['job' => $job])
    </div>
@endsection
