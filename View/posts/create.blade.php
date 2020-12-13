@extends('Layouts.app')

@section('content')

<h1> Create Post</h1>

<!--<form method="post" action="/keya"> -->
{!! Form::open(['action' => 'App\Http\Controllers\postcontroller@store','files'=>true]) !!}


@csrf
<!-- {{ csrf_field() }} -->




<p>
    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
</p>
<p>
    <div class="form-group">
        {!! Form::file('file',['class'=>'form-control']) !!}
    </div>
</p>
<p>
    <div class="form-group">

        {!! Form::submit('Create post',['class'=>'btn btn-primary'])!!}
    </div>
</p>
{!! Form::close() !!}

@if(count($errors)>0)

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{$error}} </li>


        @endforeach
    </ul>
</div>



@endif
