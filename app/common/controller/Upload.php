<?php

namespace app\common\controller;
use think\Controller;

class Upload extends Controller{

    public function image(){
       $file = request()->file('image');
       $url = '../public/upload/image';
       $info = $file->move($url);
       if($info){
      //  return  $info->getSaveName();//$this->success('上传成功！');
           // 成功上传后 获取上传信息
          // $_POST['image_url'] = '/uploads/image/'.$info->getSaveName();
          return $url.$info->getSaveName();
          return  str_replace('\\\\', '/',$url . '/'. $info->getSaveName());
       }
      
    }
}