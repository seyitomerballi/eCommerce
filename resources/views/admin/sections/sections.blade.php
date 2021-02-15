@extends('layouts.admin_layout.admin_layout')
@section('title','Sections')
@section('content')
    <div class="content-wrapper" style="min-height: 1050.72px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sections</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Sections</a></li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sections List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="sections"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Status
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sections as $section)
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1">{{$section->id}}</td>
                                                        <td>{{$section->name}}</td>
                                                        <td>@if($section->status === 1)
                                                                <a class="updateSectionStatus"
                                                                   id="section-{{$section->id}}"
                                                                   section_id="{{$section->id}}"
                                                                   href="javascript:void(0)">Active</a>
                                                            @else
                                                                <a class="updateSectionStatus"
                                                                   id="section-{{$section->id}}"
                                                                   section_id="{{$section->id}}"
                                                                   href="javascript:void(0)">Inactive</a>
                                                            @endif
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
