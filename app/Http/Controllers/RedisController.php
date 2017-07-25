<?php
/**
 * Created by PhpStorm.
 * User: mousse
 * Date: 2017/7/25
 * Time: 10:47
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public $redis;
    
    public function __construct()
    {
        $this->redis = Redis::connection();
    }
    
    public static function set($key, $value = '')
    {
        if (empty($key)) {
            return null;
        }
        
        return Redis::set($key, $value);
    }
    
    public static function get($key)
    {
        if (empty($key)) {
            return null;
        }
        
        return Redis::get($key);
    }
    
    public static function hget($key, $field)
    {
        if (empty($key) || empty($field)) {
            return null;
        }
        
        return Redis::hget($key, $field);
    }
    
    public static function hset($key, $field, $value)
    {
        if (empty($key) || empty($field)) {
            return null;
        }
        
        return Redis::hset($key, $field, $value);
    }
}