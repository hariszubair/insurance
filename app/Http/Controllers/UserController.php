<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
        //
    }
    public function ajax_users(Request $request)
    {
        $user=User::select('*');
        $auth=Auth::user();
         return Datatables::of($user)->addColumn('action', function ($row) use($auth){
                $temp='<div style="width: 100%; display: inline-flex;text-align: center">';
                $temp.='<a class="btn btn-primary" href="'.URL('users/edit/'.$row->id).'"><i class="far fa-edit"  ></i></a>';
                if($row->id != $auth->id){
                    $temp.=' <form method="POST" accept-charset="UTF-8" action="'.URL('users/delete/'.$row->id).'">
               <input type="hidden" name="_method" value="delete" />
              <input type="hidden" name="_token" value=" '.csrf_token().' ">
                    <input  name="id" type="hidden" value="'.$row->id.'">
                    <button type="submit" class="btn btn-danger" title="delete" ><i class="fas fa-trash"></i></button>
                 </form>';
                }
                
                 $temp.='</div>';

                return $temp;
          

            

            })->addColumn('roles', function ($row) {
               $roles= $row->roles->pluck('name');
               $temp='<ol>';
               foreach ($roles as $key => $role) {
                   $temp.='<li>'.$role.'</li>';
               }
               $temp.='</ul>';
               return $temp;
            })->escapeColumns([])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('users.create',compact('roles'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
      $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'digits:1', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user=User::create($input);
            $user->assignRole($input['role_id']);
        return redirect()->route('users')->with('success', 'User Created');
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
        $user=User::findOrFail($id);
        $roles=Role::all();
        return view('users.edit',compact('user','roles'));   
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role_id' => ['required', 'digits:1', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $old_role_id=$user->roles->first()->id;
        if($old_role_id != $request->role_id){
            $user->removeRole($old_role_id);
            $user->assignRole($request->role_id);
        }
        User::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email]);
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id)->delete();
        return redirect()->route('users');
    }   
}
