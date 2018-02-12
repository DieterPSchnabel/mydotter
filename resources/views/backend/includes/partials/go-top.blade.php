
<script>
$(document).ready(function(){
    $('body').append('<div class="round8 animated zoomIn" id="toTopImg" style="display:none"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#toTopImg').fadeIn([500]);
        } else {
            $('#toTopImg').fadeOut([500]);
        }
    });
    $('#toTopImg').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
});
</script>
