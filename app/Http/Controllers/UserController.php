<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RedisController AS redis;

class UserController extends Controller
{
    /**
     * 实例化一个新的 UserController 实例
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware('log')->only('index');
//        $this->middleware('subscribed')->except('store');
    }
    
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $key = md5("user_{$id}");
        $userRedis = Redis::get($key);
        if(empty($userRedis)){
            Redis::set($key,$id);
        }
        d($userRedis);
        return view('user.profile', ['user_id' => $id]);
    }
}