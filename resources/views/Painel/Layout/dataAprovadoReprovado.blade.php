@if ($sugestao->data_aprovacao == null)
    <i class="fa fa  fa-clock-o"></i>
@else
    {{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}

@endif
