<?php
/*
 * @Author: your name
 * @Date: 2020-10-09 11:03:31
 * @LastEditTime: 2020-10-13 17:30:09
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp/conf/database.php
 */
use think\Env;
return [
   // 数据库类型
        'type'            => 'mysql',
        // 数据库连接DSN配置
        'dsn'             => '',
        // 服务器地址
        'hostname'        => Env::get('database.hostname', '192.168.10.63'),
        // 数据库名
        'database'        =>Env::get('database.name','root'),
        // 数据库用户名
        'username'        => Env::get('database.username','root'),
        // 数据库密码
        'password'        => Env::get('database.password','1234'),
        // 数据库连接端口
        'hostport'        => '3306',
        // 数据库连接参数
        'params'          => [],
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
        // 数据库表前缀
        'prefix'          => '',
        // 数据库调试模式
        'debug'           => false,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'deploy'          => 0,
        // 数据库读写是否分离 主从式有效
        'rw_separate'     => false,
        // 读写分离后 主服务器数量
        'master_num'      => 1,
        // 指定从服务器序号
        'slave_no'        => '',
        // 是否严格检查字段是否存在
        'fields_strict'   => true,
        // 数据集返回类型
        'resultset_type'  => 'array',
        // 自动写入时间戳字段
        'auto_timestamp'  => true,
        // 时间字段取出后的默认时间格式
        'datetime_format' => 'Y-m-d H:i:s',
        // 是否需要进行SQL性能分析
        'sql_explain'     => false,
        // Builder类
        'builder'         => '',
        // Query类
        'query'           => '\\think\\db\\Query',
];