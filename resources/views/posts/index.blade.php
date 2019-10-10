@extends('layouts/app')

@section('content')
<h1>Posts</h1>
@if (count($posts))

<ul class="list-group ">
    @if (count($posts)>0)
    @foreach ($posts as $post)
    <a href=" posts/{{$post->id}}" class="navbar-brand text-dark text-truncate">
    <div class="well">
        <li class="list-group-item">

           
                <div class="row">
                    <div class="col-md3 col-sm-3">
                    <img style="width:100%" class="" src="/storage/cover_images/{{$post->image}}" alt="{{$post->image}}">
                    </div>
                    <div class="col-md9 col-sm-9">
                        <h4 class="">
                            {!!$post->title!!}
                        </h4>
                        <br>
                        <p>{!!$post->body!!}</p>
                        
                        <small>written {{$post->created_at}}, Last Edited {{$post->updated_at}} By:
                                {{$post->user->name}}
                        </small>
                    </div>
                </div>
          
            
            
        </li>
        <br>
        
    </div>
</a>
            
    @endforeach

    {{$posts->links()}}
    @else
    <div class="alert text-center alert-danger" role="alert">
        No Posts Found!!
    </div>
    @endif
</ul>
@endif

@endsection