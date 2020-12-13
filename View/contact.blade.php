@extends('Layouts.app')

@section('content')
<h1> I am from contact blade</h1>

@if(count($people))

<ul>
    @foreach($people as $person)

    <li>{{$person}}</li>

    @endforeach
</ul>


@endif

@stop