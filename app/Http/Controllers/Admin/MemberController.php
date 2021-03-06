<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::whereNotIn('name',['super-admin'])->paginate(15);
        $data = ['users'=> $users,'roles'=> $roles];
        return view('Admin/memberlist',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMemberRequest $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('show-members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin\detailmember',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->route('show-members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('show-members');
    }
    
    /**
     * 
     * 
     * 
     * Add role
     */
    public function addRole(Request $request){
        $request->validate([
            'role' => 'required|unique:roles,name'
        ]);
        try{
            DB::beginTransaction();
            $role = new Role;
            $role->name = $request->role;
            $role->save();
            $permissions = collect([]);
            if($request->products){
                $permissions->push('manage products');
            }
            if($request->members){
                $permissions->push('manage members');
            }

            if($request->orders){
                $permissions->push('manage orders');
            }

            if($request->setting){
                $permissions->push('manage setting');
            }
            $role->syncPermissions($permissions);
            DB::commit();
        }
        catch (Exception $e){
            DB::rollBack();
        }
        return redirect()->route('show-members');
    }

    public function deleteRole(Role $role){
        $role->delete();
        return redirect()->route('show-members');
    }
    
}
