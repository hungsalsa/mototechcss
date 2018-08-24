<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo __($title_for_layout); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <?php
    echo $this->Html->meta('icon', 'admin_files/images/favicon.png');

    echo $this->Html->css('../admin_files/css/screen');
    echo $this->Html->css('../admin_files/css/pro_dropline_ie');
    //echo $this->Html->css('../admin_files/css/datePicker');
    echo $this->Html->script('jquery-1.11.0.min');
    echo $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js');
    echo $this->Html->script('https://code.jquery.com/jquery-migrate-1.2.1.js');
    echo $this->Html->script('../frontend/js/jquery.form.min.js');

    echo $this->Html->script('../admin_files/js/jquery/ui.core');
    echo $this->Html->script('../admin_files/js/jquery/jquery.bind');
    echo $this->Html->script('../admin_files/js/jquery/jquery.selectbox-0.5');
    echo $this->Html->script('../admin_files/js/jquery/jquery.selectbox-0.5_style_2');
    echo $this->Html->script('../admin_files/js/jquery/jquery.filestyle');
    echo $this->Html->script('../admin_files/js/jquery/custom_jquery');
    echo $this->Html->script('../admin_files/js/jquery/jquery.tooltip');
    echo $this->Html->script('../admin_files/js/jquery/jquery.dimensions');
    echo $this->Html->script('../admin_files/js/jquery/date');
    echo $this->Html->script('../admin_files/js/jquery/jquery.datePicker');
    echo $this->Html->script('../admin_files/js/jquery/jquery.pngFix.pack');
    echo $this->Html->script('../admin_files/js/global');
?>

</head>
<body>
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
    <!--  start nav-outer -->
    <div class="nav-outer">

        <!-- start nav-right -->
        <div id="nav-right">

            <div class="nav-divider">&nbsp;</div>
            <div class="showhide-account">
                <?php
                echo $this->Html->link(__('Hi %s', AuthComponent::user('name')), '#', array(
                    'id' => 'acc-details'
                ));
                ?>
            </div>
            <div class="nav-divider">&nbsp;</div>
            <?php
            echo $this->Html->link($this->Html->image('../admin_files/images/shared/nav/nav_logout.gif', array('width' => '64', 'height' => '14')), array(
                'controller' => 'users',
                'action' => 'logout',
                'admin' => false
            ), array(
                'id' => 'logout',
                'escape' => false
            ))
            ?>
            <div class="clear">&nbsp;</div>

            <!--  start account-content -->
            <div class="account-content">
                <div class="account-drop-inner">
                    <?php
                    echo $this->Html->link(__('My profile'), array(
                        'controller' => 'users',
                        'action' => 'profile'
                    ), array(
                        'id' => 'acc-project'
                    ))
                    ?>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <?php
                    echo $this->Html->link(__('Change password'), array(
                        'controller' => 'users',
                        'action' => 'changePassword'
                    ), array(
                        'id' => 'acc-settings'
                    ))
                    ?>

                </div>
            </div>
            <!--  end account-content -->

        </div>
        <!-- end nav-right -->


        <?php
        echo $this->Element('admin/menu');
        ?>

    </div>
    <div class="clear"></div>
    <!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading">
    <?php
    echo $this->Html->getCrumbs(
        null,
        false
    );
    ?>
</div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized">
        <?php
        echo $this->Html->image('../admin_files/images/shared/side_shadowleft.jpg', array('width' => '20', 'height' => '300'));
        ?>
    </th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized">
        <?php
        echo $this->Html->image('../admin_files/images/shared/side_shadowright.jpg', array('width' => '20', 'height' => '300'));
        ?>
    </th>
</tr>
<tr>
<td id="tbl-border-left"></td>
<td valign="top">
<!--  start content-table-inner -->
<div id="content-table-inner">

    <?php
    echo $this->Session->flash();
    echo $this->fetch('content');
    ?>

<div class="clear"></div>


</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
</tr>
</table>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->



<div class="clear">&nbsp;</div>
<script type="text/javascript">
    var baseUrl = '<?php echo $this->html->url('/', true) ?>';
</script>
<?php
echo $this->Html->script('ckeditor/ckeditor.js');
    echo $this->Html->script('autoNumeric');
    echo $this->Html->script('global');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

</body>
</html>