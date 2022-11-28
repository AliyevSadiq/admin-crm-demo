@extends('crm.layouts.crm')
@section('crm-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content mt-3">

                <!-- Default box -->
                <div class="card">
                    <div class="p-2 d-flex justify-content-between ">
                        <h3 class="card-title">Clients</h3>
                        <a href="javascript:void(0)" data-url="{{route('crm.clients.store')}}" id="createNewClient" class="btn btn-sm btn-success">Add client</a>
                    </div>
                    <div class="card-body">
                        <table id="list-datatable" data-list-url="{{route('crm.clients.index')}}" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full name</th>
                                <th> Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">
                                </th>
                                <th rowspan="1" colspan="1">

                                </th>
                                <th rowspan="1" colspan="1">

                                </th>
                                <th rowspan="1" colspan="1" >

                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card -->

            </section>
        </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="ajaxModel"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="clientForm" data-action="" name="clientForm" class="form-horizontal">

                        <div class="form-group">
                            <label for="full_name" class="col-sm-2 control-label">Fullname</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-sm-2 control-label">Company</label>
                            <div class="col-sm-12">
                                <select data-url="{{route('crm.company-drop-down')}}" class="form-select" id="company_id" name="company_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content -->
@endsection
@include('crm.partials.datatable_styles')
@include('crm.partials.datatable_scripts')
@push('template_footer')
    <script src="{{asset('crm/js/client-crud.js')}}"></script>
@endpush
