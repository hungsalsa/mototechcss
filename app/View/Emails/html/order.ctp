Xin chào,
<br>
Bạn có một đơn đặt hàng mới từ website.<br>

<strong>Tên khách hàng:</strong> <?php echo $order['Order']['sex'] .' '.$order['Order']['name']; ?><br>
<strong>Số điện thoại:</strong> <?php echo $order['Order']['phone']; ?><br>
<strong>Email:</strong> <?php echo $order['Order']['email']; ?><br>
<strong>Địa chỉ:</strong> <?php echo $order['Order']['address']; ?><br>
<strong>Ghi chú:</strong> <?php echo $order['Order']['note']; ?><br>

<h4>Đơn hàng gồm</h4>
<?php
$cart = json_decode($order['Order']['cart']);
?>
<style>
    table tr th,
    table tr td {
        padding: 10px;
    }
</style>
<table border="1" style="border-spacing:0; border-collapse: collapse;">
    <tr>
        <th style="padding: 10px; background: #f1f1f1">Tên sản phẩm</th>
        <th style="padding: 10px; background: #f1f1f1">Số lượng</th>
        <th style="padding: 10px; background: #f1f1f1">Giá</th>
        <th style="padding: 10px; background: #f1f1f1">Thành tiền</th>
    </tr>
    <?php
    $items = $cart->items;
    foreach ($items as $item) {
        echo '<tr>';
        echo '<td style="padding: 10px"><a href="'.Router::url(array('action' => 'productIndex', 'slug' => $item->Product->slug), true).'">'.$item->Product->name.'</a></td>';
        echo '<td style="padding: 10px">'.$item->Product->quantityOrder.'</td>';
        echo '<td style="padding: 10px">'.$this->Number->currency($item->Product->price).'</td>';
        echo '<td style="padding: 10px">'.$this->Number->currency($item->Product->price*$item->Product->quantityOrder).'</td>';
        echo '</tr>';
    }
    ?>
</table>
<br>
<strong>Tổng đơn hàng: </strong> <?php echo $this->Number->currency($cart->total) ?>