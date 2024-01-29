@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
  {{-- Custome Code here --}}
  <section id="container">
    <div class="text-center p-4">
        <h2 class="display-5">Show specific Post</h2>
        <hr> 
    </div>
                
    <table class="table table-striped table-bordered text-center">
        <tr>
          <th>Category Name</th>
          <th>Image</th>
          <th>Title</th>
          <th>Article</th>        
        </tr>
        @foreach($list as $item)
        <tr>
          <td>{{$item->category->category}}</td>
          <td><img src="{{asset($item->image_path)}}" alt="post_image" width="70px"></td>  
          <td>{{$item->title}}</td>
          <td>{{$item->article}}</td> 
        </tr>
        @endforeach
    </table>

    <div class="text-center p-4">
      <button class="btn btn-primary">
          <a style="text-decoration:none; color: #fff;" href="{{route('posts.allpost')}}">Back</a>
      </button>
    </div>
  </section>
@endsection
                
@push('js')
    <script>

    </script>
@endpush