<form method="POST" action="/profile">
    @csrf
    <label for="title">Post Name</label>
    <input id="title" type="text" class="@error('title') is-invalid @enderror">
    <br>
    <button type="submit">Submit</button>
</form>
