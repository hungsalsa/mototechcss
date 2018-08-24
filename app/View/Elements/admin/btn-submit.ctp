<tr>
    <td></td>
    <td>
        <?php
        echo $this->Form->submit(__('Save'), array(
            'class' => 'form-submit',
            'div' => false
        ));

        if ($this->request->query('add')) {
            echo $this->Html->link(__('Back'), array(
                'controller' => $this->request->query('add'),
                'action' => 'add'
            ), array(
                'class' => 'btn btn-back'
            ));
        }
        ?>
    </td>
</tr>