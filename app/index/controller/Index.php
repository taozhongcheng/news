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
use think\Controller;

class Index  extends Controller
{
    // 在整个模块动态配置
    public function __construct()
    {
        config('before', 'beforeAction');
    }
    public function index()
    {
     
    }
}
