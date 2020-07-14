@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.job_application_form', ['job' => $job])
    </div>
@endsection
