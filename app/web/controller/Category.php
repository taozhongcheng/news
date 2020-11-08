<?php

namespace app\web\controller;

use app\web\controller\Base;

class Category extends Base
{
  // 分类列表
  public function list()
  {
    $path = $this->request->param('type');
    $this->assign('path', $path);
    if ($path) {
      $header = config('header');
      $channel = $header[$path]['name'];
      // SEO设置
      $seo = config("seo");
      $this->assign(['seo' => $seo[$path], 'pathIndex' => $path]);
    } else {
      $channel = '推荐';
      $this->assign('pathIndex', 'push');
    }

    $this->assign('channel', $channel);
    return $this->fetch('pc/category');
  }

  // 新闻列表数据
  public function newsList()
  {
    $page = input('get.page',1);
    $channel = input('get.channel');
    $data = model('JisuNews')->getNewsByPage($page, $channel, 10);
    if($data){
      return $this->success('请求成功','',$data);
    }  
  }
}
