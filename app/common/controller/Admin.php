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
    $res = model('Admin')->register($data);
    if ($res === 1) {
     // sendEmail('cocotao新闻网注册通知', "恭喜您注册成功！用户昵称：" . $data['nickname'] . "；用户密码：" . $data['password'], $data['email']);
     // session('code', null);
      return $this->success('注册成功！');    
    } else {
      return $this->error($res);
    }
  }
  public function login()
  {
    $data = [
      'email' => input('post.email'),
      'password' => input('post.password'),
    ];
    $res = model('Admin')->login($data);
    if ($res === 1) {
      $userInfo = model('Admin')->userInfo($data);
      session('userInfo',$userInfo);
      return $this->success('登录成功！');
    } else {
      return $this->error($res);
    }
  }
  public function code(){
    $email = input('get.email');
    $num = mt_rand(1000,9999);
    session('code', $num);
    $res = sendEmail('cocotao新闻网注册验证码',"尊敬的cocotao新闻网用户，您本次注册邮箱验证码是：".$num,$email);
    if($res === 1){
      return $this->success('注册验证码发送成功！');
    }
  }
}
