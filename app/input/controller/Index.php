<?php
/*
 * @Author: your name
 * @Date: 2020-10-10 17:01:36
 * @LastEditTime: 2020-10-10 18:01:51
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/input/controller/Index.php
 */
namespace app\input\controller;

 class Index{
   public function index(){
     // 'get', 'post', 'put', 'patch', 'delete', 'param', 'request', 'session', 'cookie', 'server', 'env', 'path', 'file'
    // $res = input('get.id');
    // 111 设置默认值
    $res = input('get.sid','111');
    dump($res);
    $res1 = input('cookie.NAME');
    dump($res1);
    $res2 = input('session.NAME','我是默认值呀');
    dump($res2);
    dump(input('env'));
   }
 }