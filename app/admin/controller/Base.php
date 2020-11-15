<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller{
    public function __construct(){
        parent::__construct();
        $viewData = [
            'version' => config('version'),   // 版本号
            'userInfo' => session('userInfo'),
        ]; 
        $this->view->share($viewData);
        $route = $this->request->baseurl();
        if(!session('?userInfo.user_id') && !strstr($route,'/admin/login') && !strstr($route,'/admin/register')) {
          $this->redirect('/admin/login');
        }
       
    } 
}






