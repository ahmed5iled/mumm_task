@extends('layouts.master')

@section('styles')
    <link href="{{asset('/default/assets/bootstrap-fileinput/bootstrap-fileinput.css')}}"
          rel="stylesheet"
          type="text/css"/>

@endsection
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    My Profile
                </h3>
            </div>
        </div>
    </div>

@endsection
@section('content')
    <div class="profile-content">

        @include('includes.info-box')

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{!empty(Auth::user()->profile_image) ?Storage::url(Auth::user()->profile_image):"http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"}}"
                                         alt=""/>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
												<span class="m-card-profile__name">
                                                    {{Auth::user()->name}}
                                                </span>
                                <a href="" class="m-card-profile__email m-link">
                                    {{Auth::user()->email}}
                                </a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="{{route('profile')}}" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">
																My Profile
															</span>
														</span>
													</span>
                                </a>
                            </li>
                        </ul>
                        <div class="m-portlet__body-separator"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                       href="#m_user_profile_tab_1"
                                       role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        Personal Info
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2"
                                       role="tab">
                                        Change Avatar
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a href="#m_user_profile_tab_3" class="nav-link m-tabs__link" data-toggle="tab"
                                       role="tab">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right"
                                  action="{{route('changePersonalInfo')}}"
                                  method="post">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                1. Personal Details
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Full Name
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name"
                                                   value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Email
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="email"
                                                   value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_user_profile_tab_2">
                            <form class="m-form m-form--fit m-form--label-align-right"
                                  action="{{route('changeProfileImage')}}"
                                  method="post" enctype="multipart/form-data">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                2. Profile Image
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 200px; height: 150px;">
                                                            <img src="{{!empty(Auth::user()->profile_image) ?Storage::url(Auth::user()->profile_image):"http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"}}"
                                                                 alt=""></div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;"></div>
                                                        <div>
                                                            <span class="btn btn-secondary btn-file">
                                                                <span class="fileinput-new "> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="profile_image"> </span>
                                                            <a href="javascript:;"
                                                               class="btn btn-outline-danger fileinput-exists"
                                                               data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_user_profile_tab_3">
                            <form class="m-form m-form--fit m-form--label-align-right"
                                  action="{{route('changePassword')}}"
                                  method="post">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                3. Change Password
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Current Password
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            New Password
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password" name="new_password">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Re-type New Password
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password"
                                                   name="new_password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/default/assets/bootstrap-fileinput/bootstrap-fileinput.js')}}"
            type="text/javascript"></script>
@endsection