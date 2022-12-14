@extends('layouts.app')
@section('content')
<form action="{{ route('create.poll') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3>Create Poll</h3>
    <div class="form-group">
        <label for="questions"> Questions For The Day</label>
        <input type="text" name="questions" id="questions" placeholder="Please Create Question"/>
    </div>
    <div class="form-group">
        <label for="opening datetime">Starts At</label>
        <input type="date" name="opens" id="openingdate"/>
    </div>
    <div class="form-group">
        <label for="Closing datetime"> Ends At</label>
        <input type="date" name="closes" id="closingdate"/>
    </div>
    <button type="submit" class="btn btn-success"> Create Poll</button>
</form>
</form>
@endsection