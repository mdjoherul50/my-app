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
                <h2>Registration</h2>
            </div>
            <form action="{{route('auth.store')}}" class="register-form" method="POST">
                @csrf
                <div class="form-item">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Full name" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-item">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Email address" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-item">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="confirm_password" placeholder="confirm Password">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <button class="form-button" type="submit">Register</button>
            </form>
        </div>
    </section>
@endsection

@push('js')
    <script>

    </script>
@endpush