@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="margin-top:45px">
            <div class="d-flex justify-content-center">

                <div class="col-md-4 col-md-offset-8">
                    <h4>Register | Users</h4>
                    <hr>
                    <form action="{{ route('auth.save') }}" method="post">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}

                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}

                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name"
                                value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">age</label>
                            <select name="age" class="form-control">
                                @for($i= 18; $i < 65; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address"
                                value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-bloovk btn-primary">Register</button>
                        <br>
                        <br>
                        <a href="{{ route('login') }}">Already have an account, Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
