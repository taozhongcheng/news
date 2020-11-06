<?php
/*
 * @Author: your name
 * @Date: 2020-10-10 11:31:17
 * @LastEditTime: 2020-10-12 10:10:07
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/conf/route.php
 */
return [
  '/' => 'web/index/index',
  '/push' =>'web/index/category',
  '/hot' =>'web/index/category',
  '/finance' =>'web/index/category',
  '/tech' =>'web/index/category',
  '/military' =>'web/index/category',
  '/ent' =>'web/index/category',
  '/sports' =>'web/index/category',
  '/edu' =>'web/index/category',
  '/nba' =>'web/index/category',
  '/stock' =>'web/index/category',
  '/women' =>'web/index/category',
  '/health' =>'web/index/category',
  '/star' =>'web/index/category',
  '/baby' =>'web/index/category',
  
  // 对应控制器下某个方法
  '/news/:type/:id' => 'web/index/news',
  
];