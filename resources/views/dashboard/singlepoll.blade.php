@extends('layouts.app')
@section('content')
    <h1>No 1 Question</h1>
    <form action="{{ route('cast.answer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @dd($polls); --}}
        <div class="form-group">
            <input type="hidden" name="poll_id" value="{{ $polls->id }}" />
            <p>{{ $polls->questions }}</p>
        </div>
        <div class="form-group">
            <select name="option_id" class="form-select" id="categories" aria-label="Default select example">
                @foreach ($polls->options as $option)
                    <option value="{{ $option->id }}">{{ $option->option }}</option>
                @endforeach
            </select>
        </div><br>

        <button type="submit" class="btn btn-success"> Submit</button>

    </form>
@endsection
