@extends('layouts.master')

@section('page-title')
    Categories
@endsection

@section('sub-header')
    Categories
@endsection

@section('content')
    @include('includes.info-box')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Categories table
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid"
                                           placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{route('createCategory')}}"
                           class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-plus"></i>
													<span>
														add Categories
													</span>
												</span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                <tr>
                    <th>
                        name
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as$category )
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{ route('editCategory',['category' => $category->id]) }}"
                               class="btn btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air">
                                <i class="fa flaticon-edit-1"></i>
                            </a>
                            <a href="#!" data-url="{{ route('deleteCategory',['category' => $category->id]) }}"
                               data-toggle="modal" data-target="#m_modal_1"
                               class="delete-modal btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                <i class="fa flaticon-delete"></i>
                            </a>
                            <a href="{{ route('addBlog',['category' => $category->id]) }}"
                               class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air"
                               title="add blog">
                                <i class="fa fa-plus"></i>

                            </a>
                            <a href="{{ route('listBlogs',['category' => $category->id]) }}"
                               class="btn btn-dark m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air"
                               title="list blogs">
                                <i class="fa fa-eye"></i>

                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Delete slider
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure that you want to remove this Category ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-danger" id="save">
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection

@section('scripts')
    <script src="{{ asset('default-assets/demo/default/custom/components/datatables/base/html-table.js') }}"
            type="text/javascript"></script>
    <script>
        $(document).on('click', '.delete-modal', function () {
            $('#save').val($(this).data('url'));

        });

        $("#save").click(function () {
            window.location = $(this).val();
        });
    </script>
@endsection