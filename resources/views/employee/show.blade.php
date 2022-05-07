<x-app-layout>
    @section('title')
    <h4>Employee's Detail</h4>
    @endsection

    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="d-flex justify-content-start">
                        <img src="{{$employee->profile_img_path()}}" alt="" style="width:120px; height: 120px; border-radius: 100%; border: 1px solid green; padding: 3px; ">
                        <div class="py-3 px-2">
                            <h3>{{$employee->name}}</h3>
                            <p class="text-muted mb-1">{{$employee->employee_id}}</p>
                            <p class="text-muted mb-1">{{$employee->department? $employee->department->title : '-'}}</p>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="dash-border px-4">
                        <p class="mb-1"><strong>Email</strong> : <span class="text-muted">{{$employee->email}}</span></p>
                        <p class="mb-1"><strong>Phone</strong> : <span class="text-muted">{{$employee->phone}}</span></p>
                        <p class="mb-1"><strong>NRC Number</strong> : <span class="text-muted">{{$employee->nrc_number}}</span></p>
                        <p class="mb-1"><strong>Birthday</strong> : <span class="text-muted">{{$employee->birthday}}</span></p>
                        <p class="mb-1"><strong>Gender</strong> : <span class="text-muted">{{$employee->gender}}</span></p>
                        <p class="mb-1"><strong>Address</strong> : <span class="text-muted">{{$employee->address}}</span></p>
                        <p class="mb-1"><strong>Date of join</strong> : <span class="text-muted">{{$employee->date_of_join}}</span></p>
                        <p class="mb-0"><strong> Is Present </strong> : <span class="text-muted">@if ($employee->is_present === 1)
                            <span class="badge badge-pill badge-success">Present</span>
                            @else
                            <span class="badge badge-pill badge-danger">Leave</span>
                            @endif</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>