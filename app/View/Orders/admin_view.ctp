<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Orders'), array('action' => 'index'));
$this->Html->addCrumb(__('View order'), '#');
echo $this->Html->css('../admin_files/css/invoice', array('inline' => true));
echo $this->Html->script('../admin_files/js/jquery.print', array('inline' => true));
echo $this->Html->script('../admin_files/js/print-invoice', array('inline' => true));
?>

<div class="orderViewContent" style="color: #000">
    <div class="header">
        <h1><?php echo $company['Company']['name']; ?></h1>
        <p><strong><?php echo __('Địa chỉ') ?>: </strong> <?php echo $company['Company']['address']; ?></p>
        <p><strong><?php echo __('Phone') ?>: </strong> <?php echo $company['Company']['phone']; ?></p>
        <p><strong><?php echo __('Email') ?>: </strong> <?php echo $company['Company']['email']; ?></p>
    </div>
    <hr>
    <div class="orderContent">
        <div class="heading">
            <h1><?php echo __('Đơn đặt hàng') ?></h1>
            <p class="date"><?php echo __('<strong>Ngày tạo</strong>: %s', $this->Time->format($order['Order']['created'], '%d-%m-%Y')) ?></p>
        </div>
        <div class="billing">
            <p><?php echo __('<strong>Khách hàng</strong>: %s', $order['Order']['sex'] . ' ' .$order['Order']['name']) ?></p>
            <p><?php echo __('<strong>Email</strong>: %s', $order['Order']['email']) ?></p>
            <p><?php echo __('<strong>Điện thoại</strong>: %s', $order['Order']['phone']) ?></p>
            <p><?php echo __('<strong>Địa chỉ</strong>: %s', $order['Order']['address']) ?></p>
            <p><?php echo __('<strong>Ghi chú</strong>: %s', $order['Order']['note']) ?></p>
        </div>
        <table>
            <tr>
                <th><?php echo __('STT') ?></th>
                <th><?php echo __('Tên sản phẩm') ?></th>
                <th><?php echo __('Số lượng') ?></th>
                <th><?php echo __('Đơn giá') ?></th>
                <th><?php echo __('Thành tiền') ?></th>
            </tr>
            <?php
            $cart = json_decode($order['Order']['cart'], true);
            $index = 1;
            foreach ($cart['items'] as $item) {
                echo '<tr>';
                echo '<td align="center">'.$index.'</td>';
                echo '<td>'.$item['Product']['name'].'</td>';
                echo '<td align="center">'.$item['Product']['quantityOrder'].'</td>';
                echo '<td align="right">'.$this->Number->currency($item['Product']['price']).'</td>';
                echo '<td align="right">'.$this->Number->currency($item['Product']['quantityOrder']*$item['Product']['price']).'</td>';
                echo '</tr>';
                $index++;
            }
            ?>
            <tr>
                <td align="right" colspan="4"><strong><?php echo __('Tổng') ?></strong></td>
                <td align="right"><strong><?php echo $this->Number->currency($cart['total']) ?></strong></td>
            </tr>
        </table>
        <div class="sign">
            <p><?php echo __('..... Ngày ..... Tháng ..... Năm .....') ?></p>
            <h4><?php echo __('Người lập') ?></h4>
        </div>
    </div>
</div>

<div class="printBox">
    <?php
    echo $this->Html->link(__('In hoá đơn'), '#', array(
        'class' => 'addNewOne printInvoice'
    ));
    echo $this->Html->link(__('Quay lại'), array('action' => 'index'), array(
        'class' => 'addNewOne back'
    ))
    ?>
</div>