<?php
/*
 * @Author: your name
 * @Date: 2020-10-12 15:29:49
 * @LastEditTime: 2020-10-12 15:56:21
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/Var.php
 */
namespace app\view\controller;
use think\Controller;
use think\View;
// 输出变量的四种方法，以及替换配置
class Vars extends Controller{
  public function index(){
     // assign 定义变量
      $this->assign('assign','我是assign变量');
      
      // view 对象
      $this->view->key='value';
      
      View::share('share','我是share分享变量');

      return $this->fetch('index/vars',[
        'name' => 'cocoa',
        'age'=>26
      ]);
  }
}