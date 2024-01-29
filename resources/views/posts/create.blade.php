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
            <h2>Post A New Blog</h2>
        </div>
        <hr> 
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-item">
              <label for="author">Author Name:</label>
              <input type="author" id="author" name="author" value="{{$user->name}}">
                @error('author')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-item">
              <label for="title">Title:</label>
              <input type="title" id="title" name="title" value="{{old('title')}}">
                @error('title')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-item">
              <label for="article">Article:</label>
              <textarea id="article" name="article" rows="10" cols="50" placeholder="Type your article here..." value="{{old('article')}}"></textarea>
                @error('article')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="row">
              <div class="col">
                <div class="card p-4">
                  <div class="card-body">
                    <div class="form-item">
                      <label for="category">Category:</label>
                      <select id="category" name="category_id" value="{{old('category_id')}}">
                        @isset($category)
                          @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>                           
                          @endforeach
                        @endisset
                      </select>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="form-item">
                      <label for="image_path">Blog Image:</label>
                      <input type="file" id="image_path" name="image_path" value="{{old('image_path')}}">
                        @error('image_path')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button class="form-button" type="submit">Post</button>

            <div class="row pt-3">
              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
            </div>
        </form>
    </div>
  </section>
@endsection
        
@push('js')
    <script>

    </script>
@endpush