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
use think\Controller;
use app\web\model\News as NewsModel;
use app\web\model\Comment as CommentModel;

class Index extends Controller{
  public function __construct(){
    parent::__construct();
    $this->newsModel = new NewsModel;
    $this->commentModel = new CommentModel;
    // 版本号
    $this->assign('version',config('version'));
    // 是否是手机
    $isMobile = $this->request->isMobile();
    $this->assign('isMobile',$isMobile);
   // 头部菜单配置
    $header = config('header');
    if(!$isMobile){
       $header = array_remove($header,'push');
    }
    $this->assign('headerMap',$header);
    $this->assign('pathIndex',0);
    $this->assign('title','');
    // 右侧头条看点
    $hotList = $this->newsModel->setHotList();
    $this->assign('hotList',$hotList);
    // 星期几
    $week = '星期'.mb_substr( "日一二三四五六",date("w"),1,"utf-8" );
    $this->assign('week',$week);
    // 友情链接
    $linkList = $this->newsModel->getLinkList();
    $this->assign('linkList',$linkList);
    // SEO 默认设置
    $seo = config("seo");
    $this->assign('seo', $seo['all']);
  }


  public function index(){
    $this->assign('title','首页');
    $isMobile = $this->request->isMobile();
    if(!$isMobile){
      $newsData = $this->newsModel->setNewsList();
      $this->assign('newsData',$newsData);
      // SEO设置
      $seo = config("seo");
      $this->assign('seo', $seo['/']);
      return $this->fetch('pc/index');
    }else{
       return $this->category();
    }
  }

  // 分类列表
  public function category(){
    $path = $this->request->path();
    $this->assign('path',$path);
    if($path !== '/'){
      $header = config('header');
      $channel =$header[$path]['name'];
      $this->assign('pathIndex',$path);
    }else{
      $channel = '推荐';
      $this->assign('pathIndex','push');
    }
    $this->assign('channel',$channel);
    // SEO设置
    $seo = config("seo");
    $this->assign('seo', $seo[$path]);
    return $this->fetch('pc/category');
  }

  // 文章详情
  public function news(){
   $type = $this->request->param('type');
   $id = $this->request->param('id');
   $header = config('header')[$type];
   $detail = $this->newsModel->getRowById($id);
   $this->newsModel->updateNews($id,'browse');
   $this->assign('pathIndex', $type);
   $this->assign('header',$header);
   $this->assign('detail',$detail);
   $this->assign('id', $id);
  // SEO 默认设置
  $seoCofig = config('seo')[$type];
  $seo = array(
    'title' => $detail['title'],
    'keyword' => $seoCofig['keyword'],
    'desc' => $detail['des'],
  );
  $this->assign('seo', $seo);
  // 设置相关文章
  $newsList = $this->newsModel->getRelatedNews($header['name'],$id);
  $this->assign('newsList',$newsList);

  // 文章评论列表
  $emptyHtml = "<div class='empty__html'><i class='iconfont icon-kong2'></i></div>";
  $this->assign('emptyHtml', $emptyHtml);
  $commentsList = $this->commentModel->getCommentsList($id);
  $this->assign('commentsList', $commentsList);
   return $this->fetch('pc/news');
  }
}