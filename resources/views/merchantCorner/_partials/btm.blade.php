
<!--Start Marcent Footer-->
<footer>
    <p>
        &COPY; ই-শপিংবিডি.কম  ২০১৬
    </p>
</footer>

<script>
    $(function(){
        $(".chosen-select").chosen();

        var url = window.location;
        $('.db_menu ul li a').removeClass('active');
        $('.db_menu ul li a[href="' + url + '"]').addClass('active');
    });

    $(".language-select").on('click',function(e){
        e.preventDefault();
        var langType = $(this).data("status");
        $.ajax({
            url: "{{URL::to('frontendLangChange')}}/"+langType,
            type: 'GET',
            dataType : 'json',
            success: function(data){
                if (data.success == true) {
                    location.reload();
                }
            }
        });
    });
</script>



<!--<div style="height: 300px;"></div>-->
<!-- Owl Carousel CSS-->
{!! HTML::script('public/merchantCorner/assets/js/owl.carousel.min.js') !!}
        <!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
{!! HTML::script('public/merchantCorner/assets/js/ie-opacity-polyfill.js') !!}
<![endif]-->
<!-- DataTables JS -->
{{ HTML::script('public/assets/js/optional/datatables/js/jquery.dataTables.min.js') }}
{{ HTML::script('public/assets/js/optional/datatables/js/dataTables.bootstrap.min.js') }}

<!-- DataTables JS -->

</body>
</html>