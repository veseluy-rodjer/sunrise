<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBoss;
use App\Boss;

class BossController extends Controller
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
        $this->authorize('before', Boss::class);
        $listing = Boss::listing();
        $data = ['title' => 'Замы', 'listing' => $listing];
        return view('boss', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('before', Boss::class);
        $data = ['title' => 'Замы'];
        return view('boss/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoss $request)
    {
        $this->authorize('before', Boss::class);
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
        $this->authorize('before', Boss::class);
        $edit = Boss::edit($id);
        $data = ['title' => 'Замы', 'edit' => $edit];
        return view('boss/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBoss $request, $id)
    {
        $this->authorize('before', Boss::class);
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
        $this->authorize('before', Boss::class);
        Boss::destr($id);
        return back();
    }
}
