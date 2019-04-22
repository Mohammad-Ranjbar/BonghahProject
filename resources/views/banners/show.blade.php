@extends('layout')

@section('content')


    <h1>{{$banner->street}}</h1>

    <h2>{{$banner->price}}</h2>

    <div class="description">{{$banner->description}}</div>


    <form class="dropzone" action="/{{$banner->zip}}/{{$banner->street}}/photos" method="post">

        {{csrf_field()}}




    </form>


@stop