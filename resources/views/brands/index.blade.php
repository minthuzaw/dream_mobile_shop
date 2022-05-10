@extends('layouts.app')

@section('content')
    <x-page-header header=""/>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered Datatable " style="width:100%;">
                    <thead>
                        <th class="text-center no-order"></th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Updated at</th>
                    </thead>
    
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
        @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Good Job',
            text: "{{session('success')}}",
        })
        @endif

        @if (session('updated'))
        Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: "{{session('updated')}}",
        })
        @endif

    $(document).ready(function(){
        var table = $('.Datatable').DataTable({
            mark: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: 'brands/datatable/ssd',
            columns: [
                { data: 'image', name: 'image',class:"text-center"},
                { data: 'name', name: 'name', class:"text-center"},
                { data: 'action', name: 'action', class:"text-center"},
                { data: 'updated_at', name: 'updated_at', class:"text-center"}
            ],
            "order": [[3, 'desc']],
            "columnDefs": [
                {
                    "targets": 3,
                    "visible": false
                },
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

        $(document).on('click', '.delete-btn', function(event){
                event.preventDefault();
                
                var id = $(this).data('id');
                
                swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "DELETE",
                            url: `/brands/${id}`,
                            })
                            .done(function( response ) {
                                table.ajax.reload();
                        });
                    }
                    });
                })
    
    
            })
    </script>
@endsection


