<form action="{{ route('jobs.destroy', $job_id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete</button>
</form>
