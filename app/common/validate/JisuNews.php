<?php
 namespace app\common\validata;
 use think\Validate;

 class JisuNews extends Validate{
     protected $rule=[
        ['channel','require','文章类型key不能为空'],
        ['channel','require','文章类型名称不能为空'],
        ['title','require|max:50','文章标题不能为空|文章标题不能超过50个字符'],
        ['content','require','文章内容不能为空'],
     ];
 }