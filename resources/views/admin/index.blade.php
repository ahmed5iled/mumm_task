@extends('layouts.master')
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Welcome
                </h3>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30"
         role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand"></i>
        </div>
        <div class="m-alert__text">
            <p class="text-center">
                Welcome to the Mumm dashboard
            </p>
        </div>
    </div>
@endsection