<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       
      
        // \Carbon\Carbon::setlocale('vi');
         // $users = User::orderBy('id','desc')->paginate(5);
        // dd(Auth::user()->name);
        
        return view('admin.user.index');
    }
     public function getlist()
        {
           
            $users = User::orderBy('id','desc');
            return datatables()->of($users)
            ->addColumn('action' ,function(User $user){
                return ' <a class="btn btn-primary btn-edit-user" data-id="'.$user->id.'">edit</a>
                <a class="btn btn-info btn-show-user" data-id="'.$user->id.'">show</a>
                <a class="btn btn-danger btn-delete-user" data-id="'.$user->id.'">delete</a>';
            })->toJson();
            
            // \Carbon\Carbon::setlocale('vi');
             // $users = User::orderBy('id','desc')->paginate(5);
            // dd(Auth::user()->name);
            
            
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
    public function store(Request $request)
    {
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

    return response()->json(['data'=>$user],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);

    return response()->json(['data'=>$user],200);
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
        
//dd($request);
        $user = User::find($id);
        
        $oldpass = $user->password;
          if(Hash::check($request->get('new_password'),$user->password)){
            //Current password and new password are same
            return response()->json(['error' => 'New Password cannot be same as your current password'], 400);
        }elseif($request->get('new_password')==""){
        $user->password = $oldpass;
        $user->name = $request->name;
        $user->email = $request->email;   
        
        $user->save();
       return response()->json(['data'=>$user],200);
        }else{

            $user->password = bcrypt($request->new_password);
              

        $user->name = $request->name;
        $user->email = $request->email;   
        
        $user->save();
       return response()->json(['data'=>$user],200);
        }
        

       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = User::find($id);
        $del->delete();
     return response()->json(['data'=>'removed'],200);
    }
}
