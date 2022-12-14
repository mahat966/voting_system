@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Heres some questions for today</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Questions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($polls as $poll)
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $poll->questions }}</td>
                        <td><a href="/dashboard/singlepoll/{{ $poll->id }}" class="btn btn-outline-success">Answer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
