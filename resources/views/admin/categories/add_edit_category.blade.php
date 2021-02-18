@extends('layouts.admin_layout.admin_layout')
@section('title',$title)
@section('head-css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1050.72px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Error Alert -->
        @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h5><i class="icon fas fa-check"></i>Hata!</h5>
                {{ Session::get('error_message') }}
                @php
                    Session::forget('error_message');
                @endphp
            </div>
    @endif
    <!-- /.Error Alert -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form name="categoryForm" id="categoryForm"
                      @if(empty($categoryData->id))
                      action="{{route('admin.categories.addEditCategory')}}"
                      @else
                      action="{{route('admin.categories.addEditCategory',$categoryData->id)}}"
                      @endif
                      method="post" enctype="multipart/form-data">
                @csrf
                <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" class="form-control"
                                               name="category_name" id="category_name"
                                               @if(!empty($categoryData->category_name))
                                               value="{{$categoryData->category_name}}"
                                               @else
                                               value="{{old('category_name')}}"
                                               @endif
                                               placeholder="Enter category name">
                                        @if($errors->has('category_name'))
                                            <span id="category_name_err"
                                                  style="color: red">{{$errors->first('category_name')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div id="appendCategoriesLevel">
                                        @include('admin.categories.append_categories_level')
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_discount">Category Discount</label>
                                        <input name="category_discount" id="category_discount"
                                               type="text" class="form-control"
                                               @if(!empty($categoryData->category_discount))
                                               value="{{$categoryData->category_discount}}"
                                               @else
                                               value="{{old('category_discount')}}"
                                               @endif
                                               placeholder="Enter category discount">
                                        @if($errors->has('category_discount'))
                                            <span id="category_discount_err"
                                                  style="color: red">{{$errors->first('category_discount')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_description">Category Description</label>
                                        <textarea name="category_description" id="category_description"
                                                  type="text" class="form-control"
                                                  placeholder="Enter category description">
                                                  @if(!empty($categoryData->description))
                                                {{$categoryData->description}}
                                            @else
                                                {{old('description')}}
                                            @endif
                                        </textarea>
                                        @if($errors->has('category_description'))
                                            <span id="category_description_err"
                                                  style="color: red">{{$errors->first('category_description')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_meta_description">Category Meta Description </label>
                                        <textarea name="category_meta_description" id="category_meta_description"
                                                  type="text" class="form-control"
                                                  placeholder="Enter category meta description">
                                            @if(!empty($categoryData->meta_description))
                                                {{$categoryData->meta_description}}
                                            @else
                                                {{old('meta_description')}}
                                            @endif
                                        </textarea>
                                        @if($errors->has('category_meta_description'))
                                            <span id="category_meta_description_err"
                                                  style="color: red">{{$errors->first('category_meta_description')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->

                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Section</label>
                                        <select name="category_section_id" id="category_section_id"
                                                class="form-control select2" style="width: 100%;">
                                            <option value="">Select</option>
                                            @foreach($getSections as $section)
                                                <option
                                                    value="{{$section->id}}"
                                                    @if(!empty($categoryData->section_id) && ($categoryData->section_id == $section->id))
                                                    selected
                                                    @endif
                                                >{{$section->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_section_id'))
                                            <span id="category_section_id_err"
                                                  style="color: red">{{$errors->first('category_section_id')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_image">Category Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="category_image" id="category_image"
                                                       type="file" class="custom-file-input">
                                                <label class="custom-file-label" for="category_image">Choose
                                                    file</label>
                                                @if($errors->has('category_image'))
                                                    <span id="category_image_err"
                                                          style="color: red">{{$errors->first('category_image')}}</span>
                                                @endif
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_slug">Category Slug</label>
                                        <input name="category_slug" id="category_slug"
                                               type="text" class="form-control"
                                               @if(!empty($categoryData->slug))
                                               value="{{$categoryData->slug}}"
                                               @else
                                               value="{{old('slug')}}"
                                               @endif
                                               placeholder="Enter category slug">
                                        @if($errors->has('category_slug'))
                                            <span id="category_slug_err"
                                                  style="color: red">{{$errors->first('category_slug')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_meta_title">Category Meta Title</label>
                                        <textarea type="text" class="form-control"
                                                  name="category_meta_title" id="category_meta_title"
                                                  placeholder="Enter category meta title">
                                            @if(!empty($categoryData->meta_title))
                                                {{$categoryData->meta_title}}
                                            @else
                                                {{old('meta_title')}}
                                            @endif
                                        </textarea>
                                        @if($errors->has('category_meta_title'))
                                            <span id="category_meta_title_err"
                                                  style="color: red">{{$errors->first('category_meta_title')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="category_meta_keyword">Category Meta Keywords </label>
                                        <textarea type="text" class="form-control"
                                                  name="category_meta_keywords" id="category_meta_keywords"
                                                  placeholder="Enter category meta keywords">
                                            @if(!empty($categoryData->meta_keywords))
                                                {{$categoryData->meta_keywords}}
                                            @else
                                                {{old('category_meta_keywords')}}
                                            @endif
                                        </textarea>
                                        @if($errors->has('category_meta_keyword'))
                                            <span id="category_meta_keyword_err"
                                                  style="color: red">{{$errors->first('category_meta_keyword')}}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn">
                                <a class="btn btn-app bg-success mx-0">
                                    @if(empty($categoryData->id))
                                        <i class="fas fa-save"></i> Add
                                    @else
                                        <i class="fas fa-save"></i> Save
                                    @endif
                                </a>
                            </button>
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('footer-js')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
@endsection
