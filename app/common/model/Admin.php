<?php
/*
 * @Author: your name
 * @Date: 2020-11-09 15:49:26
 * @LastEditTime: 2020-11-09 16:24:26
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/common/model/Admin.php
 */
  namespace app\common\model;
  use think\Model;

  class Admin extends Model{

    public function register($data){
      $validate = new \app\common\validate\Admin();
      if(!$validate->scene('register')->check($data)){
        return $validate->getError();
      }
    if ($data['code'] != session('code')) {
      return '验证码有误！';
    }
      $row = model('Admin')->allowField(true)->save($data);
      if($row){
        return 1;
      }
    }

  public function login($data)
  {
    $validate = new \app\common\validate\Admin();
    if (!$validate->scene('login')->check($data)) {
      return $validate->getError();
    }
    $row = model('Admin')->get($data);
    if ($row) {
      return 1;
    }else{
      return '登录账号或密码错误！';
    }
  }
  }

  