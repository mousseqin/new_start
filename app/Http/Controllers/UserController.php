<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use App\Http\Controllers\RedisController AS Redis;
use Illuminate\Support\Facades\DB;

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
    
    public function __get($key)
    {
        if($key == 'userTable'){
            return DB::table('users');
        }
    }
    
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
//        $key = md5("user_{$id}");
//        $userRedis = Redis::get($key);
//        if(empty($userRedis)){
//            Redis::set($key,$id);
//        }
//        $users = DB::select("SELECT * FROM  users WHERE  id = :id", ['id'=>$id]);
        $users = $this->userTable->where(['id'=>$id])->first();
        d($users);
        return view('user.profile', ['users' => $users]);
    }
    
    public function validate_test(StoreBlogPost $request)
    {
        
    }
}