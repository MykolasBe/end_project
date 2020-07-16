<form action="{{ route('application.apply', $job->id) }}" method="POST">
    @csrf
    <button>Send Application</button>
</form>
