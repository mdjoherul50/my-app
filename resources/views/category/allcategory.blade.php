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
                    <a style="text-decoration:none; color: #fff;" href="{{route('category.create')}}">Add</a>
                </button>
            </div>

            <div class="text-center p-4 col-md-4">
                <h2 class="display-5">Admin All Category List</h2> 
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
                <th>Category Name</th>
                <th>Created Time</th>
                <th>Updated Time</th>

                <th>Action</th>
            </tr>
            @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->category}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>

                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="{{route('category.show', $item->id)}}">All Post</a>
                        </div>

                        <div class="col">|</div>

                        <div class="col-md-3">
                            <a class="btn btn-warning" href="{{url('/categorys/'.$item->id.'/edit')}}">Edit</a>
                        </div>

                        <div class="col">|</div>
                        
                        <div class="col-md-3">
                            <form action="{{url('/categorys/'.$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    </div>
                </td> 
            </tr>
            @endforeach
        </table>

    </section>
@endsection
                
@push('js')
    <script>

    </script>
@endpush