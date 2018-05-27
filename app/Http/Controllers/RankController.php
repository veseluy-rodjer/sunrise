<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listing = Rank::listing();
        $date = ['title' => 'Челядь', 'listing' => $listing];
        return view('rank', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = ['title' => 'Челядь'];
        return view('rank/create', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = Rank::store($request);
        if ($res == false) {
            return response('Такая должность уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('rank.index');
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
        $edit = Rank::edit($id);
        $date = ['title' => 'Челядь', 'edit' => $edit];
        return view('rank/edit', $date);
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
        $res = Rank::up($id, $request);
        if ($res == false) {
            return response('Такая должность уже существует, придумайте другую!');
        }
        else {
            return redirect()->route('rank.index');
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
        Rank::destr($id);
        return back();
    }
}
