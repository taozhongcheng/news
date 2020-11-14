<?php
 namespace app\admin\controller;
 use app\admin\controller\Base;

 class Cate extends Base{


     public function list(){

      return  $this->fetch('/cate/list');
     }

     public function add(){
         return $this->fetch('/cate/add');
     }

     public function edit(){
         return $this->fetch('/cate/edit');
     }
 }