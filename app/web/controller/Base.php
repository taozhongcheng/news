<?php

namespace app\web\controller;

use think\Controller;

class Base extends Controller
{
  public function __construct()
  {
    parent::__construct();

    $isMobile = $this->request->isMobile();
    // 头部菜单配置
    $header = model('Cate')->list();
    if (!$isMobile) {
      array_splice($header, 0, 1);
    }
    // 右侧头条看点
    $hotList = model('JisuNews')->setHotList();
    // 友情链接
    $linkList = model('Link')->getLinkList();
    // SEO 默认设置
    $viewData = [
      'version' => config('version'),   // 版本号
      'isMobile' => $isMobile,  // 是否是手机
      'headerMap' => $header,   // 头部菜单配置
      'pathIndex' => 0,
      'title' => '',
      'hotList' => $hotList,   // 右侧头条看点
      'linkList' => $linkList,  // 友情链接
      'seo' => config("seo")['default'],
      'userInfo' => session("userInfo"),
    ];
    $this->view->share($viewData);
  }
}
