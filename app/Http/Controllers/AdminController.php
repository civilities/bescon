<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends FormController
{
    public function __construct()
    {
          $this->model = 'App\User';
          $this->fields_all = [
               'id' => [
                    'show' => '序号',
               ],
               'name' => [
                    'show' => '昵称',
                    'search' => "nickname like CONCAT('%', ?, '%')"
               ],
               'email' => [
                    'show' => '邮箱',
               ],
               'password' => [
                    'show' => '密码',
               ],
               'phone' => [
                    'show' => '电话',
               ],
               'created_at' => [
                    'show' => '创建时间',
               ],
               'updated_at' => [
                    'show' => '更新时间',
               ],
          ];

          $this->fields_show = ['id' ,'name', 'phone', 'email', 'created_at'];
          $this->fields_edit = ['name', 'phone'];
          $this->fields_create = ['name', 'phone', 'email', 'password'];
          parent::__construct();
    }

    /**
     * @return mixed
     */



}
