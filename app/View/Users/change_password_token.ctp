<?php
echo $this->Form->create('User');
echo $this->Form->input('new_password', array(
    'type' => 'password'
));
echo $this->Form->input('password_confirm', array(
    'type' => 'password'
));
echo $this->Form->hidden('token', array(
    'value' => $token
));
echo $this->Form->hidden('id', array(
    'value' => $user['User']['id']
));
echo $this->Form->submit(__('Save'));
echo $this->Form->end();