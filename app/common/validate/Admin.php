<?php
/*
 * @Author: your name
 * @Date: 2020-11-09 15:59:14
 * @LastEditTime: 2020-11-09 16:25:13
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /news/app/common/validate/Admin.php
 */

namespace app\common\validate;
use think\Validate;

 class Admin extends Validate{
  protected $rule=[
    ['nickname', 'require|max:15','请输入用户昵称|用户昵称不能超过15个字符'],
    ['password', 'require|min:6|confirm:confirm', '请输入登录密码|登录密码不能小于6个字符|两次输入密码不同'],
    //['confirm', 'require|confirm:confirm','请输入确认密码|两次输入密码不同'],
    ['email', 'require|email|unique:admin','请输入邮箱|邮箱格式错误|邮箱已被注册']
  ];
  
  protected $scene=[
     'add' =>['nickname','password', 'confirm','email']
  ];
 }