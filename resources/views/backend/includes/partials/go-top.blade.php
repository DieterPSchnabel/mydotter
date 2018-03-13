<style>
    #toTopImg {
        position: fixed;
        bottom: 40px;
        right: 18px;
        cursor: pointer;
        display: none;
        z-index: 999999;
        background: #666;
        display: block;
        padding: 12px 15px;
        opacity: 0.2;
        color: #ddd;
    }

    #toTopImg:hover {
        opacity: 0.8;
        background: #20A8D8;
        color: #fff;
        transition: all 1.8s ease-in-out;
    }

    #toBottImg {
        position: fixed;
        bottom: 40px;
        right: 18px;
        cursor: pointer;
        display: display;
        z-index: 999999;
        background: #666;
        display: block;
        padding: 12px 15px;
        opacity: 0.2;
        color: #ddd;
    }

    #toBottImg:hover {
        opacity: 0.8;
        background: #20A8D8;
        color: #fff;
        transition: all 1.8s ease-in-out;
    }
</style>

<script>
$(document).ready(function(){
    $('body').append('<div class="round8 animated zoomIn" id="toBottImg" style="display:display"><i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i></div>');

    $('body').append('<div class="round8 animated zoomIn" id="toTopImg" style="display:none"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></div>');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            /*$('#toBottImg').fadeOut([10]);
            $('#toTopImg').fadeIn([800]);*/
            $('#toBottImg').hide();
            $('#toTopImg').show();
        } else {
            /*$('#toTopImg').fadeOut([10]);
            $('#toBottImg').fadeIn([800]);*/
            $('#toTopImg').hide();
            $('#toBottImg').show();

        }
    });
    $('#toTopImg').click(function(){
        $("html, body").animate({scrollTop: 0}, 1200);
        return false;
    });
    $('#toBottImg').click(function () {
        $('html, body').animate({
            scrollTop: $("#page_bott").offset().top
        }, 1200);
        return false;
    });
});
</script>
