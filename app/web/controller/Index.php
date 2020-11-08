<?php
/*
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 18:03:31
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/web/controller/Index.php
 */
namespace app\web\controller;
use app\web\controller\Base;

class Index extends Base{
   
  public function index(){
    $this->assign('title','首页');
    $isMobile = $this->request->isMobile();
    if(!$isMobile){
      $newsData =  model('JisuNews')->setNewsList();
      $this->assign('newsData',$newsData);
      return $this->fetch('pc/index');
    }else{
       $category=new \app\web\controller\Category();
       return $category->list();
    }
  }


}