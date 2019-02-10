{{--for validation of  post--}}
@if(count($errors) > 0)
        @foreach($errors->all() as $error)

            <div class="alert alert-danger">
                {{$error}}
            </div>

        @endforeach
@endif


{{--for success of post--}}
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

{{--for error of  post--}}
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif