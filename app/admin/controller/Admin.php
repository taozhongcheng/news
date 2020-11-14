<?php
 namespace app\admin\controller;
 use app\admin\controller\Base;

 class Admin extends Base{


     public function list(){

      return  $this->fetch('/admin/list');
     }

     public function add(){
         return $this->fetch('/admin/add');
     }

     public function edit(){
         return $this->fetch('/admin/edit');
     }
 }