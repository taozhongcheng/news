<?php

namespace app\web\controller;

use app\web\controller\Base;

class News extends Base
{
  // 文章详情
  public function detail()
  {
    $type = $this->request->param('type');
    $id = $this->request->param('id');
  //  $header = config('header')[$type];
    $detail =  model('JisuNews')->getRowById($id);
    // 浏览量+1
    model('JisuNews')->updateNews($id, 'browse');
    // SEO 默认设置
    $seoCofig = config('seo')[$type];
    $keyword = $detail['keyword'] ? $detail['keyword'] : $seoCofig['keyword'];
    $seo = array(
      'title' => $detail['title'],
      'keyword' => $keyword,
      'desc' => $detail['des'],
    );
    // 设置相关文章
    $newsList =  model('JisuNews')->getRelatedNews(getChannelCh($type), $id, $type);
    // 文章评论列表
    $viewData = [
      'pathIndex' => $type,
      'pathName' => getChannelCh($type),
      'detail' => $detail,
      'id' => $id,
      'seo' => $seo,
      'newsList' => $newsList,
    ];

    $this->assign($viewData);
    return $this->fetch('/news');
  }

  // 文章点赞
  public function detailPraise(){
    $id = input('get.id');
    $type = input('get.type');
    if (empty($id) || empty($type)) {
      return $this->error('参数错误');
    }
    $res = model('JisuNews')->updateNews($id,$type);
    return $this->success('操作成功', '', $res);
  }

   // 文章评论列表
  public function commentList(){
    $id = input('get.id');
    $page = input('get.page');
    if(empty($id)){
      return $this->error('参数错误');
    }
    $res = model('Comment')->list($id,$page);
    return $this->success('请求成功','',$res);
  }

  // 文章评论点赞
  public function commentPraise()
  {
    $id = input('get.id');
    $type = input('get.type');
    if (empty($id) || empty($type)) {
      return $this->error('参数错误');
    }
    $data = model('Comment')->praise($id, $type);
    return $this->success('操作成功', '', $data);
  }

  // 文章发表评论
  public function commentSend()
  {
    $isMobile = $this->request->isMobile();
    $ip = $this->request->ip();
    $data = [
      'topic_id' => input('post.id'),
      'content' => input('post.content'),
      'user_id' => $ip,
      'user_name' => $isMobile ? $ip . '手机端用户' : $ip . '电脑端用户',
    ];
    $res = model('Comment')->add($data);
    // 插入评论数据
    $commentId = model('Comment')->getLastInsID();
    $item = model('Comment')->get($commentId);
    $item['create_time_text'] = timeToText(strtotime($item['create_time']));
    if($res ===1){
      return $this->success('发表评论成功', '',[0=>$item]);
    }else{
      return $this->error($res);
    }
  }
}
