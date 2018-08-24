<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Menu Manager'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Menu', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form',
        'div' => false,
    )
));
echo $this->Form->hidden('id');
?>
    <table width="100%" id="id-form">

        <tr>
            <th valign="top"><?php echo __('Type') ?> <span class="redtext"> （※）</span></th>
            <td><?php
                $types = Configure::read('settings.menu.type');
                echo $this->Form->input('type', array(
                    'options' => $types,
                    'class' => 'selectbox_styled',
                ));
                ?>
            </td>
        </tr>
        <tr class="hide Page">
            <?php
            $value = null;
            if ($this->request->data) {
                $value = $this->request->data['Menu']['child'];
            }
            ?>
            <th valign="top"><?php echo __('Page') ?></th>
            <td>
                <div class="input select">
                    <?php
                    echo $this->Form->input('Page', array(
                        'value' => $value,
                        'disabled' => 'disabled',
                        'class' => 'selectbox_styled',
                        'empty' => __('--- Select page ---'),
                        'required' => true,
                    ));

                    ?>
                </div>
                <?php
                echo $this->Html->link(__('Add new %s', __('Page')), array(
                    'controller' => 'pages',
                    'action' => 'add',
                    '?' => array(
                        'add' => 'menus'
                    )
                ), array(
                    'class' => 'linkForm'
                ))
                ?>

            </td>
        </tr>
        <tr class="hide BlogCategory">
            <th valign="top"><?php echo __('Blog Category') ?></th>
            <td>
                <div class="input select">
                    <?php echo $this->Form->input('BlogCategory', array(
                        'value' => $value,
                        'disabled' => 'disabled',
                        'class' => 'selectbox_styled',
                        'empty' => __('--- Select blog category ---'),
                        'required' => true,
                    )); ?>
                </div>
                <?php
                echo $this->Html->link(__('Add new %s', __('BlogCategory')), array(
                    'controller' => 'blogCategories',
                    'action' => 'add',
                    '?' => array(
                        'add' => 'menus'
                    )
                ), array(
                    'class' => 'linkForm'
                ))
                ?>
            </td>
        </tr>
        <tr class="hide Menu">
            <th valign="top"><?php echo __('Product Category') ?></th>
            <td>
                <div class="input select">
                    <?php echo $this->Form->input('Menu', array(
                        'value' => $value,
                        'empty' => array(
                            Configure::read('settings.menu.allProduct') => __('All Products')
                        ),
                        'disabled' => 'disabled',
                        'default' => __('All Products'),
                        'class' => 'selectbox_styled'
                    )); ?>
                </div>
                <?php
                echo $this->Html->link(__('Add new %s', __('Menu')), array(
                    'controller' => 'productCategories',
                    'action' => 'add',
                    '?' => array(
                        'add' => 'menus'
                    )
                ), array(
                    'class' => 'linkForm'
                ))
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
            <td><?php echo $this->Form->input('name', array('required' => true)); ?></td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Image') ?></th>
            <td>
                <?php
                if (isset($this->request->data['Menu']['id']) && $this->request->data['Menu']['id']) {
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['Menu']['image'], array(
                            'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                        )) . '<br>';
                }
                echo $this->Form->input('image', array('type' => 'file', 'class' => 'file_1'));
                ?>
            </td>
        </tr>

        <tr>
            <th valign="top"><?php echo __('Parent') ?> </th>
            <td><?php echo $this->Form->input('parent_id', array(
                    'empty' => '-- Root --',
                    'class' => 'selectbox_styled'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Introduction') ?> </th>
            <td><?php echo $this->Form->input('introduction', array(
                    'class' => 'form-textarea'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Active') ?></th>
            <td><?php echo $this->Form->input('active', array(
                    'class' => '',
                    'default' => true
                )); ?> <span class="greytext"><?php echo __('Status of menu') ?></span>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Order') ?> </th>
            <td><?php echo $this->Form->input('order', array('default' => 0)); ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>
<?php

echo $this->Form->end();