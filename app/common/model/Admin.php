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

    public function add($data){
      $validate = new \app\common\validate\Admin();
      if(!$validate->scene('add')->check($data)){
        return $validate->getError();
      }
      $row = model('Admin')->allowField(true)->save($data);
      if($row){
        return 1;
      }
    }
  }

  