<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('AdminLTE/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>
<!-- Modal aprovar -->
<script>
    $('#modal-success').on('show.bs.modal', function (event){
        let button = $(event.relatedTarget); // dispara o modal
        let recipientId = button.data('id');
        console.log(recipientId);

        let modal = $(this);
        modal.find('#sugestao_id').val(recipientId);
    })
</script>

<!-- Modal reprovar -->
<script>
    $('#modal-reprovar').on('show.bs.modal', function (event){
        let button = $(event.relatedTarget); // dispara o modal
        let recipientId = button.data('id');
        console.log(recipientId);

        let modal = $(this);
        modal.find('#sugestao_id').val(recipientId);
    })
</script>

<!-- Modal deletar -->
<script>
    $('#modal-delete').on('show.bs.modal', function (event){
        let button = $(event.relatedTarget); // dispara o modal
        let recipientId = button.data('id');
        console.log(recipientId);

        let modal = $(this);
        modal.find('#sugestao_id').val(recipientId);
    })
</script>

<!-- Alerta de sucesso, ação para ocultar a div depois de 5 segundos -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        setTimeout(function() {
            $('#msg-success').fadeOut().empty();
        }, 4000);
    }, false);
</script>

<!-- Alerta de erro, ação para ocultar a div depois de 5 segundos -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        setTimeout(function() {
            $('#msg-erro').fadeOut().empty();
        }, 4000);
    }, false);
</script>
