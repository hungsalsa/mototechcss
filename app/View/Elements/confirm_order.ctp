<table width="100%" class="tblForm">
    <tbody><tr>
        <th width="30%"><?php echo __('Buy brand name'); ?></th>
        <td><?php echo $order['Order']['brand_name'] ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Buy date  time'); ?></th>
        <td><?php echo $order['Order']['buy_time']['year'] . '年' . $order['Order']['buy_time']['month'] . '月' . $order['Order']['buy_time']['day'] . '日' ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Customer  name'); ?> </th>
        <td><?php echo $order['Order']['name']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Customer  name (kana)'); ?> </th>
        <td><?php echo $order['Order']['name_kana']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Novelty want'); ?></th>
        <td><?php echo $order['Order']['novelty']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Nhận sản phẩm'); ?></th>
        <td><?php echo Configure::read('settings.order.received.' . $order['Order']['received']); ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Thời gian dự kiến  đến shop'); ?></th>
        <td><?php echo $order['Order']['receive_time']['year'] . '年' . $order['Order']['receive_time']['month'] . '月' . $order['Order']['receive_time']['day'] . '日' ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Phone number'); ?> </th>
        <td><?php echo $order['Order']['phone']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Postcode'); ?> </th>
        <td><?php echo $order['Order']['post_code']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Prefecture'); ?> </th>
        <td><?php echo $cities[$order['Order']['prefecture']]; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('City'); ?></th>
        <td><?php echo $cities[$order['Order']['city']]; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Town / building'); ?> </th>
        <td><?php echo $order['Order']['town']; ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Note'); ?> </th>
        <td><?php echo $order['Order']['note']; ?></td>
    </tr>
    </tbody></table>