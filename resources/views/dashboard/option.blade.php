<form action="{{ route('create.option') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="polls">Polls</label>
        <select name="poll_id" class="form-select" id="categories" aria-label="Default select example">
            @foreach ($polls as $poll)
                <option value="{{ $poll->id }}">{{ $poll->questions }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="options">Option</label>
        <input type="text" name="option" placeholder="Please enter options"/>
    </div>
    <button type="submit">Submit</button>

</form>