@extends('template.master')
@push('style')
  <style>

  </style>
@endpush

@section('content')
  {{-- Custome Code here --}}
  <section id="container">
    <!--blog-heading--------------->
    <div class="blog-heading">
        <h3 class="pt-5">All Blogs</h3>
    </div>

    <div class="blog-container">
      <p class="pt-3">Filter By Category:</p>
      <div class="blog-text">
        <a style="color:#fffdfd;" target="" href="{{route('posts.filterblogs')}}" class="btn btn-info {{!$selectedCategoryId ? 'active' : ''}}">
          Show All
        </a>
      </div>

      @foreach($categories as $category)
      |
        <div class="blog-text">
          <a style="color:#fffdfd;" target="" href="{{route('posts.filterblogs', ['category_id' => $category->id])}}" class="btn btn-info {{$selectedCategoryId == $category->id ? 'active' : ''}}">
            {{ $category->category }}
          </a>
        </div>
      @endforeach
    </div>

    <!--container---------------->
    <div class="blog-container">
      @foreach($post as $item)
        <!---------box-------------->
        <div class="blog-box">
            <!--img---->
            <div class="blog-img">
                <img src="{{asset($item->image_path)}}" alt="blog">
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
  </section>
@endsection
            
@push('js')
  <script>

  </script>
@endpush
