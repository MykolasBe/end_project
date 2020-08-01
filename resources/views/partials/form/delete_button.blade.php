<form action="{{ $route }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete</button>
</form>
