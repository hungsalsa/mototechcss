<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Page Manager'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Page', array(
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
            <th valign="top"><?php echo __('Type of Page') ?></th>
            <td>
                <?php echo $this->Form->input('type', array(
                    'options' => Configure::read('settings.page.type'),
                    'class' => 'selectbox_styled',
                    'empty' => __('--- Select page type ---'),
                    'required' => true
                ));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Slug') ?></th>
            <td>
                <?php echo $this->Form->input('slug', array('required' => false));
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
            <th valign="top"><?php echo __('Introduction') ?></th>
            <td>
                <?php echo $this->Form->input('introduction', array('class' => 'ckeditor'));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Description') ?></th>
            <td>
                <?php echo $this->Form->input('description', array(
                    'class' => 'form-textarea'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Keyword') ?></th>
            <td>
                <?php echo $this->Form->input('keyword', array(
                    'class' => 'form-textarea'
                ));
                ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>


    </table>


<?php
echo $this->Form->end();
