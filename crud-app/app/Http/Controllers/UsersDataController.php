<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UsersData;

class UsersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersdatas = UsersData::all();

        return view('usersdata.index', compact('usersdatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usersdata.create');
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
            'name'=>'required',
            'cpf'=>'required',
            'date_of_birth' =>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'Zip_code'=>'required'
        ]);

        $usersdata = new UsersData([
            'name' => $request->get('name'),
            'cpf' => $request->get('cpf'),
            'date_of_birth' => $request->get('date_of_birth'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'Zip_code' => $request->get('Zip_code')
        ]);
        $usersdata->save();
        return redirect('/usersdatas')->with('success', 'User saved!');
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
        $usersdata = UsersData::find($id);
        return view('usersdata.edit', compact('usersdata'));       
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
        $request->validate([
            'name'=>'required',
            'cpf'=>'required',
            'date_of_birth' =>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'Zip_code'=>'required'
        ]);

        $usersdata = UsersData::find($id);
        $usersdata->name =  $request->get('name');
        $usersdata->cpf =  $request->get('cpf');
        $usersdata->date_of_birth =  $request->get('date_of_birth');
        $usersdata->email =  $request->get('email');
        $usersdata->phone =  $request->get('phone');
        $usersdata->address =  $request->get('address');
        $usersdata->city =  $request->get('city');
        $usersdata->state =  $request->get('state');
        $usersdata->Zip_code =  $request->get('Zip_code');

        $usersdata->save();
        return redirect('/usersdatas')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usersdata = UsersData::find($id);
        $usersdata->delete();

        return redirect('/usersdatas')->with('success', 'UserData deleted!');
    }
}
