@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
    {{-- Custome Code here --}}
    <section id="container">
        <div class="row">
            <div class="text-center p-4 col-md-4">
                <button class="btn btn-primary">
                    <a style="text-decoration:none; color: #fff;" href="{{route('customers.create')}}">Add</a>
                </button>
            </div>

            <div class="text-center p-4 col-md-4">
                <h2 class="display-5">All Customers List</h2> 
            </div>

            <div class="text-center p-4 col-md-4">
                <button class="btn btn-primary">
                    <a style="text-decoration:none; color: #fff;" href="{{url('/dashboard')}}">Back</a>
                </button>
            </div>
        </div>
        <hr>

        <div class="row pt-3">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="row pl-3 pt-3">
            @if(session('destroy'))
                <div class="alert alert-danger">
                    {{ session('destroy') }}
                </div>
            @endif
        </div>
        
        <table class="table table-striped table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            @foreach ($customers as $key => $customer)
            <tr>
               
                <td>{{ $customers->firstItem() + $key }}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td> 
            </tr>
            @endforeach
        </table>
        {{ $customers->links() }}
    </section>
@endsection
                
@push('js')
    <script>

    </script>
@endpush