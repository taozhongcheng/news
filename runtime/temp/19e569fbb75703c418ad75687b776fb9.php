<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:70:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\category.html";i:1604841413;s:73:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\file.html";i:1604842775;s:75:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\header.html";i:1604841366;s:77:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\register.html";i:1604842420;s:74:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\aside.html";i:1604841388;s:75:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\footer.html";i:1604659666;}*/ ?>
<link rel="stylesheet" href="/web/css/category.css?v=<?php echo $version; ?>">
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
    <!-- <link rel="stylesheet" href="__STATIC__/layui/css/layui.css"> -->
    <link rel="stylesheet" href="/common/css/style.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="/web/css/common/common.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2090112_t5ezls12ll.css">
    <link rel="stylesheet" href="/web/css/common/footer.css?v=<?php echo $version; ?>">
    <script src="/common/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="__STATIC__/layui/layui.js"></script> -->
    <script src="/common/js/request.js"></script>
    <script src="/common/js/utils.js"></script>
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
<link rel="stylesheet" href="/web/css/common/header.css?v=<?php echo $version; ?>">
<div class="web__header clearfix">
  <div class=" web__content clearfix">
    <div class="web__header-logo">
      <a href="/"><img src="__STATIC__/image/logo4.png" alt="logo"></a>
    </div>
    <ul class="web__header-list">
      <?php if(is_array($headerMap) || $headerMap instanceof \think\Collection || $headerMap instanceof \think\Paginator): $i = 0; $__LIST__ = $headerMap;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <li class="web__header-list-item <?php if($item['key'] === $pathIndex): ?>active<?php endif; ?>">
        <div class="web__header-list-item-icon"><i class="iconfont <?php echo $item['icon']; ?>"></i></div>
        <a href="/news/<?php echo $item['key']; ?>.html"><?php echo $item['name']; ?></a>
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
<link rel="stylesheet" href="/web/css/common/register.css?v=<?php echo $version; ?>">
<div class="register__html">
    <div class="register__html-warp">
        <div class="register__html-warp-head">
            <span>注册</span>
            <i class="iconfont icon-zan"></i>
        </div>
        <div class="register__html-warp-mid">
             <form>
                 <div class="form-item">
                     <span class="form-item-label">昵称</span>
                     <input type="text" placeholder="请输入昵称">
                 </div>
                 <div class="form-item">
                    <span class="form-item-label">昵称</span>
                    <input type="text" placeholder="请输入昵称">
                </div>
                <div class="form-item">
                    <span class="form-item-label">昵称</span>
                    <input type="text" placeholder="请输入昵称">
                </div>
                <div class="form-item">
                    <span class="form-item-label">昵称</span>
                    <input type="text" placeholder="请输入昵称">
                </div>
             </form>
        </div>
    </div>
</div>
  

<link rel="stylesheet" href="/web/css/common/header.css?v=<?php echo $version; ?>">
<div class="web__header clearfix">
  <div class=" web__content clearfix">
    <div class="web__header-logo">
      <a href="/"><img src="__STATIC__/image/logo4.png" alt="logo"></a>
    </div>
    <ul class="web__header-list">
      <?php if(is_array($headerMap) || $headerMap instanceof \think\Collection || $headerMap instanceof \think\Paginator): $i = 0; $__LIST__ = $headerMap;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
      <li class="web__header-list-item <?php if($item['key'] === $pathIndex): ?>active<?php endif; ?>">
        <div class="web__header-list-item-icon"><i class="iconfont <?php echo $item['icon']; ?>"></i></div>
        <a href="/news/<?php echo $item['key']; ?>.html"><?php echo $item['name']; ?></a>
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
  <div class="category__main web__content">
    <div class="category__main-content clearfix">
      <div class="category__main-l web__main-l">
        <div class="category__main-header">
          <span>当前位置：</span>
          <a href="/">首页</a>
          < <span><?php echo $channel; ?></span>
        </div>
        <div class="category__main-new-list clearfix" id="news_ul">
        </div>
        <div class="list__loading"><img src="__STATIC__/image/loading.gif" alt="loading"></div>
      </div>
      <link rel="stylesheet" href="/web/css/common/aside.css?v=<?php echo $version; ?>">
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

