@extends('layouts.app')

@push('styles')
    {{-- DataTables --}}
    <link href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}"" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}"" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}"" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    Dashboard
                </li>
                <li class="active">
                    User
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-border panel-custom">
                <div class="panel-heading">
                    <h5>
                        Daftar User
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah</a>
                    </h5>
                </div>
                <div class="panel-body table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    {{-- DataTables --}}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>    
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('table.user') }}",
                    columns: [
                        {data: 'DT_Row_Index', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'role', name: 'role'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
    </script>
@endpush