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
//        $users = DB::table('users')
//            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
//            ->get();
//        $key = md5("user_{$id}");
//        $userRedis = Redis::get($key);
//        Redis::hset('web','google','google.cn');
//        Redis::hset('web','apple','apple.com');
//        Redis::hset('goods','apple',10);
//        Redis::hset('goods','pen',8);
//        Redis::hset('goods','phone',6);
//        Redis::hset('goods','mouse',2);
//        Redis::hset('goods','box',1);
//        if(empty($userRedis)){
//            Redis::hset($key,'id',$id);
//        }
//        $users = DB::select("SELECT * FROM  users WHERE  id = :id", ['id'=>$id]);
        $users = $this->userTable->paginate(2);
        d($users);
        return view('user.profile', ['users' => $users]);
    }
    
    public function validate_test(StoreBlogPost $request)
    {
        
    }
}