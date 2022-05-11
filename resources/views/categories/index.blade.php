@extends('layouts.app')

@section('content')
    {{-- <x-page-header header="Categories"/> --}}
    {{-- <div class="float-right my-3"><a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Add New Categories</a></div> --}}
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered Datatable " style="width:100%;">
                    <thead>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center no-order">Action</th>
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

        @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{session('error')}}",
        })
        @endif

        $(document).ready(function(){
            var table = $('.Datatable').DataTable({
                mark: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{route('categories.index')}}",
                columns: [
                    { data: 'id', name: 'id',class:"text-center"},
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

    
            $(document).on('click', '.delete-btn', function(e){
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
                            url: `categories/${id}`,
                            })
                            .done(function( msg ) {
                                table.ajax.reload();
                            });
                    }
                    });
            })
        })
    </script>
@endsection


