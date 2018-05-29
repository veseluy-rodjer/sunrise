<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colleague;
use App\Boss;
use App\Rank;
use App\Role;
use App\Sex;
/*
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
*/

class ColleagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*      
        Schema::table('users', function (Blueprint $table) {
            $table->integer('sex_id')->nullable()->change();
            $table->integer('belong')->nullable()->change();
        });        
*/
        $order=null;
        $listing = Colleague::listing($order);
        $data = ['title' => 'Главная', 'listing' => $listing];
        return view('colleague', $data);
    }

    public function indexOrder($order)
    {
        $listing = Colleague::listing($order);
        $data = ['title' => 'Главная', 'listing' => $listing];
        return view('colleagues', $data);
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
        //
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
        $user = Colleague::edit($id);
        $boss = Boss::listing();
        $role = Role::listing();        
        $sex = Sex::listing();
        $data = ['title' => 'Сотрудник', 'user' => $user, 'boss' => $boss, 'role' => $role, 'sex' => $sex];
        return view('user/edit', $data);
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
        Colleague::up($id, $request);
        return redirect()->route('index');
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
    }
}
