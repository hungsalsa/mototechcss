<div class="select_section" align="center">
    <?php
    echo $this->Html->link($this->Html->image('../admin_files/images/forms/icon_plus.gif', array('width' => '21', 'height' => '21')).__('Add a new'), array(
        'action' => 'add',
    ), array(
        'class' => 'addNewOne',
        'escape' => false
    ));

    if (isset($search) && $search):
    ?>
    <a href="#" class="addNewOne confirmBtn"><?php echo __('Search products') ?></a>
    <?php
    endif;
    ?>
</div>
<?php
if (isset($search) && $search):
    echo $this->Form->create('Search', array(
        'url' => array(
            'controller' => 'products',
            'action' => 'index'
        ),
        'type' => 'get',
        'inputDefaults' => array(
            'class' => 'inp-form',
            'label' => false,
            'div' => false
        )
    ));
    echo $this->Form->hidden('type', array(
        'value' => 'searchForm'
    ))
?>
<div class="formSearch <?php if(!isset($searchForm)){echo 'hide';} ?>">
    <table>
        <tr>
            <td>
                <?php
                echo $this->Form->input('name', array(
                    'placeholder' => __('Name to search')
                ));
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->input('category', array(
                    'options' => $productCategories,
                    'empty' => __('Product Category'),
                    'class' => 'styledselect_form_1'
                ));
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->input('status', array(
                    'options' => Configure::read('settings.active'),
                    'empty' => __('Active'),
                    'class' => 'styledselect_form_1'
                ));
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->submit(__('Search'), array(
                    'class' => 'form-submit'
                ))
                ?>
            </td>

            <td>
                <?php
                echo $this->Html->link(__('Search'), array('action' => 'index'), array(
                    'class' => 'form-reset'
                ))
                ?>
            </td>
        </tr>
    </table>

</div>

<?php
echo $this->Form->end();
endif;