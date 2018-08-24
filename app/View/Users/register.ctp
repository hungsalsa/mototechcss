<?php
echo $this->Html->script('jquery-1.11.0.min');
echo $this->Html->script('facebook');
echo $this->Form->create('User');
echo $this->Form->inputs(array(
    'name',
    'email',
    'first_name',
    'last_name',
    'new_password' => array(
        'type' => 'password'
    ),
    'password_confirm' => array(
        'type' => 'password'
    )
));
echo $this->Form->submit(__('Save'));
//echo $this->Facebook->login(array(
//    'custom' => true,
//    'label' => 'Login Facebook',
//    'redirect' => array('controller' => 'meetups', 'action' => 'index', 'admin' => true)
//));
//echo $this->Html->link(__('Login facebook'), $urlLoginFb);
echo $this->Form->end();