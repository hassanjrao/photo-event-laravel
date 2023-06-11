<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->get();

        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=null;

        $roles=Role::where("name", "!=", "admin")->get();

        return view("admin.users.add_edit", compact("user", "roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|unique:users",
            "password"=>"required|min:8",
            "role"=>"required|exists:roles,id"
        ]);

        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
        ]);

        $role=Role::find($request->role);

        $user->assignRole($role->name);

        return redirect()->route("admin.users.index")->withToastSuccess( "User created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::where("name", "!=", "admin")->get();

        $user=User::find($id);

        return view("admin.users.add_edit", compact("user", "roles"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $request->validate([
            "name"=>"required",
            "email"=>"required|unique:users,email,".$user->id,
            "password"=>"nullable|min:8",
            "role"=>"required|exists:roles,id"
        ]);

        $dataToUpdate=[
            "name"=>$request->name,
            "email"=>$request->email,
        ];

        if($request->password)
        {
            $dataToUpdate["password"]=bcrypt($request->password);
        }

        $user->update($dataToUpdate);

        $role=Role::find($request->role);

        $user->syncRoles($role->name);

        return redirect()->route("admin.users.index")->withToastSuccess( "User updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findorfail($id);

        $user->delete();

        return redirect()->route("admin.users.index")->withToastSuccess( "User deleted successfully");
    }
}
