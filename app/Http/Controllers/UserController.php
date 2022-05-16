<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $employees = User::query(); //fetching user query builder

            return DataTables::of($employees)
                ->editColumn('updated_at', function($employee){
                    return Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function($employee){
                    $action = '<a href="'.route('users.edit', $employee->id).'" class="text-warning p-2" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                    $deleteIcon = '<a href="#" class="text-danger delete-btn" data-id="'.$employee->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';

                    if (!$employee->isAdmin()) {
                        $action .= $deleteIcon;
                    }


                    return '<div class="action-icon">' . $action .'</div>';
                })
                ->editColumn('role', function($employee){
                    if($employee->isAdmin()){
                        return '<span class="badge rounded-pill bg-primary text-white">'.$employee->role.'</span>';
                    }elseif($employee->isCashier()){
                        return '<span class="badge rounded-pill bg-warning text-white">'.$employee->role.'</span>';
                    }else{
                        return '<span class="badge rounded-pill bg-info text-white">'.$employee->role.'</span>';
                    }
                })
                ->rawColumns(['role','action'])
                ->make(true);
        }

        $users = User::all();
        return view('employee.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'role' => ['required', 'string'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        event(new Registered($user));
        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('employee.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'role' => ['required', 'string'],

        ]);
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('updated', 'User updated successfully');

    }

    public function destroy($id)
    {

        $user = User::find($id);
        if ($user->role == 'admin') {
            return redirect()->route('users.index')->with('error', 'You cannot delete admin');
        }else{
            $user->delete();
            return 'success';
        }

    }
}
