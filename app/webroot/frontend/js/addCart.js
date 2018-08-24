var AddCart =
{
    addCart:function() {
        var linkToCart = $('.linkToCart');
        linkToCart.tooltip();
        $('#ProductProductIndexForm').ajaxForm({
            beforeSerialize: function() {
                linkToCart.tooltip('hide');
                $("html, body").animate({
                    scrollTop: 0
                });
            },
            dataType: 'JSON',
            success: function(data) {
                $('.big-image').effect(
                    'transfer', {
                        'to': $('.linkToCart .numberItems')
                    },
                    1000
                );
                //$('.numberItems').html(data.cartItem);
            }
        });
        $('.addCartBtn').click(function() {
            $('#ProductProductIndexForm').submit();
        })
    },

    updateCart:function() {
        var updateBtn = $('.updateCartBtn');
        $('#ShoppingCartShoppingCartForm').ajaxForm({
            dataType: 'HTML',
            beforeSerialize: function() {
                updateBtn.button('loading');
            },
            success:function(data) {
                updateBtn.button('reset');
            }
        });
        updateBtn.click(function(e) {
            $('#ShoppingCartShoppingCartForm').submit();
            e.preventDefault;
        })
    }
};

$(document).ready(function() {
    AddCart.addCart();
    //AddCart.updateCart();
});