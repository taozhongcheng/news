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
 
 // 后台页面
Route::rule('/admin/login','admin/login/login','get|post');
Route::rule('/admin/register','admin/login/register','get|post');
Route::rule('/admin/index','admin/index/index','get|post');

Route::rule('/admin/admin/list','admin/admin/list','get'); // 会员列表页面
Route::rule('/admin/admin/add','admin/admin/add','get'); // 添加会员页面
Route::rule('/admin/admin/edit/:id','admin/admin/edit','get'); // 修改会员页面

Route::rule('/admin/news/list', 'admin/news/list', 'get'); // 资讯列表页面
Route::rule('/admin/news/add', 'admin/news/add', 'get'); // 新增资讯页面
Route::rule('/admin/news/edit/:id', 'admin/news/edit', 'get'); // 修改资讯页面


Route::rule('/admin/articl/list','admin/articl/list','get');
Route::rule('/admin/articl/add','admin/articl/add','get|post');
Route::rule('/admin/articl/edit','admin/articl/edit','get|post');

Route::rule('/admin/cate/list','admin/cate/list','get');
Route::rule('/admin/cate/add','admin/cate/add','get|post');
Route::rule('/admin/cate/edit','admin/cate/edit','get|post');


// 前台页面
Route::rule('/','web/index/index','get');
Route::rule('/news/:type$','web/category/list','get');   //文章类型列表页面
Route::rule('/news/list','web/category/newsList','get');   //文章类型列表数据

// 前台api
Route::rule('/news/:type/:id$','web/news/detail','get'); // 文章详情
Route::rule('/news/detail/praise','web/news/detailPraise','get'); // 文章内容点赞，踩
Route::rule('/news/comment/praise','web/news/commentPraise','get');  // 评论点赞，踩

Route::rule('/news/comment/send','web/news/commentSend','post'); // 发表评论
Route::rule('/news/comment/list','web/news/commentList','get');// 文章评论列表


// 公共api
Route::rule('/web/admin/register','common/admin/register','post'); // 用户注册
Route::rule('/web/admin/edit','common/admin/edit','post'); // 用户编辑
Route::rule('/web/admin/register/code', 'common/admin/code', 'get'); // 用户注册发送验证码
Route::rule('/web/admin/login', 'common/admin/login', 'post'); // 用户登录
Route::rule('/web/admin/loginOut', 'common/admin/loginOut', 'get'); // 用户退出登录
Route::rule('/web/admin/freeze','common/admin/freeze','post'); // 冻结会员
Route::rule('/web/admin/list','common/admin/list','get'); // 会员列表
Route::rule('/web/admin/del','common/admin/del','get'); // 删除会员

Route::rule('/web/news/list', 'common/news/list', 'get'); // 资讯列表