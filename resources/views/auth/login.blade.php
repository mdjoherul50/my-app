@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
    {{-- Custome Code here --}}
    <section id="container">
        <div class="form-area">
            <div class="form-title">
                <h2>Login</h2>
            </div>

            {{-- Another way to show Blade page input validation --}}
            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form action="{{route('auth.authentication')}}" class="login-form" method="POST">
                @csrf
                <div class="form-item">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="User email" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="User password">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <button class="form-button" type="submit">Login</button>

                    <div class="row pt-3">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>

                    <div class="pt-5">
                        <span>If you are new user, please create an account!</span>
                        <a href="{{route('register')}}" class="btn btn-primary">Register</a>
                    </div>
            </form>
        </div>
    </section>
@endsection
                
@push('js')
    <script>

    </script>
@endpush