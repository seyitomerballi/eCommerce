@extends('layouts.admin_layout.admin_layout')
@section('title','Categories')
@section('content')
    <div class="content-wrapper" style="min-height: 1050.72px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Categories</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Success and error Alerts-->
                        <!-- Success Alert -->
                        @if(Session::has('success_message_add_category'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i>Başarılı!</h5>
                                {{ Session::get('success_message_add_category') }}
                                @php
                                    Session::forget('success_message_add_category');
                                @endphp
                            </div>
                        @endif
                    <!-- /.Success Alert -->
                        <!-- Error Alert -->
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i>Hata!</h5>
                                {{ Session::get('error_message') }}
                                @php
                                    Session::forget('error_message');
                                @endphp
                            </div>
                    @endif

                    <!-- /.Error Alert -->
                        <!-- /.Success and error Alerts-->
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('admin.categories.addEditCategory')}}"
                                   class="btn btn-app float-right bg-success">
                                    <i class="fas fa-plus"></i> Add Category
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="categories"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="text-center sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Id
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Category
                                                        Name
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Parent
                                                        Category
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Section
                                                        Name
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        URL
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Status
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $category)
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="text-center sorting_1">{{$category->id}}</td>
                                                        <td>{{$category->category_name}}</td>
                                                        <td>{{$category->parent_category->category_name}}</td>
                                                        <td>{{$category->section->name}}</td>
                                                        <td>{{$category->slug}}</td>
                                                        <td class="text-center">@if($category->status === 1)
                                                                <a class="updateCategoryStatus btn btn-sm btn-info"
                                                                   id="category-{{$category->id}}"
                                                                   category_id="{{$category->id}}"
                                                                   href="javascript:void(0)"><i
                                                                        class="fas fa-check"></i> Active</a>
                                                            @else
                                                                <a class="updateCategoryStatus btn btn-sm btn-outline-info"
                                                                   id="category-{{$category->id}}"
                                                                   category_id="{{$category->id}}"
                                                                   href="javascript:void(0)"><i
                                                                        class="fas fa-times"></i> Inactive</a>
                                                            @endif
                                                        </td>
                                                        <td class="row text-center">
                                                            <a href="{{route('admin.categories.addEditCategory',$category->id)}}"
                                                               class="col col-5 mx-auto my-auto btn btn-block btn-sm btn-primary text-white">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <a href=""
                                                                class="col col-5 mx-auto my-auto btn btn-block btn-sm btn-danger text-white">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
