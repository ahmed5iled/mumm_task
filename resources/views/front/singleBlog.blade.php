@extends('layouts.master-front')
@section('content')

    <section id="heading">
        <div class="head-in">
            @foreach($blogss as $blog)
                <img src="{{Storage::url($blog->image)}}" alt="">
                <h2>{{$blog->title}}</h2>
            @endforeach

        </div>
    </section>
    <section>
        <div class="prod-con">
            @foreach($blogss as $blog)
                <h2 class="text-center"></h2>
                <div class="descrip mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="text-center">
                                {{$blog->description}}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </section>
@endsection
