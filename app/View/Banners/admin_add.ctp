<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Banners Manager'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Banner', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->input('id');
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('Image') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php
                if (isset($this->request->data['Banner']['id']) && $this->request->data['Banner']['id']) {
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['Banner']['image'], array(
                            'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                        )) . '<br>';
                }
                echo $this->Form->input('image', array(
                    'type' => 'file',
                    'class' => 'file_1'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Url') ?></th>
            <td>
                <?php echo $this->Form->input('url');
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
