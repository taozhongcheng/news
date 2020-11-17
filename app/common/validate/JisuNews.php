<?php

namespace app\common\validate;

use think\Validate;

 class JisuNews extends Validate{
    protected $rule = [
        ['id', 'require', '文章id不能为空'],
        ['title', 'require|max:50', '文章标题不能为空|文章标题不能超过50个字符'],
        ['channel','require','文章类型名称不能为空'],
        ['content','require','文章内容不能为空'],
     ];

    protected $scene = [
        'edit' => ['id','title','channel','content']
     ];
 }