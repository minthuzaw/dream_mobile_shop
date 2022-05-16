@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Brands List"/>
@endsection
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover" id="brandDatatable" style="width:100%;">
                <thead>
                <th class="text-center no-order">Logo</th>
                <th class="text-center">Name</th>
                <th class="text-center no-order">Action</th>
                <th class="text-center">Creation Date</th>
                </thead>

            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var table = $('#brandDatatable').DataTable({
                mark: datatableDefaultConf.mark,
                processing: datatableDefaultConf.processing,
                serverSide: datatableDefaultConf.serverSide,
                responsive: datatableDefaultConf.responsive,
                lengthMenu: datatableDefaultConf.lengthMenu,
                pageLength: datatableDefaultConf.pageLength,
                ajax: "{{route('brands.index')}}",
                columns: [
                    {data: 'image', name: 'image', class: "text-center"},
                    {data: 'name', name: 'name', class: "text-center"},
                    {data: 'action', name: 'action', class: "text-center"},
                    {data: 'updated_at', name: 'updated_at', class: "text-center"}
                ],
                "order": [[3, 'desc']],
                "columnDefs": [
                    // {
                    //     "targets": 3,
                    //     "visible": false
                    // },
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

            $(document).on('click', '#delete', function (event) {
                event.preventDefault();
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
                                url: `/brands/${id}`,
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


