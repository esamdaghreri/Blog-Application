@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if(count($photos) > 2)
        <form action="{{route('deleteMedia')}}" method="POST" class="form-inline">
            @csrf
            <input type="hidden" name="_method" value="DELETE" class="form-controle">
            <div class="row col-sm-4">
                <select name="checkBoxArray" class="form-control">
                    <option value="" >Delete</option>
                </select>
                <button type="submit" name="delete_all" class="btn btn-primary form-control" value="Submit">Submit</button>
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"><input type="checkbox" name="checkBoxAll[]" id="option"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Created_at</th>
                    </tr>
                </thead>
                @if($photos)
                    @foreach($photos as $photo)
                        @if($photo->id != 1 and $photo->id != 2)
                            <tbody>
                                <tr>
                                    <th><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkboxes"></th>
                                    <th scope="row"><a href="{{route('media.edit', $photo->id)}}">{{$photo->id}}</a></th>
                                    <td><img height="50" src="/images/{{$photo->file}}"></td>
                                    <td>{{$photo->created_at->diffForHumans()}}</td>
                                    {{-- <td>{{$photo->email->diffForHumans()}}</td> --}}
                                    <td>
                                        <input  type="hidden" value="{{$photo->id}}" name="photo_id">
                                        <input name="delete_single" type="submit" value="DELETE" class="btn btn-danger">
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                @endif
            </table>
        </form>
    @else
        <h1>There is not Medias available</h1>
    @endif
@endsection

@section('scripts')
        <script>
            $(document).ready(function() {
                $('#option').click(function() {
                    if(this.checked){
                        $('.checkboxes').each(function() {
                            this.checked = true;
                        });
                    }else{
                        $('.checkboxes').each(function() {
                            this.checked = false;
                        });
                    }
                });
            });
        </script>
@endsection