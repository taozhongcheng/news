<?php
/*
 * @Author: your name
 * @Date: 2020-10-13 17:18:47
 * @LastEditTime: 2020-10-13 17:34:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/view/controller/Dbs.php
 */
namespace app\view\controller;
use think\Db;

class Dbs{
  public function index(){
  //  dump(config());
    $res = Db::table('tags')->select();
  //  dump($res);
    return json($res);
  }
}