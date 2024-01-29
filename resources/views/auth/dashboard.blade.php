@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
    {{-- Custome Code here --}}
    <section id="container">
        <div class="p-5">
            <h2>Logged in as:</h2>
            <hr>
            <a class="btn btn-sm btn-primary" href="{{ route('user.edit', $user->id) }}">Edit Profile</a>
            <p>Name: <b>{{ $user->name }}</b></p>
            <p>Email: <b>{{ $user->email }}</b></p>
        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('posts.allpost') }}" class="btn btn-primary">All Post</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.allcategory') }}" class="btn btn-primary">All Category</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">All Customers</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script></script>
@endpush
