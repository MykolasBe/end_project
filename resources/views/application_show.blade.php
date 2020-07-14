@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.application_detail',['application' => $application])
        <h3>Applied for:</h3>
        @include('components.table', $table)
    </div>
@endsection
