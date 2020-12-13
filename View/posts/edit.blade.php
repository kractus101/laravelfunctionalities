@extends('Layouts.app')

@section('content')

<h1>Edit Post</h1>
<!--<form method="post" action="/posts/{{$post->id}}"> -->

{!! Form::model($post,['method'=>'PATCH','action' => ['App\Http\Controllers\postcontroller@update',$post->id]]) !!}

@csrf
<!-- {{ csrf_field() }} -->
<!--  <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">
    <input type="submit" name="submit" value="UPDATE">-->

<div class="form-group">
    {!! Form::label('title','Title')!!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<p>
    <div class="form-group">

        {!! Form::submit('Edit post',['class'=>'btn btn-primary'])!!}
        {!! Form::submit('Delete post',['class'=>'btn btn-primary'])!!}

    </div>
</p>
{!! Form::close() !!}
<!--</form>
<form method="post" action="/posts/{{$post->id}}">
    @csrf
     {{ csrf_field() }} 
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" name="submit" value="DELETE">
</form> -->