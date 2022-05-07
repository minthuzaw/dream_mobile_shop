<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables as Databases;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function ssd()
    {
        $employees = User::with('department');
        return Databases::of($employees)
            ->addColumn('department_name', function ($employee) {
                return $employee->department ? $employee->department->title : '-';
            })
            ->editColumn('is_present', function ($employee) {
                if ($employee->is_present === 1) {
                    return '<span class="badge badge-success rounded-pill p-2">Present</span>';
                } else {
                    return '<span class="badge rounded-pill badge-danger p-2">Absent</span>';
                }
            })
            ->editColumn('updated_at', function ($employee) {
                return Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('fas fa-plus', function ($employee) {
                return null;
            })
            ->addColumn('action', function ($employee) {
                $edit_icon = '<a href="' . route('employee.edit', $employee->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';
                $info_icon = '<a href="' . route('employee.show', $employee->id) . '" class="text-warning"><i class="fas fa-info-circle"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $info_icon . '</div>';
            })
            ->rawColumns(['is_present', 'action'])
            ->make(true);
    }

    public function create()
    {
        $departments = Department::orderBy('title')->get();

        return view('employee.create', compact('departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $attributes = $request->validated();
        $attributes['profile_img'] = $request->file('profile_img')->store('employee_pf');
        User::create($attributes);

        return redirect()->route('employee.index')->with('create', 'Employee created successfully');
    }

    public function edit(User $employee)
    {
        $departments = Department::orderBy('title')->get();
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function update(EmployeeUpdateRequest $request, User $employee)
    {
        $attributes = $request->validated();
        $employee->update($attributes);

        return redirect()->route('employee.index')->with('updated', 'Updated At Successfully');
    }

    public function show(User $employee)
    {
        return view('employee.show', compact('employee'));
    }
}
