<?php
/*
 * @Author: your name
 * @Date: 2020-09-27 18:25:02
 * @LastEditTime: 2020-11-09 12:38:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/conf/config.php
 */
// 读取 app_status 值文件配置
use think\Env;
return [
   'version' => time(),
   'app_status' => Env::get('status','pro'),
   // 开启路由
   'url_route_on' => true,
   // 必须对应路由
   'url_route_must' => true,
  //   // 路由使用完整匹配
  //   'route_complete_match'   => false,
   // 全局字符串替换
 //  'url_html_suffix' => 'html',
   'view_replace_str' =>[
     '__COCO__' => '我是替换coco啊'
   ],
  'session'                => [
    'id'             => '',
    // SESSION_ID的提交变量,解决flash上传跨域
    'var_session_id' => '',
    // SESSION 前缀
    'prefix'         => 'think',
    // 驱动方式 支持redis memcache memcached
    'type'           => '',
    // 是否自动开启 SESSION
    'auto_start'     => true,
   // 'httponly'       => true,
   // 'secure'         => true,
  ],
  // 禁止访问模块
  'deny_module_list' => [],
  'app_debug' => true,
  //抛出 HTTP 异常
  'http_exception_template' => [
    404 => APP_PATH . '404.html',
    401 => APP_PATH . '401.html',
  ]
];
