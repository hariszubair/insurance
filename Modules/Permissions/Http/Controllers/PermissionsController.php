<?php

namespace Modules\Permissions\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;

class PermissionsController extends Controller
{
    /**
     * Index page for permissions
     */
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsAdmin');  
        
    }
    public function index()
    {
      //   $role=Role::find(2);
      // $role= $role->hasPermissionTo(26);
      //  if($role){
      //   return "yes";
      //  }
      //  else{
      //   return "no";
      //  }
        // $permission = Permission::create(['name' => 'add diary']);
        // $permission=Permission::find(1002);
        // $user=User::find(2003);
        // // $user->revokePermissionTo('edit diary');
        // $user->givePermissionTo($permission);
        // $role=Role::find(2);
        // $role->revokePermissionTo('edit diary');
        // $role->givePermissionTo($permission);
        // $user=User::find(1);
        // $user->assignRole('Administrator');
        // $user=User::find(2);
        // $user->assignRole('User');
        // $user=User::find(1002);
        // $user->assignRole('User');
        // return view('permissions::index');
        session(['Page'=> "Permissions"]);
       
        return view('permissions::index');

    }



    /**
     * fill the datatables with permissions
     */
     public function permission_index(Request $request)
    { 

      $permissions=Permission::get(['name','id']);
       return Datatables::of($permissions)->addColumn('action', function ($row) {
            
                return '<div style="width: 100px; display: inline-block;text-align: center"><button  name="'.$row->name.'" id="'.$row->id.'" class="btn btn-primary edit_permission_button" data-toggle="modal" data-target="#edit_permission_modal"><i class="far fa-edit"  ></i></button>
               <a  name="'.$row->id.'" class="btn btn-danger delete_permission_button"><i class="fas fa-trash"  ></i></a></div>';
          

            

            })->make(true);


    }


    /**
     * Add a permissions
     */
     public function add_permission(Request $request)
    { 
       
    $count=Permission::whereName($request->permission_name)->count();
    if($count){
        return 2;
    }
    $permission=Permission::create(['name' => $request->permission_name]);
    if($permission){
        return 1;
    }
    }


    /**
     * Edit a Permissions
     */
     public function edit_permission(Request $request, $id)
    { 

    $permission=Permission::find($id);
    $permission->name=$request->edit_permission_name;
    $status=$permission->save();
    if($status)
        return 1;
    }


    /**
     * Delete a permission
     */
     public function delete_permission($id)
    { 
        
    $status=Permission::find($id)->delete();

    if($status)
        return 1;
    }



    /**
     * Index page for User->Permissions
     */
     public function user_permission()
    { 
          session(['Page'=> "Users->Permissions"]);
        $permissions=Permission::all(['name','id']);
        $users=User::all(['id','email']);
    return view('permissions::users.permission', compact('permissions','users'));
    } 



    /**
     * Get all the permissions after user is selected
     */
     public function get_user_permission($id)
    { 

        $user=User::find($id);
        $permissions=$user->getAllPermissions();
        return json_encode($permissions);
        

    }
     public function get_disabled_user_permission($id)
    { 

        $user=User::find($id);
        $permissions=$user->getPermissionsViaRoles();
        return json_encode($permissions);
        

    }




    /**
     * Assign permissions to users
     */
     public function asign_user_permission(Request $request)
    { 
        // return $request;
        $input=$request->all();
        // return $input;   
        $user=User::find($request->user); 
        $permissions=Permission::all(['id']);
        foreach ($permissions as $permission) {
           if(isset($input[$permission->id])){
            $user->givePermissionTo($permission->id);
           }
           else {
            $user->revokePermissionTo($permission->id);
           }
        }
         return 1;
        
    }
    
}
