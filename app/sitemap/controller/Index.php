<?php

namespace app\sitemap\controller;

use think\Controller;

class Index extends Controller
{
  public function index()
  {
    $file = 'sitemap.xml';
    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $content .= '<url><loc>http://www.cocotao.cn</loc><priority>1.00</priority></url>';

    // 栏目页面
    $catelist = model('Cate')->order('sort', 'desc')->select();
    foreach ($catelist as $key => $v) {
      $channel = getChannel($v['name']);
      $content .= '<url>';
      $content .= '<loc>http://www.cocotao.cn/news/' . $channel . '.html</loc>';
      $content .= '<priority>0.8</priority>';
      $content .= '<changefreq>dayly</changefreq>';
      $content .= '</url>';
    }
    $newsNum = ceil((model('JisuNews')->count()) / 10);
    // 文章页面
    for($i=1;$i<=$newsNum;$i++){
      ignore_user_abort();
      usleep(50*$i);
     $newslist = model('JisuNews')->sitemap($i);
      foreach ($newslist as $key => $v) {
        $channel = getChannel($v['channel']);
        echo ($key+($i-1)*10 . '：<a href=http://www.cocotao.cn/news/' . $channel . '/' . $v['id'] . '.html>' . $v['title'] . '</a><br>');
        $content .= '<url>';
        $content .= '<loc>http://www.cocotao.cn/news/' . $channel . '/' . $v['id'] . '.html</loc>';
        $content .= '<priority>0.6</priority>';
        $content .= '<lastmod>' . $v['time'] . '</lastmod>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '</url>';
      }
    }
    $content .= '</urlset>';
    file_put_contents($file, $content);
    return;
  }
}
