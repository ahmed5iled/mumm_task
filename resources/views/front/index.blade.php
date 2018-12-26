@extends('layouts.master-front')
@section('content')
    <section class="sec2">
        <div class="container">
            <h2 class="tilt2">All Blogs</h2>
            <div class="prod">
                <div class="row">
                    @foreach($categories as $category)
                        @foreach($category->blogs as $blog)
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="prod-con " data-wow-duration="2s" data-wow-delay=".5s">
                                    <img
                                            src="{{Storage::url($blog->image)}}"
                                            alt="">
                                    <a href="{{route('singleBlog',['categories'=>$category->slug,'blogs'=>$blog->slug])}}">
                                        <div>
                                            {{$blog->title}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
