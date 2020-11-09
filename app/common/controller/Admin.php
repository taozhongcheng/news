<?php
/*
 * @Author: your name
 * @Date: 2020-11-09 12:27:26
 * @LastEditTime: 2020-11-09 16:21:32
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/common/controller/Admin.php
 */

namespace app\common\controller;

use think\Controller;

class Admin extends Controller
{

  public function register()
  {
    $data = [
      'nickname' => input('post.nickname'),
      'password' => input('post.password'),
      'confirm' => input('post.confirm'),
      'email' => input('post.email'),
      'code' => input('post.code')
    ];
     $res = model('Admin')->add($data);
     if($res ===1){
       sendEmail('coco新闻网注册', "恭喜你注册成功<br>用户昵称：" . $data['nickname'] . "<br>用户密码：" . $data['password'], '328336507@qq.com');
       return $this->success('注册成功！');
     }else{
       return $this->error($res);
     }
  }
}
