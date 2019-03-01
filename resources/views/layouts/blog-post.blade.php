<!DOCTYPE html>
<html lang="en">

<head>

@include('partials.meta-head')

<!-- Bootstrap Core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/blog-post.css')}}" rel="stylesheet">


</head>

<body>
  <div id="app">
      @include('partials.header')
    <!-- Page Content -->
    <div class="container">
      <!-- Navigation -->

      <div class="row">
        <div class="col-lg-12">
          @include('errors.message')  
        </div>
        <!-- Post Content Column -->
        <div class="col-lg-8">

          @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                @yield('categories')
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Esam Daghreri 2019</p>
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <script src="{{asset('js/app.js')}}" ></script>
  <script src="{{asset('js/jquery.min.js')}}" ></script>  
  <script src="{{asset('js/bootstrap.bundle.min.js')}}" ></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@yield('scripts')
</body>

</html>
