@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Employee List"/>
@endsection

<div class="d-flex justify-content-end container my-2">
    <form action="{{route('users.export')}}">
        <button class="btn btn-primary" type="submit">Export</button>
    </form>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover" id="employeeDatatable" style="width:100%">
                <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Role</th>
                <th class="text-center">Action</th>
                <th class="text-center">Creation date</th>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>

        $(document).ready(function () {
            var table = $('#employeeDatatable').DataTable({
                mark: datatableDefaultConf.mark,
                processing: datatableDefaultConf.processing,
                serverSide: datatableDefaultConf.serverSide,
                responsive: datatableDefaultConf.responsive,
                lengthMenu: datatableDefaultConf.lengthMenu,
                pageLength: datatableDefaultConf.pageLength,
                ajax: "{{route('users.index')}}",
                columns: [
                    {data: 'id', name: 'id', class: "text-center"},
                    {data: 'name', name: 'name', class: "text-center"},
                    {data: 'email', name: 'email', class: "text-center"},
                    {data: 'phone_number', name: 'phone_number', class: "text-center"},
                    {data: 'role', name: 'role', class: "text-center"},
                    {data: 'action', name: 'action', class: "text-center"},
                    {data: 'updated_at', name: 'updated_at', class: "text-center"}
                ],
                "order": [[6, 'desc']],
                "columnDefs": [
                    {
                        'targets': 'no-order',
                        'orderable': false
                    },
                    {
                        "targets": 'no-search',
                        'searchable': false
                    },
                ],
                "language": {
                    "paginate": {
                        "previous": "<i class='fas fa-angle-left'></i>",
                        "next": "<i class='fas fa-angle-right'></i>"
                    },
                    "processing": "Loading ..."
                }
            });


            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            //success
                            $.ajax({
                                method: "DELETE",
                                url: `users/${id}`,
                            })
                                .done(function (msg) {
                                    table.ajax.reload();
                                });
                        }
                    });
            })
        })
    </script>
@endsection
