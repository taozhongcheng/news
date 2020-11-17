<?php
/*
 * @Author: your name
 * @Date: 2020-11-04 09:49:22
 * @LastEditTime: 2020-11-05 10:37:24
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /thinkphp_news/conf/web/extra/header.php
 */

return [
    'push' =>  [ 'name' =>'推荐', 'key'=> 'push','icon'=>'icon-jian','style'=>'list'],
    'hot' =>  [ 'name' =>'头条', 'key'=> 'hot','icon'=>'icon-toutiaoyangshi','style'=>'select','length'=>6 ],
     'finance' => [ 'name'=> '财经', 'key'=> 'finance','icon'=>'icon-caijingzaokan','style'=>'list','length'=>5 ],
     'tech' => [ 'name'=> '科技',  'key'=> 'tech' ,'icon'=>'icon-juxing','style'=>'card','length'=>6],
     'military'=>[ 'name'=> '军事', 'key'=> 'military' ,'icon'=>'icon-junshi','style'=>'list','length'=>5],
     'ent' => [ 'name'=> '娱乐',  'key'=> 'ent' ,'icon'=>'icon-yule','style'=>'card','length'=>6],
    'sports' => [ 'name'=> '体育', 'key'=> 'sports' ,'icon'=>'icon-tiyu','style'=>'list','length'=>5],
     'edu' => [ 'name'=> '教育',  'key'=> 'edu' ,'icon'=>'icon-jiaoyu','style'=>'card','length'=>6],
     'nba' => [ 'name'=> 'NBA', 'key'=> 'nba','icon'=>'icon-nbatext' ,'style'=>'list','length'=>5],
     'stock' => [ 'name'=> '股票',  'key'=> 'stock','icon'=>'icon-gupiao' ,'style'=>'card','length'=>6],
     'women' => [ 'name'=> '女性',  'key'=> 'women','icon'=>'icon-nvxing1' ,'style'=>'list','length'=>5],
     'health' => [ 'name'=> '健康' , 'key'=> 'health','icon'=>'icon-jiankang' ,'style'=>'card','length'=>6],
     'star' => [ 'name'=> '星座',  'key'=> 'star','icon'=>'icon-xingzuo' ,'style'=>'list','length'=>5],
     'baby' => [ 'name'=> '育儿',  'key'=> 'baby','icon'=> 'icon-baobao' ,'style'=>'card','length'=>6]
];