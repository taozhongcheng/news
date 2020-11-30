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
      $channel = getChannelCh($path);
      // SEO设置
      $seo = config("seo");
      $this->assign(['seo' => $seo[$path], 'pathIndex' => $path]);
    } else {
      $channel = '头条';
      $this->assign('pathIndex', 'hot');
    }

    $this->assign('channel', $channel);
    return $this->fetch('/category');
  }

  // 新闻列表数据
  public function newsList()
  {
   
    $params = [
      'page' => input('get.page',1),
      'channel' => input('get.channel'),
      'pageSize' => input('get.pageSize',10),
      'title' => input('get.title',''),
      'src' => input('get.src',''),
      'startTime' => input('get.startTime',''),
      'endTime' => input('get.endTime','')
    ];
    $data = model('JisuNews')->getNewsByPage($params);
    if($data){
      return $this->success('请求成功','',$data);
    }  
  }
}
