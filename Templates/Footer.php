</div> <!-- CONAINER FLUID -->
</div> <!-- CONTAINER -->
</div> <!-- m-auto text-center -->
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>


<script>
    $(document).on('click','.j_mx_s',function (){
        $('.mx').removeClass('d-none');
        $('.svr').addClass('d-none');

    });

    $(document).on('click','.j_end',function (){
        $('.mx , .svr').addClass('d-none');
    });

    $(document).on('click','.j_svr_s',function (){
        $('.svr').removeClass('d-none');
        $('.mx').addClass('d-none');

    });




</script>
</body>
</html>