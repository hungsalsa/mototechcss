var ProductIndex =
{
    changePrice: function() {
        var link = $('.changePrice');
        link.each(function() {
            $(this).click(function(e) {
                $(this).hide();
                $('.inputPriceList_'+$(this).data('id')).show();
                e.preventDefault();
            })
        });
        var submitButton = $('.savePriceBtn');
        submitButton.each(function() {
            $(this).click(function() {
                var box = $(this).parents('.boxInput');
                var url = box.data('url');
                var newValue = box.find('.inputValue').val();
                $.ajax({
                    url: url + '?newValue='+newValue,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        $('.changePrice_'+data.id).html(data.price).show();
                        box.hide();
                    }
                });
                return false;
            })
        })
    }
};
$(document).ready(function() {
    ProductIndex.changePrice();
});