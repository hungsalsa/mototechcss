/**
 * Created by Haivu on 3/5/14.
 */

var Global =
{
    init: function() {
        this.confirmDelete();
        this.reloadCaptcha();
    },

    confirmDelete: function() {
        $('.DeleteItem').click(function() {
            if (!confirm('Are you sure?')) {
                return false;
            }
        })
    },

    reloadCaptcha: function() {
        $('.reloadCaptcha').click(function(e) {
            var $captcha = $(".imageCaptcha");
            $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
            e.preventDefault();
        });
    }
};

var CheckAll =
{
    init: function() {
        var checkAll = $('#checkAll');
        var rows = $('.checkRows');
        var deleteLink = $('.deleteSelectedLink');
        checkAll.change(function() {
            if ($(this).is(':checked')) {
                rows.prop('checked', true);
                if ($('.checkRows').length) {
                    deleteLink.removeClass('disableLink');
                    $('.tr').addClass('f1');
                }
            } else {
                deleteLink.addClass('disableLink');
                rows.prop('checked', false);
                $('.tr').removeClass('f1');
            }
        });

        rows.each(function() {
            $(this).click(function() {
                var selectAll = true;
                var disableLink = true;
                if ($(this).is(':checked')) {
                    $(this).parents('.tr').addClass('f1');
                    rows.each(function() {
                        if (!$(this).is(':checked')) {
                            selectAll = false;
                        } else {
                            disableLink = false;
                        }
                    })
                } else {
                    $(this).parents('.tr').removeClass('f1');
                    selectAll = false;
                    rows.each(function() {
                        if ($(this).is(':checked')) {
                            disableLink = false;
                        }
                    })
                }
                if (disableLink) {
                    deleteLink.addClass('disableLink');
                } else {
                    deleteLink.removeClass('disableLink');
                }
                checkAll.prop('checked', selectAll);
            })
        });
        this.deleteSelected();
    },

    deleteSelected: function() {
        var deleteLink = $('.deleteSelectedLink');
        var rows = $('.checkRows');

        deleteLink.click(function(e) {
            if (!confirm('Bạn có chắc chắn muốn xoá những mục đã chọn?')) {
                return false;
            }
            var data = new Object();
            rows.each(function(i) {
                if ($(this).is(':checked')) {
                    data[$(this).val()] = $(this).val();
                }
            });
            $.ajax({
                url: deleteLink.attr('href'),
                type: 'POST',
                data: data,
                dataType: 'JSON',
                beforeSend: function() {
                    $('.imgLoading').show();
                },
                success: function(data) {
                    deleteLink.addClass('disableLink');
                    $('.imgLoading').hide();
                    $('#checkAll').prop('checked', false);
                    $('#product-table .f1:not(".heading")').fadeOut(1000);
                }
            });
            e.preventDefault();
        })
    }
};

var OrderImage =
{
    init: function() {
        this.deleteImage();
        this.addImage();
        this.confirm();
    },

    deleteImage: function() {
        var deleteBtn = $('.deleteImage');
        deleteBtn.unbind('click').click(function(e) {
            $(this).parent().remove();
            e.preventDefault;
        })
    },

    addImage: function() {
        var addBtn = $('.addImage');
        addBtn.click(function(e) {
            var model = $(this).data('model');
            if (typeof model == 'undefined') {
                model = 'Image'
            }

            var productId = $(this).data('product-id');
            var numberInput = parseInt($('.imageItem').length) + 1;
            var nameInput = 'data[' +model+'][' + numberInput + '][image]';
            var imageItem =
                '<div class="imageItem">' +
                '<input type="file" required="required" class="itemJs file_1" name="' + nameInput + '">' +
                '<input type="hidden" name="data[Image][' + numberInput + '][product_id]" value="' + productId + '" id="Image' + numberInput + 'ProductId">' +
                '<a href="#" class="btn_small_green deleteImage">Xoá</a>' +
                '<div class="height10"></div></div>';
            $(this).parents('td').find('.input').append(imageItem);
            $('.itemJs').filestyle({
                image: baseUrl + "admin_files/images/forms/upload_file.gif",
                imageheight : 29,
                imagewidth : 78,
                width : 110
            });
            $('.file_1').removeClass('itemJs');
            OrderImage.deleteImage();
            e.preventDefault();
        })
    },

    confirm: function() {
        var nextBtn = $('.AddImage');
        nextBtn.click(function() {
            if (!$('.fileInput').val()) {
                $('#center').prepend('<h1 class="msgRed">Image is required</h1>');
                return false;
            }
            $('.msgRed').remove();
        });

        var prevBtn = $('.prevBtn');
        prevBtn.click(function() {
            $('.confirm').slideUp(function() {
                $('.tblImage').slideDown();
            });
        });

        var confirmBtn = $('.confirmBtn');
        confirmBtn.click(function() {
            var searchBox = $('.search-box');
            if (searchBox.is(':hidden')) {
                searchBox.slideDown();
            } else {
                searchBox.slideUp();
            }
        })
    }
};

