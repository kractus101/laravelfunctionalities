@extends('Layouts.app')

@section('content')

<h1><a href="{{route('posts.edit',$post->id)}}">{{$post->body}}</a></h1>