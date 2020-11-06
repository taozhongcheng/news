<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:63:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/index.html";i:1604454562;s:69:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/common/file.html";i:1604545567;s:71:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/common/header.html";i:1604454562;s:79:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/common/index/newsList.html";i:1604454562;s:70:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/common/aside.html";i:1604454562;s:71:"/mnt/hgfs/xm/thinkphp_news/public/../app/web/view/pc/common/footer.html";i:1604454562;}*/ ?>
<link rel="stylesheet" href="__CSS__/index.css?v=<?php echo $version; ?>">
<!--
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 11:06:07
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
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2090112_du7h5obbuq.css">
    <link rel="stylesheet" href="__CSS__/common/footer.css?v=<?php echo $version; ?>">
    <script src="__JS__/jquery-3.2.1.min.js"></script>
    <script src="__STATIC__/layui/layui.js"></script>
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
<div class="home__main web__main">
  <div class="home__main-content web__content  clearfix">
    <div class="home__main-content-ml web__main-l">
      <?php if(is_array($newsData) || $newsData instanceof \think\Collection || $newsData instanceof \think\Paginator): $i = 0; $__LIST__ = $newsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?>
<div class="home__main-new">
  <div class="home__main-new-title">
    <span class="home__main-new-title-l">
      <i class="iconfont <?php echo $news['icon']; ?>"></i>
      <?php echo $news['name']; ?>看点
    </span>
    <?php if($news['style'] !== 'select'): ?>
    <a href="/<?php echo $news['key']; ?>.html" class="home__main-new-title-r">
      更多
      <i class="iconfont icon-chevron-right-circle "></i>
    </a>
    <?php endif; ?>
  </div>

  <div class="home__main-new-<?php echo $news['style']; ?> clearfix">
    <?php if(is_array($news['list']) || $news['list'] instanceof \think\Collection || $news['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
    <a href="/news/<?php echo $news['key']; ?>/<?php echo $item['id']; ?>.html"  class="home__main-new-item clearfix">
      <div class="home__main-new-item-pc">
        <img src="<?php echo $item['pic']; ?>" alt="" class="fm">
        <?php if($news['style'] === 'select'): ?>
        <span class="label"><?php echo $news['name']; ?></span>
        <?php endif; ?>
      </div>
      <div class="home__main-new-item-text">
        <div class="title"><?php echo $item['title']; ?></div>
        <?php if($news['style'] === 'list'): ?>
        <p><?php echo $item['des']; ?></p>
        <?php endif; ?>
        <div class="btns">
          <span class="author">
            <i class="iconfont icon-author"></i>
            <?php echo $item['src']; ?>
          </span>
          <span class="time web__news-time">
            <i class="iconfont icon-time"></i>
            <?php echo $item['time']; ?>
          </span>
          <!-- <span class="browse">
            <i class="iconfont icon-liulan"></i>
              <?php echo $item['browse']; ?>
          </span> -->
        </div>
      </div>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
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