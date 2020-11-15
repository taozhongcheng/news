<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:67:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\index.html";i:1604929580;s:73:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\file.html";i:1605097000;s:75:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\header.html";i:1605446912;s:77:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\register.html";i:1605444156;s:74:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\login.html";i:1605282460;s:83:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\index\newsList.html";i:1604765869;s:74:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\aside.html";i:1604928460;s:75:"D:\phpstudy_pro\WWW\thinkphp_news\public/../app/web\view\common\footer.html";i:1604659666;}*/ ?>
<!--
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-09 09:50:20
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
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2090112_gzf58brdqd.css">
    <link rel="stylesheet" href="/web/css/common/footer.css?v=<?php echo $version; ?>">
    <script src="/common/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="__STATIC__/layui/layui.js"></script> -->
    <script src="/common/js/request.js?v=<?php echo $version; ?>"></script>
    <script src="/common/js/utils.js?v=<?php echo $version; ?>"></script>
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
<!--
 * @Author: your name
 * @Date: 2020-11-09 09:30:50
 * @LastEditTime: 2020-11-09 10:24:25
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/web/view/common/header.html
-->
<link rel="stylesheet" href="/web/css/common/header.css?v=<?php echo $version; ?>">
<div class="web__header clearfix">
  <div class=" web__content clearfix">
    <div class="web__header-logo">
      <a href="/"><img src="/web/image/logo4.png" alt="logo"></a>
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
      <?php if(!$userInfo): ?>
      <div class="web__header-right-time1 item" onclick="openRegisterMotal()">
        注册
     </div>
      <div class="web__header-right-item1 item" onclick="openLoginMotal()">
        登录
      </div>
      <?php else: ?>
      <div class="web__header-right-item2 item">
         <?php echo $userInfo['nickname']; ?>
      </div>
      <a href="<?php echo url('/admin/index'); ?>" class="web__header-right-item2 item">
         个人后台
     </a>
      <?php endif; ?>
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
<!--
 * @Author: your name
 * @Date: 2020-11-09 09:30:50
 * @LastEditTime: 2020-11-09 12:32:33
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/web/view/common/register.html
-->
<link rel="stylesheet" href="/web/css/common/register.css?v=<?php echo $version; ?>">
<div class="register__html">
    <div class="register__html-warp">
        <div class="register__html-warp-head">
            <span>用户注册</span>
            <span class="register__html-close" onclick="closeRegisterMotal()"><i
                    class="iconfont icon-guanbi1"></i></span>
        </div>
        <div class="register__html-warp-mid">
            <form id="register__form">
                <div class="form-item">
                    <i class="iconfont icon-nicheng"></i>
                    <span class="form-item-label">用户昵称</span>
                    <div class="form-item-input"><input type="text" length="15" name="nickname" placeholder="请输入用户昵称">
                    </div>
                </div>
                <div class="form-item">
                    <i class="iconfont icon-youxiang"></i>
                    <span class="form-item-label">用户邮箱</span>
                    <div class="form-item-input has-email">
                        <input type="text" name="email" length="15" placeholder="请输入用户邮箱">
                        <button class="send-code" onclick="sendCodeOfReg();return false;">发送验证码</button>
                    </div>
                </div>
                <div class="form-item">
                    <i class="iconfont icon-mima"></i>
                    <span class="form-item-label">用户密码</span>
                    <div class="form-item-input"><input type="text" length="15" name="password" placeholder="请输入用户密码">
                    </div>
                </div>
                <div class="form-item">
                    <i class="iconfont icon-querenmima"></i>
                    <span class="form-item-label">确认密码</span>
                    <div class="form-item-input"><input type="text" length="15" name="confirm" placeholder="请确认用户密码">
                    </div>
                </div>
                <div class="form-item">
                    <i class="iconfont icon-ecurityCode"></i>
                    <span class="form-item-label">验证码</span>
                    <div class="form-item-input"><input type="text" length="4" name="code" placeholder="请输入邮箱验证码"></div>
                </div>
                <div class="form-item">
                    <button class="form-item-submit" onclick="register();return false">立即注册</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openRegisterMotal() {
        $('.register__html').show();
    }
    function closeRegisterMotal() {
        $('.register__html').hide();
    }
    // 验证码效果,90秒后图片验证码自动刷新
    function setSendBtn() {
        var i = 90;
        $(".send-code").html(i + "秒后重发").prop("disabled", "disabled");
        var time = setInterval(function () {
            i--;
            if (i > 0) {
                $(".send-code").html(i + "秒后重发").prop("disabled", "disabled");
            } else {
                clearInterval(time);
                $(".send-code").html("重新获取").prop("disabled", "");
            }
        }, 1000);
    }
    function sendCodeOfReg() {
        const reg = /^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;
        const email = $("input[name=email]").val();
        if (!reg.test(email)) return toast("邮箱格式有误！");
        request('<?php echo url("/web/admin/register/code"); ?>', { email }, function () {
            setSendBtn()
        })
        return false
    }
    function register() {
        const formData = $('#register__form').serializeArray()
        formData.push({name:'hasCode',value:1});
        $('.form-item-submit').attr("disabled", true);
        request('<?php echo url("/web/admin/register"); ?>', formData, function (res) {
            $('#register__form')[0].reset()
            $(".send-code").prop("disabled", "");
           // $(".web__header").removeClass('web__app-header');
            toast(res.msg)
            closeRegisterMotal()
        }, 'post')
        setTimeout(function () {
            $('.form-item-submit').attr("disabled", false);
        }, 2000)
    }
