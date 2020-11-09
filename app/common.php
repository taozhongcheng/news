<?php

use mailer\phpmailer;
/*
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 14:09:47
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/app/common.php
 */

/**
 * php除数组指定的key值(直接删除key值实现)
 * @param unknown $data
 * @param unknown $key
 * @return unknown
 */
function array_remove($data, $key){
	if(!array_key_exists($key, $data)){
		return $data;
	}
	$keys = array_keys($data);
	$index = array_search($key, $keys);
	if($index !== FALSE){
		array_splice($data, $index, 1);
	}
	return $data;
}

/**
 * @param $content
 * @return null
 *  从HTML文本中提取所有图片111
 */
function get_images_from_html($content)
{
	$pattern = "/<img.*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/";
	preg_match_all($pattern, htmlspecialchars_decode($content), $match);
	if (!empty($match[1])) {
		return $match[1];
	}
	return [];
}
//substr(htmlspecialchars(trim(strip_tags($v['content']))), 0, 400);
// 文章概要提取
function getDescriptionFromContent($content, $count)
{
	$content = preg_replace("@<script(.*?)</script>@is", "", $content);
	$content = preg_replace("@<iframe(.*?)</iframe>@is", "", $content);
	$content = preg_replace("@<style(.*?)</style>@is", "", $content);
	$content = preg_replace("@<(.*?)>@is", "", $content);
	$content = str_replace(PHP_EOL, '', $content);
	$space = array(" ", "　", "  ", " ", " ");
	$go_away = array("", "", "", "", "");
	$content = str_replace($space, $go_away, $content);
	$res = mb_substr($content, 0, $count, 'UTF-8');
	if (mb_strlen($content, 'UTF-8') > $count) {
		$res = $res . "...";
	}
	return $res;
}

// 时间转文字 $time 时间戳
function timeToText($time)
 {
    //获取今天凌晨的时间戳
    $day = strtotime(date('Y-m-d',time()));
    //获取昨天凌晨的时间戳
    $pday = strtotime(date('Y-m-d',strtotime('-1 day')));
    //获取现在的时间戳
    $nowtime = time();  
    $t = $nowtime-$time;
   if($time<$pday){
      $str = date('Y-m-d H:i:s',$time);
   }elseif($time<$day && $time>$pday){
      $str = "昨天";
   }elseif($t>60*60){
      $str = floor($t/(60*60))."小时前";
   }elseif($t>60){
      $str = floor($t/60)."分钟前";
   }else{
      $str = "刚刚";
   }
   return $str;
}
// 公共发送邮件函数
function sendEmail($title,$desc_content, $toemail)
{
	$mail = new PHPMailer();
	$mail->IsSMTP(); // 启用SMTP  
	$mail->Host = 'smtp.qq.com'; //SMTP服务器 以qq邮箱为例子   
	$mail->Port = 465;  //邮件发送端口  
	$mail->SMTPAuth = true;  //启用SMTP认证  
	$mail->SMTPSecure = "ssl";   // 设置安全验证方式为ssl  
	$mail->CharSet = "UTF-8"; //字符集  
	$mail->Encoding = "base64"; //编码方式  
	$mail->Username = '1849847528@qq.com';  //发件人邮箱 
	$mail->Password = 'ahewugbsnugydcba';  //发件人密码 ==>重点：是授权码，不是邮箱密码  
	   
	$mail->From = '1849847528@qq.com';  //发件人邮箱 
	$mail->FromName = 'coco';  //发件人姓名  
	$mail->AddAddress($toemail); //添加收件人 
	$mail->IsHTML(true); //支持html格式内容  
	$mail->Subject = $title; //邮件标题 
	$mail->Body = $desc_content; //邮件主体内容  
	if (!$mail->send()) { // 发送邮件
		return $mail->ErrorInfo;
	} else {
		return 1;
	}
}