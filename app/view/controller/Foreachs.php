<?php
/*
 * @Author: your name
 * @Date: 2020-10-12 17:34:27
 * @LastEditTime: 2020-10-12 17:45:29
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/Foreach.php
 */
namespace app\view\controller;
use think\Controller;

class Foreachs extends Controller{
  public function index(){
    $list =[
      'user1'=>[
        'name'=> 'coco',
        'age'=> 28,
      ],
     'user2'=>[
        'name'=> 'coco2',
        'age'=> 28,
       ],
      'user3'=>[
        'name'=> 'coco3',
        'age'=> 28,
      ]
    ];
    $this->assign('list',$list);
    return $this->fetch('index/foreachs');
  }
}