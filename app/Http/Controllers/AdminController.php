<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\AdminRequest;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        return view('layouts.MasterAdmin');
    }
    public function store(AdminRequest $request){

      dd($request->all());
    if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

    }
}

