<?php
/*
 * @Author: your name
 * @Date: 2020-10-12 11:54:55
 * @LastEditTime: 2020-10-12 14:36:17
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/Index.php
 */

namespace app\view\controller;

class Index{
 
  public function index(){
    // 控制器 app/view/controller/index/index
    // view 默认地址 app/view/view/index/index.html
    #参数一： 设置默认文件
    #参数二：页面参数传值 
    #参数三：匹配替换
    return view('update',[
      'email' => '2222@qq.com',
      'name'=> 'coco'
    ],[
      'EDG' => '你说的是edg战队吗'
    ]);
  }
  
  // 返回同级目录
  public function dome1(){
    return view('public/header');
  }
  //* 如果以 ./开头返回入口文件下的
  public function dome2(){
    return view('./index.html');
  }
   public function update(){
    return view();
  }
}