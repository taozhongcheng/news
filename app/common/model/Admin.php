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
  use think\Session;

  class Admin extends Model{

    public function add($data){
      $validate = new \app\common\validate\Admin();
      if(!$validate->scene('add')->check($data)){
        return $validate->getError();
      }
    if ($data['code'] != Session::get('code')) {
      return 'a='.$data['code'].'b='.Session::get('code');
    }
      $row = model('Admin')->allowField(true)->save($data);
      if($row){
        return 1;
      }
    }
  }

  