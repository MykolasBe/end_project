<form action="{{ route('application.apply', $job->id) }}" method="POST">
    @method('GET')
    @csrf
    <h4>Apply now</h4>
    <label>
        <span>Your Email</span>
        <input type="text" name="email">
    </label>
    <button>Send Application</button>
</form>
