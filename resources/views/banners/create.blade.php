@extends('layout')

@section('content')

    <h1>Selling Your Home? </h1>
    <hr>



        <form action="{{route('banners.store')}}"
              method="POST"
              enctype="multipart/form-data"
              role="form"
                >

            @include('banners.form')

        </form>



    @if(count($errors)>0)

        <script>

            swal("Good job!", "", "error");
        </script>
        <div class="alert alert-danger">


            <ul>

                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>



                @endforeach

            </ul>

        </div>

    @endif


@stop
