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
                <a style="text-decoration:none; color: #fff;" href="{{route('posts.create')}}">Add</a>
            </button>
        </div>

        <div class="text-center p-4 col-md-4">
            <h2 class="display-5">Admin All Posts List</h2> 
        </div>
  
        <div class="text-center p-4 col-md-4">
            <button class="btn btn-primary">
                <a style="text-decoration:none; color: #fff;" href="{{url('/dashboard')}}">Back</a>
            </button>
        </div>
      </div>
      <hr>
  
      <div class="row pl-3 pt-3">
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
            <th>Author Name</th>
            <th>Image</th>
            <th>Title</th>
            <th>Article</th>
            <th>Category Name</th>
            <th>Created Time</th>
            <th>Updated Time</th>

            <th style="width: 16%;">Action</th>
        </tr>
        @foreach($list as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->author}}</td>
            <td><img src="{{asset($item->image_path)}}" alt="post_image" width="70px"></td>
            <td>{{$item->title}}</td>
            <td>{{ Illuminate\Support\Str::limit(strip_tags($item->article), 75) }}</td>
            <td>{{$item->category->category}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>

            <td>
                <div class="row"> 
                    <div class="col-md-4">
                        {{-- <a class="btn btn-sm btn-primary" href="{{url('/allposts/'. $item->id)}}">View</a> --}}
                        <a class="btn btn-sm btn-primary" href="{{route('posts.show', $item->id)}}">View</a>
                    </div>

                    <div class="col-md-4">
                        {{-- <a class="btn btn-warning" href="{{url('/posts/'.$item->id.'/edit')}}">Edit</a> --}}
                        <a class="btn btn-sm btn-warning" href="{{route('posts.edit', $item->id)}}">Edit</a>
                    </div>
                    
                    <div class="col-md-4">
                        <form action="{{url('/posts/'.$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <div style="display: flex; flex-direction: column; align-items: center;">
        {{$list->links('pagination::bootstrap-4')}}
    </div>

  </section>
@endsection
                
@push('js')
    <script>

    </script>
@endpush