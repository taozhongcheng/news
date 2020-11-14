<?php
 namespace app\admin\controller;
 use app\admin\controller\Base;

 class Articl extends Base{


     public function list(){

      return $this->fetch('/articl/list');
     }

     public function add(){
         return $this->fetch('/articl/add');
     }

     public function edit(){
         return $this->fetch('/articl/edit');
     }
 }