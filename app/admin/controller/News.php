<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class News extends Base
{


  public function list()
  {
    return  $this->fetch('/news/list');
  }

  public function add()
  {
    $viewData = [
      'detail' => null,
    ];
    $this->assign($viewData);
    return $this->fetch('/news/add');
  }

  public function edit()
  {
    $id = $this->request->param('id');
    $row = model('JisuNews')->getRowById($id);
    $viewData = [
      'detail' => $row,
    ];
    $this->assign($viewData);
    return $this->fetch('/news/add');
  }
}
