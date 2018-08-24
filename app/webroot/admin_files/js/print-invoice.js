var PrintInvoice = {
    init: function() {
        var printBtn = $('.printInvoice');
        printBtn.click(function() {
            $('.orderViewContent').printThis({
                printDelay: 100
            });
            $(window).scrollTop(0);
            return false;
        })
    }
};

$(document).ready(function() {
    PrintInvoice.init();
});