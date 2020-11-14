<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller{
    public function __construct(){
        parent::__construct();
        $viewData = [
            'version' => config('version'),   // 版本号
          ];
          $this->view->share($viewData);
    } 
}