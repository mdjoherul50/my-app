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
                <h2>Create a Category</h2>
            </div>
            <hr>               
            <form action="{{route('category.store')}}" method="POST">
              @csrf
                <div class="form-item">
                  <label for="category">Category Name:</label><br>
                  <input type="text" id="category" name="category" value="{{old('category')}}" required>
                </div>

                <button class="form-button" type="submit">Create</button>

                <div class="text-center p-4">
                  <button class="btn btn-primary">
                    <a style="text-decoration:none; color: #fff;" href="{{route('category.allcategory')}}">Back</a>
                  </button>
                </div>
            </form>
              
          </div>
      </section>
@endsection
          
@push('js')
    <script>

    </script>
@endpush
