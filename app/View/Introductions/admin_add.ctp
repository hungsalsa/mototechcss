<?php
$this->Html->addCrumb(__('Company information'), array('controller' => 'company', 'action' => 'index'));
$this->Html->addCrumb(__('Các bài giới thiệu'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Introduction', array(
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
            <th valign="top"><?php echo __('Image') ?></th>
            <td>
                <?php
                if (isset($this->request->data['Introduction']['id']) && $this->request->data['Introduction']['id']) {
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['Introduction']['image'], array(
                            'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                        )) . '<br>';
                }
                echo $this->Form->input('image', array('type' => 'file', 'class' => 'file_1'));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('name', array('required' => true));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Nội dung') ?></th>
            <td>
                <?php echo $this->Form->input('description', array('class' => 'ckeditor'));
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
        <tr>
            <th valign="top"><?php echo __('Vị trí hiển thị') ?></th>
            <td>
                <?php echo $this->Form->input('position', array(
                    'options' => Configure::read('settings.introduction.position'),
                    'empty' => __('-- Lựa chọn vị trí --'),
                    'class' => 'selectbox_styled'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Order') ?></th>
            <td>
                <?php echo $this->Form->input('order');
                ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>


<?php
echo $this->Form->end();
