<?php
$this->Html->addCrumb(__('Blog'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Post', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->input('id');
echo $this->Form->hidden('user_id', array(
    'type' => 'hidden',
    'value' => AuthComponent::user('id')
));
?>
<table width="100%" id="id-form">
    <tr>
        <th valign="top"><?php echo __('Blog category') ?></th>
        <td>
            <?php echo $this->Form->input('blog_category_id', array(
                'class' => 'selectbox_styled',
                'empty' => __('--- Select blog category ---'),
            ));
            echo $this->Html->link(__('Add new %s', __('BlogCategory')), array(
                'controller' => 'blogCategories',
                'action' => 'add',
                '?' => array(
                    'add' => 'posts'
                )
            ), array(
                'class' => 'linkForm'
            ))
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
        <th valign="top"><?php echo __('Url') ?></th>
        <td>
            <?php echo $this->Form->input('slug', array(
                'required' => false,
                'placeholder' => __('auto generate when empty')
            ));
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
        <th valign="top"><?php echo __('Tin Ảnh trang chủ') ?></th>
        <td>
            <?php echo $this->Form->input('feature', array('default' => true, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Tin Hot') ?></th>
        <td>
            <?php echo $this->Form->input('hot', array('default' => true, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Hiện ở trang chủ nội dung nổi bật') ?></th>
        <td>
            <?php echo $this->Form->input('home', array('default' => true, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Dịch vụ miễn phí') ?></th>
        <td>
            <?php echo $this->Form->input('free', array('default' => false, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Những điều cần biết') ?></th>
        <td>
            <?php echo $this->Form->input('help', array('default' => false, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Image') ?></th>
        <td>
            <?php
            if (isset($this->request->data['Post']['id']) && $this->request->data['Post']['id']) {
                echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['Post']['image'], array(
                        'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                    )) . '<br>';
            }
            echo $this->Form->input('image', array('type' => 'file', 'class' => 'file_1'));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Content') ?></th>
        <td>
            <?php echo $this->Form->input('content', array('class' => 'ckeditor'));
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
        <th valign="top"><?php echo __('Key word') ?></th>
        <td>
            <?php echo $this->Form->input('keyword', array(
                'class' => 'form-textarea'
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
