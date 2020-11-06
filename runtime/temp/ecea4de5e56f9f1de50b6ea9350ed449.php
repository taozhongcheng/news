<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:69:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\news.html";i:1604659666;s:76:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\file.html";i:1604659666;s:78:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\header.html";i:1604659666;s:85:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\news\comments.html";i:1604659666;s:87:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\news\evaluation.html";i:1604659666;s:77:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\aside.html";i:1604659666;s:78:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\pc\common\footer.html";i:1604659666;}*/ ?>
<!--
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 16:42:09
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/web/view/pc/news.html
-->
<!--
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 16:49:22
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/web/view/pc/common/file.html
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="<?php echo $seo['keyword']; ?>" />
    <meta name="description" content="<?php echo $seo['desc']; ?>" />
    <title><?php echo $seo['title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__CSS__/common/style.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="__CSS__/common/common.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2090112_t5ezls12ll.css">
    <link rel="stylesheet" href="__CSS__/common/footer.css?v=<?php echo $version; ?>">
    <script src="__JS__/jquery-3.2.1.min.js"></script>
    <script src="__STATIC__/layui/layui.js"></script>
    <script src="__JS__/request.js"></script>
    <script src="__JS__/utils.js"></script>
    <script>
      var _hmt = _hmt || [];
      (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?2f85a3983cf5632e1a1707a23feeef55";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

  </head>
  <body>

<link rel="stylesheet" href="__CSS__/news.css?v=<?php echo $version; ?>">
<link rel="stylesheet" href="__CSS__/common/header.css?v=<?php echo $version; ?>">
<div class="web__header clearfix">
  <div class=" web__content clearfix">
    <div class="web__header-logo">
      <a href="/"><img src="__STATIC__/image/logo4.png" alt="logo"></a>
    </div>
    <ul class="web__header-list">
      <?php if(is_array($headerMap) || $headerMap instanceof \think\Collection || $headerMap instanceof \think\Paginator): $i = 0; $__LIST__ = $headerMap;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <li class="web__header-list-item <?php if($item['key'] === $pathIndex): ?>active<?php endif; ?>">
        <div class="web__header-list-item-icon"><i class="iconfont <?php echo $item['icon']; ?>"></i></div>
        <a href="/<?php echo $item['key']; ?>.html"><?php echo $item['name']; ?></a>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

    <div class="web__header-more">
      <div class="web__header-more-rgrad"></div>
      <div class="web__header-more-down">
        <span class="home" onclick="healdMeunClick()">
          <span class="homeline"></span>
          <span class="homeline"></span>
          <span class="homeline"></span>
        </span>
      </div>
    </div>
    <div class="web__header-right">
      <div class="web__header-right-time item">
        <?php echo date("Y/m/d") ?>
      </div>
      <div class="web__header-right-weatch item">
        <?php echo $week; ?>
      </div>
    </div>
    <div class="web__header-motal"></div>
  </div>
</div>
<script>
  function healdMeunClick(){
    const isActive = $('.web__header').hasClass('web__app-header')
    isActive ? meunUp() : meunDown()
  }
  function meunDown(){
    $('.web__header').addClass('web__app-header');
    $('.web__header-more-down .home').addClass('active')
    $('.web__app-header').animate({height:275},'slow')
  }
  function meunUp(){
    $('.web__header-more-down .home').removeClass('active')
    $('.web__app-header').animate({ height: 50 }, '50',function(){
      $('.web__header').removeClass('web__app-header');
      
    })
  }
</script>
<div class="web__main">
  <div class="web__content news__main clearfix">
    <div class="news__main-l web__main-l">
      <div class="news__main-l-header">
        <span>当前位置：</span>
        <a href="/">首页</a>
        < <a href="/<?php echo $header['key']; ?>.html"><?php echo $header['name']; ?></a>
          < <span>正文</span>
      </div>
      <div class="news__main-l-detail">
        <h3 class="news__main-l-detail-title">
          <?php echo $detail['title']; ?>
        </h3>
        <div class="news__main-l-detail-bnt">
          <span class="author">
            <i class="iconfont icon-author"></i>
            <?php echo $detail['src']; ?>
          </span>
          <span class="time">
            <i class="iconfont icon-time"></i>
            <?php echo $detail['time']; ?>
          </span>
          <span class="browse">
            <i class="iconfont icon-liulan"></i>
            <?php echo $detail['browse']; ?>
          </span>
        </div>
        <div class="news__main-l-detail-content">
          <?php echo $detail['content']; ?>
        </div>
      </div>
      <div class="news__main-l-related clearfix">
        <div class="news__main-l-related-title">
          <span>
            <i class="iconfont icon-xiangguan"></i>
            相关看点
          </span>
        </div>
        <div class="news__main-l-related-list clearfix">
          <?php if(is_array($newsList) || $newsList instanceof \think\Collection || $newsList instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($newsList) ? array_slice($newsList,0,3, true) : $newsList->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
          <a href="/news/<?php echo $header['key']; ?>/<?php echo $item['id']; ?>.html" class="news__main-l-related-list-item clearfix">
            <div class="news__main-l-related-list-item-text">
              <div class="title"><?php echo $item['title']; ?></div>
            </div>
            <div class="news__main-l-related-list-item-pc">
              <img src="<?php echo $item['pic']; ?>" alt="" class="fm">
            </div>
            <div class="news__main-l-related-list-item-btns">
              <span class="author">
                <i class="iconfont icon-author"></i>
                <?php echo $item['src']; ?>
              </span>
              <span class="browse">
                <i class="iconfont icon-liulan"></i>
                <?php echo $item['browse']; ?>
              </span>
            </div>
          </a>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      <link rel="stylesheet" href="__CSS__/common/comments.css?v=<?php echo $version; ?>">
<div class="comments__html">
  <div class="comments__html-title">
    <span>
      <i class="iconfont icon-comment"></i>
      热门评论
    </span>
    <span class="num"><b>0</b> 条评论</span>
  </div>
  <div class="comments__html-list">
    <?php if(is_array($commentsList) || $commentsList instanceof \think\Collection || $commentsList instanceof \think\Paginator): $i = 0; $__LIST__ = $commentsList;if( count($__LIST__)==0 ) : echo "$emptyHtml" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
    <div class="comments__html-list-item clearfix">
      <div class="comments__html-list-item-pc">
        <img src="<?php echo $item['user_img']; ?>" alt="">
      </div>
      <div class="comments__html-list-item-text">
        <div class="comments__html-list-item-text-name"><?php echo $item['user_name']; ?></div>
        <div class="comments__html-list-item-text-des"><?php echo $item['content']; ?></div>
        <div class="comments__html-list-item-text-btns">
          <span class="time"><?php echo $item['create_time']; ?></span>
          <span class="item item1 item-play-<?php echo $item['id']; ?>" onclick="healdPraise(<?php echo $item['id']; ?>,'play')">
            <i class="iconfont icon-cai"></i>
            <span class="play-btn-<?php echo $item['id']; ?>"><?php echo $item['play']; ?></span>
          </span>
          <span class="item item2 item-praise-<?php echo $item['id']; ?>" onclick="healdPraise(<?php echo $item['id']; ?>,'praise')">
            <i class="iconfont icon-zan"></i>
            <span class="praise-btn-<?php echo $item['id']; ?>"><?php echo $item['praise']; ?></span>
          </span>
        </div>
      </div>
    </div>
    <?php endforeach; endif; else: echo "$emptyHtml" ;endif; ?>
  </div>
</div>
<script>
  function healdPraise(id, type) {
    const item = `.item-${type}-${id}`
    if ($(item).hasClass('active')) return
    request('<?php echo url("/web/api/commentPraise"); ?>', {id, type }, function (res) {
      const dom = `.${type}-btn-${id}`
      let num = Number($(dom).text())
      $(dom).html(+num + 1)
      $(item).addClass('active')
    })
  }
</script>
      <link rel="stylesheet" href="__CSS__/common/evaluation.css?v=<?php echo $version; ?>">
<div class="evaluation__html">
   <div class="evaluation__html-pc">
     <div class="evaluation__html-pc-box">
      <textarea name="" class="evaluation-textbox" placeholder="来说两句吧……"></textarea>
     </div>
     <div class="evaluation__html-pc-bar">
       <span class="word">该条评论仅代发言者本人观点</span>
       <button class="send" onclick="healdSend()">发送</button>
     </div>
   </div>
</div>
<script>
  function healdSend() {
    const params = {
      id: "<?php echo $id; ?>",
      content: $('.evaluation-textbox').val()
    }
    request('<?php echo url("/web/api/commentSend"); ?>', params, function (res) {
      toast(res.msg)
    },'post')
  }
</script>
    </div>
    <div class="news__main-r">
      <link rel="stylesheet" href="__CSS__/common/aside.css?v=<?php echo $version; ?>">
<div class="web__aside">
  <div class="web__aside-headlines">
    <div class="web__aside-title">
      <span>
        <i class="iconfont icon-toutiaoyangshi"></i>
        头条看点
      </span>
    </div>
    <div class="web__aside-headlines-list">
      <?php if(is_array($hotList) || $hotList instanceof \think\Collection || $hotList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <div class="web__aside-headlines-list-item">
        <?php if($i < 4): ?>
        <img src="/static/image/trophy<?php echo $i; ?>.png" alt="">
        <?php else: ?>
          <span class="bage"><?php echo $i; ?></span>
        <?php endif; ?>
        <a href="/news/hot/<?php echo $item['id']; ?>.html"><?php echo $item['title']; ?></a>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  <div class="web__aside-rent">
    <div class="web__aside-title">
      <span>
        <i class="iconfont icon-guanzhu"></i>
        关注我们
      </span>
    </div>
    <div class="web__aside-rent-des">
      关注微信群，广告位招租
    </div>
    <div class="web__aside-rent-pc">
      <img src="/static/image/code.jpg" alt="二维码">
    </div>
    <div class="web__aside-rent-advertising">
      <img src="/static/image/gg.png" alt="广告">
    </div>
  </div>
</div>
    </div>
  </div>
</div>
<!--
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 16:47:35
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/web/view/pc/common/footer.html
-->
<div class="footer">
  <div class="web__content footer__content">
    <div class="footer__title">
      <span class="footer__title-text">友情链接</span>
    </div>
    <div class="footer__link-list">
      <?php if(is_array($linkList) || $linkList instanceof \think\Collection || $linkList instanceof \think\Paginator): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <a href="<?php echo $item['url']; ?>.html"><?php echo $item['name']; ?></a>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="footer__bottom-record web__content">
      © 2013-2016 今日看点（www.hatdot.com）版权所有 备案：京ICP备13036621号-3
      <a href="" class="map">网站地图</a>
    </div>
  </div>
</div>
</body>
</html>