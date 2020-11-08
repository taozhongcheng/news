<?php
    namespace app\common\validate;
    use think\Validate;

class Comment extends Validate{
    protected $rule=[
        ['content','require|max:400','评论内容不能为空|评论内容不能超过400字符'],
        ['topic_id','require','文章ID不能为空'],
        ['user_id','require','评论者ID不能为空'],
        ['user_name','require','评论者昵称不能为空'],
    ];

   protected $scene = [
        "add" => ['content','topic_id','user_id','user_name'],
   ];
}