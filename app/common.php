<?php

use mailer\PHPMailer;
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
  
	
	$mail->Port = 465;  //邮件发送端口 994 
	$mail->SMTPAuth = true;  //启用SMTP认证  
	$mail->SMTPSecure = "ssl";   // 设置安全验证方式为ssl  
	$mail->CharSet = "UTF-8"; //字符集  
	$mail->Encoding = "base64"; //编码方式  

	$mail->Host = 'smtp.qq.com'; //以qq邮箱为例子 
	$mail->Username = '1849847528@qq.com';  //发件人邮箱 
	$mail->Password = 'ahewugbsnugydcba';  //qq发件人密码 ==>重点：是授权码，不是邮箱密码  ahewugbsnugydcba
	$mail->From = '1849847528@qq.com';  //发件人邮箱 

 	// $mail->Host = 'smtp.163.com'; //SMTP服务器 
 	// $mail->Username = 'cocotaos@163.com';  //发件人邮箱 
	// $mail->Password = 'UKEGYXYAMNFQOYDH';  //163发件人密码 ==>重点：是授权码，不是邮箱密码   UKEGYXYAMNFQOYDH   
	// $mail->From = 'cocotaos@163.com';  //发件人邮箱 

	$mail->FromName = 'cocotao新闻网';  //发件人姓名  
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

// 新闻文字类别 换 英文channel

function getChannel($name){
	$arr = [
		'头条' => 'hot',
		'财经' => 'finance',
		'科技' => 'tech',
		'军事' => 'military',
		'娱乐' => 'ent',
		'体育' => 'sports',
		'教育' => 'edu',
		'NBA' => 'nba',
		'股票' => 'stock',
		'女性' => 'women',
		'健康' => 'health',
		'星座' => 'star',
		'育儿' => 'baby',
	];
	return $arr[$name];
}

function getChannelCh($name)
{
	$arr = [
		'push'=> '推荐', // 没有的
		'hot' => '头条',
		'finance' => '财经',
		'tech' => '科技',
		'military' => '军事',
		'ent' =>'娱乐',
		'sports' => '体育',
		'edu' => '教育',
		'nba' =>'NBA',
		'stock' =>'股票',
		'women' =>'女性',
		'health' =>'健康',
		'star' =>'星座',
		'baby' =>'育儿',
	];
	return $arr[$name];
}