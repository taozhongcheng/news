<?php
/*
 * @Author: your name
 * @Date: 2020-10-10 15:17:38
 * @LastEditTime: 2020-10-12 09:56:57
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/request/controller/Index.php
 */

namespace app\request\controller;
use think\request;

class Index{
  public function index(Request $request){
    
    #输入框内容
    dump($request->domain());// 获取主域名
    dump($request->pathinfo());// 请求url包含后缀
    dump($request->path());  //
    dump($request->url());
    dump($request->baseUrl());
    dump($request->route());

    #请求类型
    dump($request->method()); // 请求方法
    dump($request->isGet());
    dump($request->isPost());
    dump($request->isAjax());

    #请求参数
    dump($request->param()); // url请求参数，包含/:id
    
    dump($request->param('sid','aaa')); // 获取单个参数,设置默认值
    session('NAME','coco');  // 设置session
    dump($request->session()); // session
    dump($request->session('NAME')); //获取单个session
    cookie('NAME','cocoa'); // 设置cookie
    dump($request->cookie()); // 获取cookie
    dump($request->cookie('NAME'));// 获取单个cookie
    dump($request->header());// 获取请求头信息
    #获取模块
    dump($request->module()); //获取模块名
    dump($request->controller()); // 获取控制器名字
    dump($request->action()); // 获取方法名
    dump($request);

    #获取环境
    dump($request->env());
     dump($request->ip());
  }
}