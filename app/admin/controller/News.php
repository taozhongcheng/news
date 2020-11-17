<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class News extends Base
{


  public function list()
  {
    $cateList = model('Cate')->list();
    $viewData = [
      'cateList' => $cateList
    ];
    $this->assign($viewData);
    return  $this->fetch('/news/list');
  }

  public function add()
  {
    $cateList = model('Cate')->list();
    $viewData = [
      'detail' => null,
      'cateList' => $cateList
    ];
    $this->assign($viewData);
    return $this->fetch('/news/add');
  }

  public function edit()
  {
    $id = $this->request->param('id');
    $row = model('JisuNews')->getRowById($id);
    $cateList = model('Cate')->list();
    $viewData = [
      'detail' => $row,
      'cateList' => $cateList
    ];
    $this->assign($viewData);
    return $this->fetch('/news/add');
  }
}
