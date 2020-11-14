<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Login extends Base
{

    public function login()
    {

        return  $this->fetch('/login/login');
    }

    public function register()
    {
        return $this->fetch('/login/register');
    }
}