</script>
<!--
 * @Author: your name
 * @Date: 2020-11-09 09:30:50
 * @LastEditTime: 2020-11-09 12:32:33
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/web/view/common/login.html
-->
<link rel="stylesheet" href="/web/css/common/login.css?v=<?php echo $version; ?>">
<div class="login__html">
  <div class="login__html-warp">
    <div class="login__html-warp-head">
      <span>用户登录</span>
      <span class="login__html-close" onclick="closeLoginMotal()"><i class="iconfont icon-guanbi1"></i></span>
    </div>
    <div class="login__html-warp-mid">
      <form id="login__form">
        <div class="form-item">
          <i class="iconfont icon-youxiang"></i>
          <span class="form-item-label">用户邮箱</span>
          <div class="form-item-input">
            <input type="text" name="email" length="15" placeholder="请输入用户邮箱">
          </div>
        </div>
          <div class="form-item">
            <i class="iconfont icon-mima"></i>
            <span class="form-item-label">用户密码</span>
            <div class="form-item-input"><input type="text" length="15" name="password" placeholder="请输入用户密码">
            </div>
          </div>
        <div class="form-item">
          <button class="form-item-submit" onclick="login();return false">立即登录</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function openLoginMotal() {
    $('.login__html').show();
  }
  function closeLoginMotal() {
    $('.login__html').hide();
  }
  function login() {
    const formData = $('#login__form').serializeArray()
    $('.form-item-submit').attr("disabled", true);
    request('<?php echo url("/web/admin/login"); ?>', formData, function (res) {
      $('#login__form')[0].reset()
      toast(res.msg)
      closeLoginMotal()
      // $(".web__header").removeClass('web__app-header');
    }, 'post')
    setTimeout(function () {
      $('.form-item-submit').attr("disabled", false);
    }, 2000)
  }
</script>
  

<link rel="stylesheet" href="/web/css/index.css?v=<?php echo $version; ?>">
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
    <a href="/news/<?php echo $news['key']; ?>.html" class="home__main-new-title-r">
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
    <!--
 * @Author: your name
 * @Date: 2020-11-09 09:30:50
 * @LastEditTime: 2020-11-09 09:43:35
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/web/view/common/aside.html
-->
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
        <img src="/web/image/trophy<?php echo $i; ?>.png" alt="">
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
      <img src="/web/image/code.jpg" alt="二维码">
    </div>
    <div class="web__aside-rent-advertising">
      <img src="/web/image/gg.png" alt="广告">
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