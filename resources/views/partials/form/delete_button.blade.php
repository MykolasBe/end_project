<form action="{{ route('achievements.destroy', $achievement_id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete</button>
</form>
