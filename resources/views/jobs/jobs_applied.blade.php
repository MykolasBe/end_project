@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($jobs as $key => $job)
        <div>
            <h2>{{ $job->title }}</h2>
            <h4>{{ $job->location }}</h4>
            <h4>Applied for job</h4>
            @include('components.table', ['headers' => [
                    'Name',
                    'Birth Date',
                    'Location',
                    'Education',
                    'Languages',
                    'Work Experience',
                    'Work Type',
                    'Actions'
                    ],
                    'rows' => $rows[$key]
            ])
        </div>
        @endforeach
    </div>
@endsection
