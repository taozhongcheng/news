<?php
/*
 * @Author: your name
 * @Date: 2020-10-10 11:09:04
 * @LastEditTime: 2020-10-12 10:11:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/app/api/controller/Index.php
 */

namespace app\api\controller;
use think\Controller;
use think\Config;

class Index extends Controller{
   public function __construct(){
    parent::__construct();
   }
  // 访问   http://new.com/api/index/getUserInfo?type=json
  public function getUserInfo($type='json'){
    if(!in_array($type,['json','xml'])){
       $type = 'json';
    }
    // 动态修改return 返回类型配置
    Config::set('default_return_type',$type);

    $data=[
        'code' => 200,
        'result' => [
          'name' => 'coco',
          'age' => 28,
        ]
      ];
    return $data;
  }

}