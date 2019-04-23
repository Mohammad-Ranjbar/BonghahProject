@extends('layout')

@section('content')

    <div class="row">

        <div class="col-md-3">
    
        <h1>{{$banner->street}}</h1>
    
        <h2>{{$banner->price}}</h2>
    
        <div class="description">{{$banner->description}}</div>

    </div>
    
    <div class="col-md-9">

        @foreach($banner->photos as $photo)

            <img src="/{{$photo->path}}" alt="">

        @endforeach

    </div>

    </div>
    <form class="dropzone" id="addPhotosForm" action="/{{$banner->zip}}/{{$banner->street}}/photos" method="post">

        {{csrf_field()}}




    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <script>

        Dropzone.options.addPhotosForm ={

            paramName   : "photo",

            maxFilesize :3,

            acceptedFiles   :'.jpg, .jpeg, .png, .bmp'


        };

    </script>


@stop