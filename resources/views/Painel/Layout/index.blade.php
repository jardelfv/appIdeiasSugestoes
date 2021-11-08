<!DOCTYPE html>
<html lang="pt-br">

@includeIf('Painel.Layout.head')

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

            @includeIf('Painel.Layout.header')
            @includeIf('Painel.Layout.sidebar_lateral')

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                </section>

                @yield('content')

            </div>
            @includeIf('Painel.Layout.footer')

        </div>
        <!-- ./wrapper -->
        @includeIf('Painel.Layout.javascript')

        <script>
            $('#modal-danger').on('show.bs.modal', function (event){
                let button = $(event.relatedTarget); // dispara o modal
                let recipientId = button.data('id');
                console.log(recipientId);

                let modal = $(this);
                modal.find('#sugestao_id').val(recipientId);
            })
        </script>


    </body>

</html>
