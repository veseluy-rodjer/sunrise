<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRole;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkId')->only('edit', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('before', Role::class);
        $listing = Role::listing();
        $data = ['title' => 'Челядь', 'listing' => $listing];
        return view('role', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('before', Role::class);
        $data = ['title' => 'Челядь'];
        return view('role/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        $this->authorize('before', Role::class);
        $res = Role::store($request);
        if ($res == false) {
            return response('Такая роль уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('role.index');
        }
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
        $this->authorize('before', Role::class);
        $edit = Role::edit($id);
        $data = ['title' => 'Челядь', 'edit' => $edit];
        return view('role/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, $id)
    {
        $this->authorize('before', Role::class);
        $res = Role::up($id, $request);
        if ($res == false) {
            return response('Такая должность уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('role.index');
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
        $this->authorize('before', Role::class);
        Role::destr($id);
        return back();
    }
}
