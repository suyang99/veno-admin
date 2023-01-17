<?php
return [
    'labels' => [
        'User' => '用户',
        'user' => '用户',
    ],
    'fields' => [
        'parent_id' => '上级ID',
        'sales_id' => '销售人员ID',
        'username' => '用户名',
        'full_name' => '全名',
        'mobile' => '手机',
        'email' => '邮箱',
        'password' => '密码',
        'salt' => '加密随机数',
        'last_login' => '最后登录时间',
        'login_times' => '登录次数',
        'invitation_code' => '邀请码',
        'status' => '状态',///用户状态 0=永久封禁 1=正常 {timestamp}=禁用到期时间
    ],
    'options' => [
        'status' => [
            0 => '永久封禁',
            1 => '正常',
        ],
    ],
];
