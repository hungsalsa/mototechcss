<?php
echo __('Hi %s,', $user['User']['email']);
echo '<br>';
echo __('Please click here to change password: %s', Router::url(array('controller' => 'users', 'action' => 'changePasswordToken', $token), true));
