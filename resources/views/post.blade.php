@extends('layouts.blog-post')
@section('content')
  <!-- Title -->
  <h1 class="mt-4">{{$post->title}}</h1>

  <!-- Author -->
  <p class="lead">
    by
      <a href="#">{{$post->user->name}}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p>Posted  {{$post->created_at? $post->created_at->diffForHumans() : '-'}}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-fluid rounded" src="{{ isset($post->photo->file) ?  "/images/".$post->photo->file   : "https://via.placeholder.com/750x200" }}" alt="">

  <hr>

  <!-- Post Content -->
  <p>{!!$post->body!!}</p>
  <hr>

  @if(auth::check())
    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
        <form method="POST" action="{{route('comments.store')}}">
          @csrf
          <input type="hidden" name="post_id" value="{{$post->id}}">
          <div class="form-group">
            <textarea class="form-control" rows="3" name="body"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  @endif
  @if(count($comments) > 0)
    <!-- Comment with nested comments -->
    @foreach ($comments as $comment)
      <div class="media mb-4">
        <img height="50" width="50" class="d-flex mr-3 rounded-circle" src="/images/{{$comment->photo}}" alt="">
        <div class="media-body">
          <h5 class="mt-0">{{$comment->author}} 
            <small>{{$comment->created_at? $comment->created_at->diffForHumans() : '-'}}</small>
          </h5>
          {!! $comment->body !!}
          <div class="card-body">
            <form method="POST" action="{{route('create.reply')}}">
              @csrf
              <input type="hidden" name="comment_id" value="{{$comment->id}}">
              <div class="form-group">
                <textarea class="form-control" rows="1" name="body"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Reply</button>
            </form>
          </div>
          @if(count($comment->replies) > 0)
            @foreach ($comment->replies as $reply)
              @if($reply->is_active == 1)
                <div class="media mt-4">
                  <img width="50" height="50" class="d-flex mr-3 rounded-circle" src="/images/{{$reply->photo}}" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">{{$reply->author}}  <small>{{$reply->created_at? $reply->created_at->diffForHumans() : '-'}}</small></h5>
                      {{$reply->body}}
                      <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary float-right">Reply</button>
                        <div class="comment-reply comment-reply-hidden">
                          <div class="card-body">
                            <form method="POST" action="{{route('create.reply')}}">
                              @csrf
                              <input type="hidden" name="comment_id" value="{{$comment->id}}">
                              <div class="form-group">
                                <textarea class="form-control" rows="1" name="body"></textarea>
                              </div>
                              <button type="submit" name="submit" class="btn btn-primary">Reply</button>
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    @endforeach
  @endif
@endsection

@section('categories')
<div class="col-lg-6">
  <ul class="list-unstyled mb-0">
    @foreach($post->categories as $category)
      <li>
        <a href="#">{{$category->name}}</a>
      </li>
    @endforeach
  </ul>
</div>
@endsection


@section('scripts')
  <script>
    $(document).ready(function(){
      $('.toggle-reply').on('click', function(){
        $(this).next().toggleClass( "comment-reply-display", "comment-reply-hidden" )
      });
    })
  </script>
@endsection 