<?php
echo $this->Html->script('jquery-1.11.0.min');
echo $this->Html->script('global');

echo $this->Form->create('ForgotPassword');
echo $this->Form->input('email', array(
    'type' => 'text',
    'required' => false
));
echo $this->Html->image($this->Html->url(array('action'=>'generateCaptcha'), true),array(
    'class' => 'imageCaptcha',
));
echo $this->Form->input('captcha',array('autocomplete'=>'off','label'=>false,'class'=>''));
echo $this->Html->link(__('Reload captcha'), '#', array(
    'class' => 'reloadCaptcha'
));
echo $this->Form->submit(__('Send'));
echo $this->Form->end();