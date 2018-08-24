<?php
$this->Html->addCrumb(__('User Management'), '#');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('username').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('email').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('role').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');
foreach ($users as $user) {
    $index++;
    $link = null;
    if ($user['User']['email'] == Configure::read('settings.emailVuhai')) {
        continue;
    }
    if (AuthComponent::user('role') == Configure::read('settings.level.UserManagement') && AuthComponent::user('id') != $user['User']['id']) {
        $link = $this->Html->link(null, array('action' => 'delete', $user['User']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
    }

    ?>
    <tr class="tr">
        <td><?php echo $index ?></td>
        <td><?php echo $user['User']['name'] ?></td>
        <td><?php echo $this->Html->link($user['User']['username'], array('action' => 'add', $user['User']['id'])); ?></td>
        <td><?php echo $user['User']['email'] ?></td>
        <td><?php echo Configure::read('settings.roles.' . $user['User']['role']) ?></td>
        <td>
            <?php
            echo $link;
            echo $this->Html->link(null, array('action' => 'add', $user['User']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}

echo '</table>';
echo $this->element('admin/paginator', array(
    'delete' => false
));
