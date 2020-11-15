<?php
 namespace app\admin\controller;
 use app\admin\controller\Base;

 class Admin extends Base{


     public function list(){
      return  $this->fetch('/admin/list');
     }

     public function add(){
        $viewData=[
            'admin' => null,
        ];
        $this->assign($viewData);
         return $this->fetch('/admin/add');
     }

     public function edit(){
         $user_id = $this->request->param('id');
         $row = model('Admin')->detail($user_id);
         $viewData=[
             'admin' => $row,
         ];
         $this->assign($viewData);
         return $this->fetch('/admin/add');
     }
 }