<!--doctype html-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, intial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Blog Section</title>
    <!--Stylesheet----------------------------------->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <!--fav-icon------------------------------------->
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrhh2rCgllg1Ac_V7P67YR7JMzmBCL2mAyrmxd6b9e_7jZtd3KZUMEaS6sjwmLIqiR11I&usqp=CAU"/>
    <!--poppins-font-family-------------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--font-awesome-------------------------->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--bootstrap-------------------------->   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @stack('style')
</head>
<body>
    <!--blog-section============================================================================-->
    <header>
        <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
        <div class="topnav" id="myTopnav">
            <a href="{{route('posts.index')}}">Home</a>
            <a href="{{route('posts.filterblogs')}}">All Blog</a>

            <div class="dropdown">
                <button class="dropbtn">
                    Category
                    <i class="fa fa-caret-down"></i>
                </button>
                    <div class="dropdown-content">
                        @foreach($categories as $item)
                            <a href="{{route('category.show', $item->id)}}" target="_blank">{{$item->category}}</a>
                        @endforeach
                    </div>
            </div>

            <div class="login-container">
                {{-- <a href="login.html" class="login-menu">Login</a> --}}
                @if(auth()->check())              
                    <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                    <a href="{{route('auth.dashboard')}}"><i class="fa fa-user"></i> Dashboard</a>
                @else
                    <a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a>
                @endif
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>

    {{-- Dynamic Design Code here --}}
    <main>
        @yield('content')
    </main>

    <footer>
        <p>© All Rights Reserved</p>
    </footer>

    <!-- scripts -->
    <script src="{{asset('js/index.js')}}"></script>
    <!--jquery-------------------------->   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!--bootstrap-------------------------->   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    @stack('js')
</body>
</html>