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

class Admin extends Model
{

  public function register($data,$hasCode)
  {
   
    $validate = new \app\common\validate\Admin();
    if (!$validate->scene('register')->check($data)) {
      return $validate->getError();
    }
    if ($hasCode && $data['code'] != session('code')) {
      return '验证码有误！';
    }
    $row = model('Admin')->allowField(true)->save($data);
    if ($row) {
      return 1;
    }
  }

  public function edit($data,$hasCode=true){
    $validate = new \app\common\validate\Admin();
    if(!$validate->scene('edit')->check($data)){
      return $validate->getError();
    }
    if ($hasCode && $data['code'] != session('code')) {
      return '验证码有误！';
    }
    $userInfo = model('Admin')->get($data['user_id']);
    $userInfo->nickname = $data['nickname'];
    $userInfo->password = $data['password'];
    $userInfo->email  = $data['email'];
    $userInfo->freeze = $data['freeze'];
    $row = $userInfo->save();
    if ($row) {
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

    if(!$row) {
      return '登录账号或密码错误！';
    }
    else if ($row && $row['freeze']==0) {
      return 1;
    } else if($row && $row['freeze']==1){
      return '账号已被冻结！';
    }
  }

  public function userInfo($data){
    $row= model('Admin')->where($data)->find();
    if($row) return $row;
    return 1;
  }

  public function list($data){
    $row = model('Admin')->order('create_time','desc')->paginate($data['limit'],null,['page'=>$data['page']]);
    $list = $row->items();
    return [
      'count' => $row->total(),
      'data' => $list
    ];
  }

  // 冻结账号
  public function freeze($data){
    $userInfo = model('Admin')->get($data['user_id']);
    $userInfo->freeze = $data['freeze'];
    $row = $userInfo->save();
    if($row) return 1;
  }
}
