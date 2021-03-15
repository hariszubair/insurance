<?php

namespace Modules\Permissions\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use App\Models\User;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    /**
     * Index page of Roles
     */
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsAdmin');  
        
    }
   public function roles()
    {
        session(['Page'=> "Roles"]);

        return view('permissions::roles.index');
    }



    /**
     *Fill roles table with ajax datatable
     */
     public function role_index(Request $request)
    { 

      $roles=Role::get(['name','id']);
       return Datatables::of($roles)->addColumn('action', function ($row) {
                if($row->id > 3){
                    return '<div style="display: inline-flex;text-align: center"><button  name="'.$row->name.'" id="'.$row->id.'" class="btn btn-primary edit_role_button" data-toggle="modal" data-target="#edit_role_modal"><i class="far fa-edit"  ></i></button>
                        <a  name="'.$row->id.'" class="btn btn-danger delete_role_button"><i class="fas fa-trash"  ></i></a></div>';
                }
            })->make(true);


    }

    /**
     * Add a Role
     */
      public function add_role(Request $request)
    { 
       
    $count=Role::whereName($request->role_name)->count();
    if($count){
        return 2;
    }
    $role=Role::create(['name' => $request->role_name]);
    if($role){
        return 1;
    }
    }


    /**
     * Edit a Role
     */
     public function edit_role(Request $request, $id)
    { 

    $role=Role::find($id);
    $role->name=$request->edit_role_name;
    $status=$role->save();
    if($status)
        return 1;
    }


    /**
     * Delete a Role
     */
     public function delete_role($id)
    { 
        
    $status=Role::find($id)->delete();

    if($status)
        return 1;
    }



    /**
     * Index page for Roles->Permission
     */
     public function roles_permission()
    { 
          session(['Page'=> "Roles->Permissions"]);
        $permissions=Permission::all(['name','id']);
        $roles=Role::all(['id','name']);
    return view('permissions::roles.permission', compact('permissions','roles'));
    }


    /**
     * Get all the permissions of a specific roles after selecting a role
     */
     public function get_role_permission($id)
    { 

        $roles=Role::find($id);
        $roles=$roles->permissions()->get(['id']);
        return json_encode($roles);
        

    }




    /**
     * Assign permissions to roles
     */
     public function asign_role_permission(Request $request)
    { 
        // return $request;
        $input=$request->all();
        $role=Role::find($request->role); 
        $permissions=Permission::all(['id']);
        foreach ($permissions as $permission) {
           if(isset($input[$permission->id])){
            $role->givePermissionTo($permission->id);
           }
           else {
            $role->revokePermissionTo($permission->id);
           }
        }
         return 1;
       

    }



    /**
     * Index page for user->roles
     */
     public function user_roles()
    { 
          session(['Page'=> "Users->Roles"]);
        $roles=Role::all(['name','id']);
        $users=User::all(['id','email']);
    return view('permissions::users.roles', compact('roles','users'));
    }




    /**
     * Get roles of user after selecting
     */
     public function get_users_roles($id)
    { 

        $user=User::find($id);
        $roles=$user->roles()->get(['id']);
        return json_encode($roles);
        

    }


    /**
     * Assign a role to a user
     */
     public function asign_users_roles(Request $request)
    { 
        // return $request;
        $input=$request->all();
        // return $input;   
        $user=User::find($request->user); 
        $roles=Role::all(['id']);
        foreach ($roles as $role) {
           if(isset($input[$role->id])){
            $user->assignRole($role->id);
           }
           else {
            $user->removeRole($role->id);
           }
        }
         return 1;
        
    }
}
