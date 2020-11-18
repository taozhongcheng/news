<?php

namespace app\common\controller;
use think\Controller;

class Upload extends Controller{

    public function image(){
       $file = request()->file('image');
       $path = input('post.path');
       if($file && $path){
          $url = '../public/upload/image/' . $path . '/';
          $info = $file->move($url);
          if($info){
            $data = $this->request->domain() . '/upload/image/' . $path . '/' . $info->getSaveName();
            return $this->success('上传成功！', null, $data);
          } else {
            return $this->error($file->getError());
         }
       }else{
         return $this->error('参数有误！');
       }
    }
}