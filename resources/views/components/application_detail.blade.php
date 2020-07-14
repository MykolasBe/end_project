<div>
    <h2>{{ $application->first_name }} {{ $application->last_name }}</h2>
    <h3>Contacts</h3>
    <div>
        <p>{{ $application->phone }}</p>
        <p>{{ $application->email }}</p>
        <p>{{ $application->location }}</p>
    </div>
    <h3>Education</h3>
    <div>
        @switch($application->education_degree)
            @case(\App\Application::HIGH_SCHOOL_DEGREE)
            <p>High School Diploma</p>
            @break
            @case(\App\Application::BACHELOR_DEGREE)
            <p>{{ $application->education }} Bachelor Degree </p>
            @break
            @case(\App\Application::MASTER_DEGREE)
            <p>{{ $application->education }} Masters Degree </p>
            @break
            @case(\App\Application::PHD_DEGREE)
            <p>{{ $application->education }} PHD Degree </p>
            @break
        @endswitch
        <p>{{ $application->languages }}</p>
    </div>
    <h3>Experience and Occupation</h3>
    <p>{{ $application->status }}</p>

    <p>{{ $application->work_experience }} From: {{ $application->work_from }}, To: {{ $application->work_to }}</p>
</div>
