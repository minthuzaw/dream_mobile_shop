<?php

namespace App\Http\Controllers;

use App\Models\User;

use Yajra\Datatables\Datatables as Databases;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function ssd(){
        $employees = User::with('department');
        return Databases::of($employees)
        ->addColumn('department_name', function($employee){
            return $employee->department ? $employee->department->title : '-';
        })
        ->editColumn('is_present', function($employee){
            if($employee->is_present === 1){
                return '<span class="badge badge-success rounded-pill p-2">Present</span>';
            }else{
                return '<span class="badge rounded-pill badge-danger p-2">Absent</span>';
            }
        })
        ->rawColumns(['is_present'])
        ->make(true);
    }
}
