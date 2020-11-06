<?php
/*
 * @Author: your name
 * @Date: 2020-10-12 14:55:48
 * @LastEditTime: 2020-10-12 14:59:41
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/Display.php
 */
namespace app\view\controller;
use think\Controller;

class Display extends Controller{
  public function index(){
    $this->assign('assign','我是字符串变量啊');
    return $this->display('我的作用是返回字符串模板,{$assign}');
  }
}
