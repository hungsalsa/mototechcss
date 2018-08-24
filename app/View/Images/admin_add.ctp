<?php
$this->Html->addCrumb(__('Product'), array('controller' => 'products', 'action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Image', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'div' => false,
        'class' => 'inp-form'
    )
));
?>
<div class="tblImage">
    <table width="100%" id="id-form">
        <tbody>
        <?php
        if ($productImages):
        ?>
        <tr class="productImages">
            <th valign="top"> Ảnh của sản phẩm: </th>
            <td>
                <?php
                foreach ($productImages as $image) {
                    echo '<span class="deleteImageProduct" data-delete="' . Router::url(array('action' => 'delete', $image['Image']['id']), true) . '">';
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $image['Image']['image'], array('title' => __('Click to delete'), 'class' => 'imageProducts'));
                    echo '</span>';
                }
                ?>
                <br>
                <p style="clear: both;padding-top: 5px"><i><?php echo __('Click image to delete'); ?></i></p>
            </td>
        </tr>
            <?php
            endif;
            ?>
        <tr>
            <th valign="top"> <?php echo __('Add images') ?> </th>
            <td>
                <?php
                echo '<div class="input">';
                for($i = 0; $i < Configure::read('settings.numberImages'); $i++) {
                    echo '<div class="imageItem">';
                    echo $this->Form->file('Image.' . $i .'.image', array('class' => 'file_1', 'required' => true));
                    echo $this->Form->hidden('Image.' . $i . '.product_id', array('default' => $product_id));
                    if ($i > 0) {
                        echo '<a href="#" class="deleteImage">' . __('Delete') . '</a>';
                    }
                    echo '<div class="height10"></div></div>';
                }
                echo '</div>';
                ?>

            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <?php
                echo ' <a href="#" data-product-id="' . $product_id . '" type="submit" class="addNewOne addImage">' . __('Add an image') . '</a>';
                echo $this->Form->submit(__('Add'), array(
                    'class' => 'form-submit',
                    'div' => false
                ));

                ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php
echo $this->Form->end();
?>