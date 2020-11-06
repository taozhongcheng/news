<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:49:"/mnt/hgfs/xm/thinkphp_news/public/../app/404.html";i:1604454562;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>404</title>
</head>
<style>
  *{
    padding: 0;
    margin: 0;
  }
  .content__404{
     text-align: center;
     padding-top: 10%;
  }
   .content__404 img{
     width: 90%;
     max-width: 1000px;
   }
   .des{
      color: #999;
   }
   a{
     color: blueviolet;
   }
</style>
<body>
    <div class="content__404">
      <img src="__STATIC__/image/404.jpg" alt="404">
      <div class="des">
        <div>哎呀。你遇到拐角啦</div>
        <span><b id="dd">5</b>秒后自动跳转</span>
        <a href="/">返回首页</a>
      </div>
    </div>
</body>

</html>
 <script type="text/javascript">
  function run() {
    var s = document.getElementById("dd");
    if (s.innerHTML == 1) {
      window.location.href = '/';
      return false;
    }
    s.innerHTML = s.innerHTML * 1 - 1;
  }
  window.setInterval("run();", 1000);
</script>