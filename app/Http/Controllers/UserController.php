<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);
        $user = User::create($request->only('name', 'password', 'email'));
        $company = new Company;
        $company->fill($request->only('representative','email', 'telephone'));
        $company->user_id = $user->id;
        $company->name=$request->input('company_name');
        $company->save();
        return redirect('admin')->with('status', 'Usuario creado exitosamente!'); 

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
        $user=User::find($id);
        return view('admin.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->fill($request->only('name', 'email'));
        $user->save();
        $company=Company::where('user_id', $user->id)->first();
        $company->fill($request->only('representative','email', 'telephone'));
        $company->name = $request->input('company_name');
        $company->save();
        return redirect('admin')->with('status', 'Datos del usuario actualizado exitosamente!'); 
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       User::destroy($id);


    return redirect('admin');
    }
}
