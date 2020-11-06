<?php
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