<form action="{{ route('postForm') }}" method="POST">
    @csrf
    <input type="text" name="HoTen">
    <input type="submit">
</form>