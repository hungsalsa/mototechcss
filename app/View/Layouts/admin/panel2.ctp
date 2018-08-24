<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('../admin_files/css/screen');
    echo $this->Html->css('../admin_files/css/pro_dropline_ie');
    echo $this->Html->css('../admin_files/css/datePicker');
    echo $this->Html->script('../admin_files/js/jquery/jquery-1.4.1.min');
    echo $this->Html->script('../admin_files/js/jquery/ui.core');
    echo $this->Html->script('../admin_files/js/jquery/ui.checkbox');
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

    echo $this->Html->script('../frontend/js/jquery.form.min.js');
    echo $this->Html->script('ckeditor/ckeditor.js');
    echo $this->Html->script('global');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

    <!-- Start: page-top -->
    <div id="page-top">

        <!-- start logo -->
        <div id="logo">
            <a href=""><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
        </div>
        <!-- end logo -->

        <!--  start top-search -->
        <div id="top-search">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
                    <td>

                        <select  class="styledselect">
                            <option value="">All</option>
                            <option value="">Products</option>
                            <option value="">Categories</option>
                            <option value="">Clients</option>
                            <option value="">News</option>
                        </select>

                    </td>
                    <td>
                        <input type="image" src="images/shared/top_search_btn.gif"  />
                    </td>
                </tr>
            </table>
        </div>
        <!--  end top-search -->
        <div class="clear"></div>

    </div>
    <!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
    <!--  start nav-outer -->
    <div class="nav-outer">

        <!-- start nav-right -->
        <div id="nav-right">

            <div class="nav-divider">&nbsp;</div>
            <div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
            <div class="nav-divider">&nbsp;</div>
            <a href="" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
            <div class="clear">&nbsp;</div>

            <!--  start account-content -->
            <div class="account-content">
                <div class="account-drop-inner">
                    <a href="" id="acc-settings">Settings</a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-details">Personal details </a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-project">Project details</a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-inbox">Inbox</a>
                    <div class="clear">&nbsp;</div>
                    <div class="acc-line">&nbsp;</div>
                    <a href="" id="acc-stats">Statistics</a>
                </div>
            </div>
            <!--  end account-content -->

        </div>
        <!-- end nav-right -->


        <!--  start nav -->
        <div class="nav">
            <div class="table">

                <ul class="select"><li><a href="#nogo"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="#nogo">Dashboard Details 1</a></li>
                                <li><a href="#nogo">Dashboard Details 2</a></li>
                                <li><a href="#nogo">Dashboard Details 3</a></li>
                            </ul>
                        </div>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="current"><li><a href="#nogo"><b>Products</b><!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <div class="select_sub show">
                            <ul class="sub">
                                <li><a href="#nogo">View all products</a></li>
                                <li class="sub_show"><a href="#nogo">Add product</a></li>
                                <li><a href="#nogo">Delete products</a></li>
                            </ul>
                        </div>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="#nogo"><b>Categories</b><!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="#nogo">Categories Details 1</a></li>
                                <li><a href="#nogo">Categories Details 2</a></li>
                                <li><a href="#nogo">Categories Details 3</a></li>
                            </ul>
                        </div>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="#nogo"><b>Clients</b><!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="#nogo">Clients Details 1</a></li>
                                <li><a href="#nogo">Clients Details 2</a></li>
                                <li><a href="#nogo">Clients Details 3</a></li>

                            </ul>
                        </div>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="#nogo"><b>News</b><!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="#nogo">News details 1</a></li>
                                <li><a href="#nogo">News details 2</a></li>
                                <li><a href="#nogo">News details 3</a></li>
                            </ul>
                        </div>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                </ul>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--  start nav -->

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


<div id="page-heading"><h1>Add product</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
<td id="tbl-border-left"></td>
<td>
<!--  start content-table-inner -->
<div id="content-table-inner">

