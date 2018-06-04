<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInviteBoss;
use App\InviteBoss;
use App\Colleague;
use App\Boss;
use App\Role;
use App\Sex;

class InviteBossController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkId')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('before', Colleague::class);
        $listing = InviteBoss::listing();
        $data = ['title' => 'Главная', 'listing' => $listing];
        return view('inviteBoss', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Colleague::class);
        $boss = Boss::listing();
        $role = Role::listing();        
        $sex = Sex::listing();
        $data = ['title' => 'Сотрудник', 'boss' => $boss, 'role' => $role, 'sex' => $sex];
        return view('invite/inviteBoss', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInviteBoss $request)
    {
        $this->authorize('create', Colleague::class);
        $time = strtotime('+1 day');
        $chars = 'abdefhiknrstyz1234567890';
        $numChars = strlen($chars);
        $key = '';
        for ($i = 0; $i < 8; $i++)
        {
            $key .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        $res = InviteBoss::store($request, $time, $key);
        if ($res == false) {
            return response('Вы уже отправили этому сотруднику запрос на регистрацию!');
        }
        else {
            $date = date('Y\-m\-d\ H\:i\:s', $time);
            $data = ['title' => 'Отчет'];
            $message = $request->name . ", для подтверждения регистрации до " . $date . " перейдите по ссылке:\r
            http://localhost/inviteBoss/update/" . $request->email . "/" . $key;
            $message = wordwrap($message, 70, "\r\n");
            $headers = 'From: sunrise@sunrise.kl.com.ua' . "\r\n";
            if (mail($request->email, 'Приглашение в корпоративную сеть', $message, $headers)) {
                return view('raport', $data);
            }
            else {
                return view('fail', $data);
            }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInviteBoss $request, $email, $key)
    {
        $user = InviteBoss::up($email, $key);
        if ($user == false) {
            return response('Вы что-то мутите...');
        }
        else {
            $data = ['user' => $user];
            return view('auth/register', $data);
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
        $this->authorize('delete', Colleague::class);
        InviteBoss::destr($id);
        return back();
    }
}