var Image =
{
    init:function() {
        this.delete();
    },

    delete: function() {
        var deleteBtn = $('.deleteImageProduct');
        deleteBtn.each(function() {
            $(this).click(function() {
                if (!confirm('Bạn có chắc chắn muốn xoá?')) {
                    return false;
                }
                var currentImage = $(this);
                var url = $(this).attr('data-delete');
                $.ajax({
                    url: url,
                    dataType: 'JSON',
                    success: function(data) {
                        currentImage.remove();
                        if ($('.deleteImageProduct').length == 0) {
                            $('.productImages').remove();
                        }
                    }
                });
                return false;
            })
        })

    }
};

var Menu = {
    add: function() {
        var selectType = $('#MenuType');
        var selectDefault = $('.' + selectType.val());
        $(selectDefault).show();
        $(selectDefault).find('select').removeAttr('disabled');
        selectType.change(function() {
            $('.hide').hide();
            $('.hide').find('select').attr('disabled', 'disabled');
            var selectDefault = $('.' + selectType.val());
            $(selectDefault).find('select').removeAttr('disabled');
            $(selectDefault).show();
        })
    }
};

var ScrollTop =
{
    init: function() {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }
};

var Product =
{
    init: function() {
        this.searchProduct();
        this.priceInput();
    },

    searchProduct:function() {
        var searchBtn = $('.confirmBtn');
        searchBtn.click(function(e) {
            if ($('.formSearch').is(':hidden')) {
                $('.formSearch').slideDown();
            } else {
                $('.formSearch').slideUp();
            }
            e.preventDefault();
        })
    },

    priceInput: function() {
        var inputPrice = $('.numeric');
        inputPrice.each(function() {
            var input = $('.' + $(this).data('input'));
            $(this).keyup(function() {
                var value = $(this).autoNumeric('get');
                input.val(value);
            });

            if (input.val() != '0') {
                $(this).val(input.val());
            }

        });

        inputPrice.autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            aPad: false
        });
    }
};

var Banner =
{
    init: function() {
        var formUrl = $('.formUrlBanner');
        formUrl.each(function() {
            var currentForm = $(this);
            $(this).ajaxForm({
                type: 'POST',
                dataType: 'JSON',
                beforeSerialize: function() {
                    formUrl.removeClass('selected');
                    currentForm.addClass('selected');
                    $('.message-update', currentForm).html(null);
                },
                beforeSend: function() {
                    $('.loadingImage', currentForm).show();
                },
                success: function(data) {
                    console.log(data['status']);
                    if (data.status == 'success') {
                        $('.loadingImage', currentForm).hide();
                        $('.message-update', currentForm).html(currentForm.data('message'));
                    }
                }
            })
        })
    }
};

$(document).ready(function() {
    Global.init();
    OrderImage.init();
    Image.init();
    Menu.add();
    ScrollTop.init();
    Product.init();
    Banner.init();
    CheckAll.init();
});
