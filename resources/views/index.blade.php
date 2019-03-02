    @extends('layouts.app')
    @section('style')
        <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">        
    @endsection
    @section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/images/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
                <h1>Esam's Blog</h1>
                <span class="subheading"></span>
            </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                    <a href="{{route('home.post', $post->slug)}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                                {!!$post->body!!}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$post->user->name}}</a>
                            {{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <hr> 
                    <!-- Pager -->
                    
                </div>
                </div>
            @endforeach
            <div class="row d-flex justify-content-center">
                {{ $posts->links()}}
            </div>
        @endif
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                <a href="#">
                    <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                </li>
                <li class="list-inline-item">
                <a href="#">
                    <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                </li>
                <li class="list-inline-item">
                <a href="#">
                    <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Esam Daghreri 2019</p>
            </div>
        </div>
        </div>
    </footer>
@endsection
@section('scripts')
    <!-- Custom scripts for this template -->
    <script src="{{asset('js/clean-blog.min.js')}}" ></script>
@endsection