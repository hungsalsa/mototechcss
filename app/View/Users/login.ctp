<div id="login-holder" style="padding-top: 150px">
    <!--  start loginbox ................................................................................. -->
    <div id="loginbox">
        <?php 
        echo $this->Session->flash();
        ?>
        <!--  start login-inner -->
        <div id="login-inner">
            <?php
            echo $this->Form->create('User', array(
                'autocomplete'=> "off",
                'inputDefaults' => array(
                    'required' => true,
                    'div' => false,
                    'class' => 'login-inp',
                    'label' => false,
                )
            ));
            ?>
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo __('Username') ?></th>
                    <td><?php echo $this->Form->input('username', array(
                            'placeholder' => __('User name'),
                            'autofocus'
                        )); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Password') ?></th>
                    <td><?php echo $this->Form->input('password', array(
                            'placeholder' => __('Password')
                        )); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td><?php echo $this->Form->submit(__('Login'), array(
                            'class' => 'submit-login'
                        )); ?></td>
                </tr>
            </table>
            <?php
            echo $this->Form->end();
            ?>
        </div>
    </div>
    <!--  end loginbox -->

</div>