<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr valign="top">
<td>


    <!--  start step-holder -->
    <div id="step-holder">
        <div class="step-no">1</div>
        <div class="step-dark-left"><a href="">Add product details</a></div>
        <div class="step-dark-right">&nbsp;</div>
        <div class="step-no-off">2</div>
        <div class="step-light-left">Select related products</div>
        <div class="step-light-right">&nbsp;</div>
        <div class="step-no-off">3</div>
        <div class="step-light-left">Preview</div>
        <div class="step-light-round">&nbsp;</div>
        <div class="clear"></div>
    </div>
    <!--  end step-holder -->

    <!-- start id-form -->
    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
            <th valign="top">Product name:</th>
            <td><input type="text" class="inp-form" /></td>
            <td></td>
        </tr>
        <tr>
            <th valign="top">Product name:</th>
            <td><input type="text" class="inp-form-error" /></td>
            <td>
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
            </td>
        </tr>
        <tr>
            <th valign="top">Category:</th>
            <td>
                <select  class="styledselect_form_1">
                    <option value="">All</option>
                    <option value="">Products</option>
                    <option value="">Categories</option>
                    <option value="">Clients</option>
                    <option value="">News</option>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <th valign="top">Sub Category:</th>
            <td>
                <select  class="styledselect_form_1">
                    <option value="">All</option>
                    <option value="">Products</option>
                    <option value="">Categories</option>
                    <option value="">Clients</option>
                    <option value="">News</option>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <th valign="top">Price:</th>
            <td><input type="text" class="inp-form" /></td>
            <td></td>
        </tr>
        <tr>
            <th valign="top">Select a date:</th>
            <td class="noheight">

                <table border="0" cellpadding="0" cellspacing="0">
                    <tr  valign="top">
                        <td>
                            <form id="chooseDateForm" action="#">

                                <select id="d" class="styledselect-day">
                                    <option value="">dd</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                        </td>
                        <td>
                            <select id="m" class="styledselect-month">
                                <option value="">mmm</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                        </td>
                        <td>
                            <select  id="y"  class="styledselect-year">
                                <option value="">yyyy</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                            </select>
                            </form>
                        </td>
                        <td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
                    </tr>
                </table>

            </td>
            <td></td>
        </tr>
        <tr>
            <th valign="top">Description:</th>
            <td><textarea rows="" cols="" class="form-textarea"></textarea></td>
            <td></td>
        </tr>
        <tr>
            <th>Image 1:</th>
            <td><input type="file" class="file_1" /></td>
            <td>
                <div class="bubble-left"></div>
                <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                <div class="bubble-right"></div>
            </td>
        </tr>
        <tr>
            <th>Image 2:</th>
            <td>  <input type="file" class="file_1" /></td>
            <td><div class="bubble-left"></div>
                <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                <div class="bubble-right"></div></td>
        </tr>
        <tr>
            <th>Image 3:</th>
            <td><input type="file" class="file_1" /></td>
            <td><div class="bubble-left"></div>
                <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                <div class="bubble-right"></div></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td valign="top">
                <input type="button" value="" class="form-submit" />
                <input type="reset" value="" class="form-reset"  />
            </td>
            <td></td>
        </tr>
    </table>
    <!-- end id-form  -->

</td>
<td>

    <!--  start related-activities -->
    <div id="related-activities">

        <!--  start related-act-top -->
        <div id="related-act-top">
            <img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
        </div>
        <!-- end related-act-top -->

        <!--  start related-act-bottom -->
        <div id="related-act-bottom">

            <!--  start related-act-inner -->
            <div id="related-act-inner">

                <div class="left"><a href=""><img src="images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                    <h5>Add another product</h5>
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing elitsed do eiusmod tempor.
                    <ul class="greyarrow">
                        <li><a href="">Click here to visit</a></li>
                        <li><a href="">Click here to visit</a> </li>
                    </ul>
                </div>

                <div class="clear"></div>
                <div class="lines-dotted-short"></div>

                <div class="left"><a href=""><img src="images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                    <h5>Delete products</h5>
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing elitsed do eiusmod tempor.
                    <ul class="greyarrow">
                        <li><a href="">Click here to visit</a></li>
                        <li><a href="">Click here to visit</a> </li>
                    </ul>
                </div>

                <div class="clear"></div>
                <div class="lines-dotted-short"></div>

                <div class="left"><a href=""><img src="images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                    <h5>Edit categories</h5>
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing elitsed do eiusmod tempor.
                    <ul class="greyarrow">
                        <li><a href="">Click here to visit</a></li>
                        <li><a href="">Click here to visit</a> </li>
                    </ul>
                </div>
                <div class="clear"></div>

            </div>
            <!-- end related-act-inner -->
            <div class="clear"></div>

        </div>
        <!-- end related-act-bottom -->

    </div>
    <!-- end related-activities -->

</td>
</tr>
<tr>
    <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
    <td></td>
</tr>
</table>

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

<!-- start footer -->
<div id="footer">
    <!--  start footer-left -->
    <div id="footer-left">
        Admin Skin &copy; Copyright Internet Dreams Ltd. <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>
    <!--  end footer-left -->
    <div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>