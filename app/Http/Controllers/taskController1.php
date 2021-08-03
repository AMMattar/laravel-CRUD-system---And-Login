<?php

namespace App\Http\Controllers;

use App\Models\taskModel;
use App\Models\users;
use Illuminate\Http\Request;

class taskController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = taskModel::get();
        return view('taskView',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
            'title'=> 'required',
            'content'=> 'required'
        ]);
        taskModel::create($data);
        return back();
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
        //
        $data = taskModel::find($id);
        return view('taskEdit',['data'=>$data]);
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
        //
        //dd($request);
        $data = $this->validate($request,[
            'title'=>'required',
            'content'=>'required'
        ]);
        //dd($data);
        $op = taskModel::where('id',$id)->update($data);

     if($op){
        $message = "User Updated ";
     }else{
        $message = "Error Try Again";
     }


    session()->flash('Message',$message);
    return redirect(url('/tasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op = taskModel::where('id',$id)->delete();
        if($op){
            $message = "User Deleted ";
        }else{
            $message = "Error try Again ";
        }

        session()->flash('Message',$message);
        return redirect(url('/tasks'));
    }
    public function userR()
    {
        //
        return view('userRegister');
    }
    public function userI(Request $request)
    {
        //
        //dd($request);
        $data =  $this->validate($request,
        [
            "name"  => "required|min:3",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ]);

        $data['password'] = bcrypt($data['password']);
        //dd($data);
        $op = users::create($data);

     if($op){
        $message = "User Inserted ";
     }else{
        $message = "Error Try Again";
     }


    session()->flash('Message',$message);
    return redirect(url('/tasks'));
    }
    public function loginTask(){
        return view('login');
    }
    public function loggedTask(Request $request){
        $data = $this->validate($request,[
            'email' => 'required|email',
            'password'=> 'required|min:5'
        ]);
        //dd($data);
        //dd(auth()->attempt($data,false));
        if(auth()->attempt($data,false)){
            return redirect(url('/tasks'));
        }else{
            return redirect(url('/login'));
        }
    }
    public function logout(){
        // Logic

        auth()->logout();

        return redirect(url('/login'));

    }
}