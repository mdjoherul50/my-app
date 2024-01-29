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
            <h2>Update the Blog</h2>
        </div>
        <hr>
        <form action="{{route('posts.update', $item->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-item">
              <label for="author">Author Name:</label>
              <input type="author" id="author" name="author" value="{{$item->author}}" disabled>
            </div>

            <div class="form-item">
              <label for="title">Title Name:</label>
              <input type="title" id="title" name="title" value="{{$item->title}}">
            </div>

            <div class="form-item">
              <label for="article">Article:</label>
              <textarea id="article" name="article" rows="10" cols="50" placeholder="Type your blog here...">{{$item->article}}</textarea>
            </div>

            <div class="row">
              <div class="col">
                <div class="card p-4">
                  <div class="card-body">
                    <div class="form-item">
                      <label for="category">Category:</label>
                      <select id="category" name="category_id">
                        @foreach($category as $categoryItem)
                          <option value="{{$categoryItem->id}}" {{$item->category_id == $categoryItem->id ? 'selected' : ''}}>
                            {{$categoryItem->category}}
                          </option>                           
                        @endforeach
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
                      <input type="file" id="image_path" name="image_path" value="{{$item->image_path}}">
                    </div>
                  </div>
                </div>
              </div>
              </div>
          
            <button class="form-button" type="submit">Update</button>

            <div class="row pt-3">
              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
            </div>
        </form>

        <div class="text-center p-4">
          <button class="btn btn-primary">
            <a style="text-decoration:none; color: #fff;" href="{{route('posts.allpost')}}">Back</a>
          </button>
        </div>

    </div>
  </section>
@endsection
        
@push('js')
    <script>

    </script>
@endpush
