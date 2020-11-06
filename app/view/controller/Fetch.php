<?php
/*
 * @Author: your name
 * @Date: 2020-10-12 14:38:13
 * @LastEditTime: 2020-10-12 14:52:24
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/fetch.php
 */
namespace app\view\controller;
use think\Controller;

class Fetch extends Controller{

  // fetch 方法同view;
  public function index(){
    $this->assign('assign','我是assign定义的变量');
    return  $this->fetch('index/fetch',[
      'email'=>'223343@qq.com',
      'name'=>'cocotao',
    ],[
      'EDG'=>'EDG战队'
    ]);
  }
}