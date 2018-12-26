@extends('layouts.master')

@section('page-title')
    blog
@endsection

@section('sub-header')
    blog- Update
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert m-alert m-alert--default alert-success" role="alert">
            {{session()->get('success') }}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="m-alert m-alert--icon alert alert-danger" role="alert" id="m_form_1_msg">
            <div class="m-alert__icon">
                <i class="la la-warning"></i>
            </div>
            <div class="m-alert__text">
                Oh snap! Change a few things up and try submitting again.
            </div>
            <div class="m-alert__close">
                <button type="button" class="close" data-close="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                blog Details.
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                      method="post"
                      action="{{ route('updateBlog',['blog' => $blog->id,'category' => $category->id]) }}"
                      enctype="multipart/form-data">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    title:
                                </label>
                                <input name="title" class="form-control m-input"
                                       placeholder="Enter blog title "
                                       value="{{ $blog->title ? $blog->title : old('title') }}">
                                @if(isset($errors->messages()['title']))
                                    <div class="form-control-feedback" style="color: #f4516c;">
                                        {{  $errors->messages()['title'][0] }}
                                    </div>
                                @endif
                                <span class="m-form__help">
                                    Please enter blog title
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    description:
                                </label>
                                <textarea name="description" class="form-control m-input"
                                          placeholder="Enter blog description">{{ $blog->description ? $blog->description : old('description') }}</textarea>
                                @if(isset($errors->messages()['description']))
                                    <div class="form-control-feedback" style="color: #f4516c;">
                                        {{  $errors->messages()['description'][0] }}
                                    </div>
                                @endif
                                <span class="m-form__help">
                                    Please enter blog description
                                </span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-11">
                                <label>
                                    Image:
                                </label>
                                <input type="file" name="image" class="form-control m-input">
                                @if(isset($errors->messages()['image']))
                                    <div class="form-control-feedback" style="color: #f4516c;">
                                        {{  $errors->messages()['image'][0] }}
                                    </div>
                                @endif
                                <span class="m-form__help">
                                    Please enter blog image
                                </span>
                            </div>
                            <div class="col-lg-1">
                                <img src="{{ Storage::url($blog->image) }}"
                                     class="thumbnail-image" style="width: 70px; height: 50px">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    slug:
                                </label>
                                <input type="text" name="slug" class="form-control m-input"
                                       placeholder="Enter category slug"
                                       value="{{ $blog->slug ? $blog->slug : old('slug') }}">
                                @if(isset($errors->messages()['slug']))
                                    <div class="form-control-feedback" style="color: #f4516c;">
                                        {{  $errors->messages()['slug'][0] }}
                                    </div>
                                @endif
                                <span class="m-form__help">
                                    Please enter blog slug
                                </span>
                            </div>

                        </div>

                    </div>
                    {!! csrf_field() !!}
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                    <a href="{{ route('listCategories') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('default-assets/demo/default/custom/components/forms/widgets/ckeditor/ckeditor.js') }}"
            type="text/javascript"></script>
@endsection
