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
                <h2>Update the Category</h2>
            </div>
            <hr>               
            <form action="{{route('category.update', $item->id)}}" method="POST">
              @csrf
              @method('PUT')
                <div class="form-item">
                  <label for="category">Category Name:</label><br>
                  <input type="text" id="category" name="category" value="{{$item->category}}" required>
                </div>

                <button class="form-button" type="submit">Update</button>

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
