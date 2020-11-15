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

  // 会员注册
  public function register()
  {
    $data = [
      'nickname' => input('post.nickname'),
      'password' => input('post.password'),
      'confirm' => input('post.confirm'),
      'email' => input('post.email'),
      'code' => input('post.code'),
      'hasCode' =>  +input('post.hasCode'),
      'freeze' => input('post.freeze') ? input('post.freeze') : 0
    ];
    $res = model('Admin')->register($data, $data['hasCode']);
    if ($res === 1) {
      if ($data['hasCode']) {
       sendEmail('cocotao新闻网注册通知', "恭喜您注册成功！用户昵称：" . $data['nickname'] . "；用户密码：" . $data['password'], $data['email']);
       session('code', null);
      }
      return $this->success('注册成功！');
    } else {
      return $this->error($res);
    }
  }

  // 会员列表
  public function list()
  {
    $data = [
      'page' => input('get.page'),
      'limit' => input('get.limit')
    ];
    $row = model('Admin')->list($data);
    if ($row) {
      return [
        'code' => 0,
        'count' => $row['count'],
        'data' => $row['data']
      ];
    } else {
      return $this->error('请求失败！');
    }
  }

  // 会员详情
  public function detail($data)
  {
    $row = model('Admin')->get($data);
    return $row;
  }

  // 编辑会员
  public function edit()
  {
    $data = [
      'user_id' => input('post.user_id'),
      'nickname' => input('post.nickname'),
      'password' => input('post.password'),
      'confirm' => input('post.confirm'),
      'email' => input('post.email'),
      'code' => input('post.code'),
      'freeze' => input('post.freeze') ? input('post.freeze') : 0
    ];
    $hasCode =  $data['code'] ? true : false;
    $res = model('Admin')->edit($data, $hasCode);
    if ($res === 1) {
      if ($hasCode) {
        session('code', null);
      }
      return $this->success('编辑成功！');
    } else {
      return $this->error($res);
    }
  }

  // 会员退出登录
  public function loginOut()
  {
    $data = [
      'user_id' => input('get.user_id')
    ];
    session('userInfo',null);
    return $this->success('退出登录成功！');
  }

    // 会员登录
    public function login()
    {
      $data = [
        'email' => input('post.email'),
        'password' => input('post.password'),
      ];
      $res = model('Admin')->login($data);
      if ($res === 1) {
        $userInfo = model('Admin')->userInfo($data);
        session('userInfo', $userInfo);
        $this->assign('userInfo',$userInfo);
        return $this->success('登录成功！');
      } else {
        return $this->error($res);
      }
    }

  // 冻结账号
  public function freeze()
  {
    $data = [
      'user_id' => input('post.user_id'),
      'freeze' => input('post.freeze'),
    ];
    $res = model('Admin')->freeze($data);
    if ($res === 1) {
      return $this->success('操作成功！');
    } else {
      return $this->error($res);
    }
  }

  // 删除会员
  public function del(){
    $user_id = input('get.user_id');
    $userInfo = model('Admin')->get($user_id);
    $row = $userInfo->delete();
    if($row) return $this->success('删除成功！');
    return $this->error('删除失败');
  }
  // 会员注册发生验证码
  public function code()
  {
    $email = input('get.email');
    $num = mt_rand(1000, 9999);
    session('code', $num);
    $res = sendEmail('cocotao新闻网注册验证码', "尊敬的cocotao新闻网用户，您本次注册邮箱验证码是：" . $num, $email);
    if ($res === 1) {
      return $this->success('注册验证码发送成功！');
    }
  }
}
