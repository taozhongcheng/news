<?php
use think\Route;
/*
 * @Author: your name
 * @Date: 2020-10-10 11:31:17
 * @LastEditTime: 2020-11-09 12:26:23
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/conf/route.php
 */

Route::rule('/','web/index/index','get');
Route::rule('/news/:type$','web/category/list','get');   //文章类型列表页面
Route::rule('/news/list','web/category/newsList','get');   //文章类型列表数据

Route::rule('/news/:type/:id$','web/news/detail','get'); // 文章详情
Route::rule('/news/detail/praise','web/news/detailPraise','get'); // 文章内容点赞，踩
Route::rule('/news/comment/praise','web/news/commentPraise','get');  // 评论点赞，踩

Route::rule('/news/comment/send','web/news/commentSend','post'); // 发表评论
Route::rule('/news/comment/list','web/news/commentList','get');// 文章评论列表


Route::rule('/admin/register','common/admin/register','post'); // 用户注册
Route::rule('/admin/register/code', 'common/admin/code', 'get'); // 用户注册发送验证码