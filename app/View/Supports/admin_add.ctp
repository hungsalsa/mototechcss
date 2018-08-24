<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Support Manager'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Support', array(
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->input('id');
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('name', array('required' => true));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Type of support') ?></th>
            <td>
                <?php echo $this->Form->input('type', array(
                    'options' => Configure::read('settings.support.type'),
                    'class' => 'selectbox_styled'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Nick name') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('nick_name', array('required' => true));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Active') ?></th>
            <td>
                <?php echo $this->Form->input('active', array('default' => true, 'class' => ''));
                ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>


<?php
echo $this->Form->end();
