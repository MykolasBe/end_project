@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$job->title}}</h2>
        <div class="job-show-wrap">
            <div class="job-show-text">
                @foreach(json_decode($job->description) as $key => $description)
                    @switch($key)
                        @case('description')
                        <h3>Description:</h3>
                        @break
                        @case('requirements')
                        <h3>Requirements:</h3>
                        @break
                        @case('offer')
                        <h3>Offer:</h3>
                        @break
                    @endswitch
                    <div class="job-show-text-list">
                        @include('components.list',['list'=>$description])
                    </div>
                @endforeach
            </div>
            <div class="jobs-show-client">
                <div >
                    <img src="{!! $job->img !!}">
                </div>
                <h4>About the company:</h4>
                <p>{{ $job->client_description }}</p>
            </div>
        </div>
        <div>
            {!! $buttons !!}
        </div>
        <p>Confidentiality guaranteed. Only selected candidates will be informed.</p>
    </div>
@endsection
