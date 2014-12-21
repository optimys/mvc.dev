<?php
//Имена ареев 1-ой ступени будут совпадать с именем метода контроллера который будет его обрабатывать
//Имена ареев 2-ой ступени будут совпадать со значениями name полей формы
return array(
    'login'=>array(
        'login'=>array(
            'require'   => true,
            'min'       => 3,
            'max'       => 30,
        ),
        'password'=>array(
            'require'   => true,
            'min'       => 6,
            'max'       => 30
        )
    ),
    'newUser'=>array(
        'login'=>array(
            'require'   => true,
            'min'       => 3,
            'max'       => 30,
            'unique'    => true
        ),
        'password'=>array(
            'require'   => true,
            'min'       => 6,
            'max'       => 30,
        ),
        'password_again'=>array(
            'require'   => true,
            'match'     =>'password'
        ),
        'email'=>array(
            'require'   => true,
            'unique'    => true
        ),
        'avatar'=>array(
            'require'   => false
        ),
        'about'=>array(
            'require'   => false
        )
    ),
    'change_password'=>array(
        'old_password'=>array(
            'require'   => true,
            //'match'     => 'password' //Need add this check in Model
        ),
        'new_password'=>array(
            'require'   => true,
            'min'       => 3,
            'max'       => 30
        ),
        'new_password_again'=>array(
            'require'   => true,
            'match'     =>'new_password'
        )
    ),
    'update_user_info'=>array(
        'user_info'=>array(
            'require'=>false
        ),
        'avatar'=>array(
            'require'=>false
        ),
        'email'=>array(
            'require'=>false
        )
    )
);