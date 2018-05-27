<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boss;

class BossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listing = Boss::listing();
        $date = ['title' => 'Замы', 'listing' => $listing];
        return view('boss', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = ['title' => 'Замы'];
        return view('boss/create', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = Boss::store($request);
        if ($res == false) {
            return response('Такая должность уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('boss.index');
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
        $edit = Boss::edit($id);
        $date = ['title' => 'Замы', 'edit' => $edit];
        return view('boss/edit', $date);
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
        $res = Boss::up($id, $request);
        if ($res == false) {
            return response('Такая должность уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('boss.index');
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
        Boss::destr($id);
        return back();
    }
}
