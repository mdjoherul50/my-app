@extends('template.master')
@push('style')
    <style>

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
          <span>Recent Posts</span>
          <h3>My Blog</h3>
      </div>

      <!--container---------------->
      <div class="blog-container">
          @foreach($lists as $item)
            <!---------box-------------->
            <div class="blog-box" style="height: 75%; width: 25%">
                <!--img---->
                <div class="blog-img">
                    <img src="{{asset($item->image_path)}}"
                        alt="blog">
                </div>
                <!--text--->
                <div class="blog-text">
                    <span>{{$item->created_at->format('j F Y')}} | {{$item->category->category}}</span>
                    <a href="#" class="blog-title">{{$item->title}}</a>
                    <p>{{ Illuminate\Support\Str::limit(strip_tags($item->article), 100) }}</p>
                    <div class="blog-btn-section">
                        <a href="{{route('posts.publicshow', $item->id)}}" class="btn btn-sm btn-outline-secondary">Read More</a>
                        <p class="blog-comment"><i class="fa fa-user mr-2"></i>{{$item->author}}</p>
                    </div>
                </div>
            </div>
          @endforeach
      </div>

      <div style="display: flex; flex-direction: column; align-items: center;">
        {{$lists->links('pagination::bootstrap-4')}}
      </div>
      
    </section>
  </main>
@endsection
            
@push('js')
    <script>

    </script>
@endpush
