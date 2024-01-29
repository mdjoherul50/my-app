@extends('template.master')
@push('style')
    <style>
        .blog-box {
            width: 800px;
        }
    </style>
@endpush

@section('content')
  {{-- Custome Code here --}}
  <div class="hero-image pt-5">
      <div class="hero-text">
          <h1>Awesome Blog</h1>
          <p>Best Blog Site On The Planet</p>
          <a class="btn-banner" href="{{route('posts.create')}}">Start Now</a>
      </div>
  </div>

  <main>
    <section id="container">
            <!--blog-heading--------------->
            <div class="blog-heading">
                <h3>My Blog</h3>
            </div>

            <!--container---------------->
            <div class="blog-container">
                @foreach($list as $item)
                <!--box------------->
                <div class="blog-box">
                    <!--img---->
                    <div class="blog-img">
                        <img src="{{asset($item->image_path)}}"
                            alt="blog">
                    </div>
                    <!--text--->
                    <div class="blog-text">
                        <span>{{$item->created_at->format('j F Y')}} | {{$item->category->category}}</span>
                        <a href="#" class="blog-title">{{$item->title}}</a>
                        <p>{{$item->article}}</p>
                        <div class="blog-btn-section">
                            <p class="blog-comment"><i class="fa fa-user mr-2"></i>{{$item->author}}</p>
                            <a href="{{route('posts.filterblogs')}}" class="btn btn-sm btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
  </main>
@endsection
            
@push('js')
    <script>

    </script>
@endpush
