@extends('layouts.app')


@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection


@section('content')
<h1 class="text-center">Upload Media</h1>

<form method="POST" action="AdminMeadiasController@store" class="dropzone">
</form>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection