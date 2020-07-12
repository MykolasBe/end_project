@foreach($jobs as $job)
    <div class="col-md-4">
        <a href="{!! route('jobs.show', $job->id) !!}}">
            <div>
                <img src="{{$job->img}}">
            </div>
            <div>
                <h3>{{$job->title}}</h3>
                <h4>{{$job->location}}</h4>
            </div>
        </a>
    </div>
@endforeach
