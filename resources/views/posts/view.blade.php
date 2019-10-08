@extends('layouts/app')

@section('content')

<a href="/posts" class="btn btn-secondary"> Go Back</a>
<br>
<br>
<div class="post-head">
    <h2>{!!$post->title!!}</h1>
</div>

<div class="container post-body">
    <h4>{!!$post->body!!}</h1>
</div>

<hr>
<small class="muted">written {{$post->created_at}}, Last Edited {{$post->updated_at}}  By: {{$post->user->name}}</small>
<hr>
@if (!Auth::guest()&& (Auth::user()->id==$post->user->id))
<a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">EDIT</a>

{!! Form::open(['action'=> ['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'float-right' ])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn-danger btn'])}}
{!! Form::close()!!}  
@endif

@endsection