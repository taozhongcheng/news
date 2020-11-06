<?php
/*
 * @Author: your name
 * @Date: 2020-11-04 09:55:13
 * @LastEditTime: 2020-11-06 10:58:04
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/web/controller/api.php
 */

namespace app\web\controller;

use think\Controller;
use think\Config;
use app\web\model\News as NewsModel;
use app\web\model\Comment as CommentModel;

class Api extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->newsModel = new NewsModel;
    $this->commentModel = new CommentModel;
  }

  // 新闻列表数据
  public function newsList()
  {
    $page = $this->request->get('page', 1);
    $channel = $this->request->get('channel');
    if (!ctype_digit($page)) {
      return json(['errcode' => 10001, 'msg' => '参数错误']);
    }
    $data = $this->newsModel->getNewsByPage($page, $channel, 10);
    return ['errcode' => 0, 'msg' => 'ok', 'data' => $data];
  }
  // 文章评论点赞
  public function commentPraise(){
    $id = $this->request->get('id');
    $type = $this->request->get('type');
    if (empty($id) || empty($type)) {
      return $this->error('参数错误');
    }
    $data = $this->commentModel->updateCommentsPraise($id, $type);
    return $this->success('操作成功','',$data);
  }
  // 文章发表评论
  public function commentSend(){
    $id = input('post.id');
    $content = input('post.content');
    if (empty($id) || empty($content)) {
      return $this->error('参数错误');
    }
    $isMobile = $this->request->isMobile();
    $ip = $this->request->ip();
    $data=[
      'topic_id'=> $id,
      'content'=> $content,
      'user_id' => $ip,
      'user_name' => $isMobile? $ip.'手机端用户' : $ip.'电脑端用户',
      'user_img' => 'https://photo.pic.sohu.com/images/oldblog/person/11111.gif'
    ];
    $res = $this->commentModel->commentSend($data);
    return $this->success('操作成功','',$res);
  }
}