<script language="javascript">
  const channel = "<?php echo $channel; ?>" === '推荐' ? '' : "<?php echo $channel; ?>";
  const path = "<?php echo $path; ?>" ? '<?php echo $path; ?>' : 'push';
  var pageNum = 1, listData = [], switchs = false, lastPage=1;
  // 是否是详情页返回
  const isBack = sessionStorage.getItem('ACTIVE_TYPE') && sessionStorage.getItem('ACTIVE_TYPE') == 2;

  init()

  $(document).bind('scroll', function () {
  //文档内容实际高度（包括超出视窗的溢出部分）
  var scrollHeight = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight)
  //滚动条滚动距离
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
  //窗口可视范围高度
  var clientHeight = window.innerHeight || Math.max(document.documentElement.clientHeight, document.body, clientHeight)
  if (clientHeight + scrollTop >= scrollHeight-150) {
    if (switchs) return
    pageNum++
    switchs = true
    getData()
  }
})
  
  function getData(){
    request('<?php echo url("/news/list"); ?>', { page: pageNum, channel }, function (data) {
      const list = data.data.list;
      const html = setHtml(list);
      switchs = false;
      lastPage = data.data.lastPage;
      listData=listData.concat(list);
      if(lastPage > pageNum){
        $(".list__loading").html("<img src='__STATIC__/image/loading.gif' alt='loading'>")
      }else{
        switchs = true;
        $(".list__loading").html('<p>没有更多了</p>')
      }
      $('#news_ul').append(html)
    })
  }

   function setHtml(list) {
      let html = '';
      list.forEach(item => {
        const type = item.cover_size;
        const className = type >3 ? `more_cover` : '';
        html += "<a href='/news/" + path + "/" + item['id'] + ".html' class='category__main-new-list-item "+ className+"'>"
        html += "<div class='clearfix item_li'>"
        html += "<div class='category__main-new-list-item-text'>"
        html += "<div class='title'>" + item['title'] + "</div>"
        if (!className) {
          html += "<p>" + item['des'] + "</p>"
        }
        html += "</div>"
        html += "<div class='category__main-new-list-item-pc'>"
        html += "<img src=" + item['cover'][0] + " alt='"+item['title'] +"'>"
        if(className){
          html += "<img src=" + item['cover'][2] + " alt='"+item['title'] +"'>"
          html += "<img src=" + item['cover'][3] + " alt='"+item['title'] +"'>"
        }
        html += "</div>"
        html += "<div class='category__main-new-list-item-btns'>"
        html += "<span class='author'><i class='iconfont icon-author'></i>" + item['src'] + "</span>"
        if (channel) {
          html += "<span class='time'><i class='iconfont icon-time'></i>" + item['time'] + "</span>"
        } else {
          html += "<span class='channel'>" + item['channel'] + "</span>"
        }
        html += "</div></div></a>"
      });
     
      return html
    }
    $('#news_ul').on('click', '.item_li', function () {
      const height = $(document).scrollTop();
      sessionStorage.setItem('HEIGHT', height);
      sessionStorage.setItem('PAGE', pageNum);
      sessionStorage.setItem('ACTIVE_TYPE', 2);
      sessionStorage.setItem('LISTDATA', JSON.stringify(listData));
      $(document).unbind("scroll")
    })

    function init(){
      if (!isBack) {
        getData()
         return
     }
      pageNum = sessionStorage.getItem('PAGE');
      const data = JSON.parse(sessionStorage.getItem('LISTDATA'));
      const html = setHtml(data);
      const height = sessionStorage.getItem('HEIGHT')
      listData = listData.concat(data);
      $('#news_ul').append(html);
      
      $(document).scrollTop(height)
      clearSession()
    }
    function clearSession(){
      sessionStorage.removeItem('HEIGHT');
      sessionStorage.removeItem('PAGE');
      sessionStorage.removeItem('ACTIVE_TYPE');
      sessionStorage.removeItem('LISTDATA');
    }
</script>