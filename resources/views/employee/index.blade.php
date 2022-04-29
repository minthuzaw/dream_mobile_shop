<x-app-layout>
    @section('title')
    <h4>Employee</h4>
    @endsection

    <div class="mb-4" >
        <a href="{{route('employee.create')}}" class="btn-theme btn-sm p-2">
            <i class="fas fa-plus"></i> Create Employee
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable">
                <thead>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Is_Present?</th>
                </thead>
                
            </table>
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.Datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'employee/datatable/ssd',
                    columns: [
                        { data: 'id', name: 'id', class: 'text-center' },
                        { data: 'name', name: 'name', class: 'text-center' },
                        { data: 'phone', name: 'phone', class: 'text-center' },
                        { data: 'email', name: 'email', class: 'text-center' },
                        { data: 'department_name', name: 'department_name', class: 'text-center' },
                        { data: 'is_present', name: 'is_present', class: 'text-center' },

                ]
            });
            })
        </script>
    @endsection

</x-app-layout>