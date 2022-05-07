<x-app-layout>
    @section('title')
    <h4>Employee's Detail</h4>
    @endsection

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Name</p>
                        <p class="text-muted mb-0">{{$employee->name}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Phone</p>
                        <p class="text-muted mb-0">{{$employee->phone}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Email</p>
                        <p class="text-muted mb-0">{{$employee->email}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Employee ID </p>
                        <p class="text-muted mb-0">{{$employee->employee_id}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Nrc Number </p>
                        <p class="text-muted mb-0">{{$employee->nrc_number}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Birthday </p>
                        <p class="text-muted mb-0">{{$employee->birthday}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Gender </p>
                        <p class="text-muted mb-0">{{$employee->gender}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Address </p>
                        <p class="text-muted mb-0">{{$employee->address}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Department </p>
                        <p class="text-muted mb-0">{{$employee->department ? $employee->department->title : '-'}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i>Date of join </p>
                        <p class="text-muted mb-0">{{$employee->date_of_join}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-angellist"></i> Is Present </p>
                        <p class="text-muted mb-0">
                            @if ($employee->is_present === 1)
                            <span class="badge badge-pill badge-success">Present</span>
                            @else
                            <span class="badge badge-pill badge-danger">Leave</span>
                            @endif
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>