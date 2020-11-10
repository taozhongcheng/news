<?php
/*
 * @Author: your name
 * @Date: 2020-09-27 18:02:01
 * @LastEditTime: 2020-11-04 14:37:33
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/index/controller/Index.php
 */
namespace app\index\controller;
use think\Env;
use think\Session;
class Index                           
{
    // 在整个模块动态配置
    public function __construct(){
        config('before','beforeAction');
    }
    public function index(){
        // $res = $_ENV;
        // $res = Env::get('coco1','default');
     //  Session::set('AAA',111);
       dump(Session::get('AAA'));
        $res = Env::get('database.hostname');
       // dump(config());
     }
}