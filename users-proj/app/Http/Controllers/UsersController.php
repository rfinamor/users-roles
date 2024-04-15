<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create')->only('store');
        $this->middleware('can:edit')->only('edit');
        $this->middleware('can:delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('dashboard', ( compact('users', 'roles'))); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            return back()->with('message', 'Created Successfully');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $user_roles = $user->getRoleNames();
        $roles = Role::all();
        return view('editUser', ( compact('user', 'roles', 'user_roles'))); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, string $id)
    {
        try{
            $user = User::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->syncRoles([]);
            $user->assignRole($request->role);
            return redirect()->route('dashboard')->with('message', 'Updated Successfully');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $user = User::find($id);
            $user->delete();
            return back()->with('message', 'Deleted Successfully');           
        }    
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
