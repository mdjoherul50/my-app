@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
  {{-- Custome Code here --}}
  <section id="container">  
    <div class="p-5">   
      <h2>Add New Customer</h2>
      <hr>                  
      <form action="{{route('customers.store')}}" method="POST">
        @csrf

        <div class="form-group">        
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" placeholder="Full name">
            @error('name')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" placeholder="Email address">
            @error('email')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">

          <label for="phone">Phone Number:</label>
          <input type="text" name="phone" id="phone" placeholder="Phone number">
            @error('phone')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">

          <label for="address">Address:</label>
          <input type="text" name="address" id="address" placeholder="Address">
            @error('address')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
      <button class="btn btn-primary" type="submit">Submit</button>
      </form>

  </section>
@endsection
        
@push('js')
    <script>

    </script>
@endpush