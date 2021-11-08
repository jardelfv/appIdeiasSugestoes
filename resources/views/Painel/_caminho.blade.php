<div class="row">
    <div class="ml-auto col-12 d-flex text-right">
        <ol class="breadcrumb">
            @if(isset($caminhos))
                <i class="fa fa-dashboard"></i>
                @foreach($caminhos as $caminho)
                    @if($caminho['url'])
                        <li class="active"><a href="{{$caminho['url']}}">{{$caminho['titulo']}}</a></li>
                    @else
                        <li class="active">{{$caminho['titulo']}}</li>
                    @endif

                @endforeach
            @else
                <i class="fa fa-dashboard"></i><li class="active">Painel</li>>
            @endif

        </ol>
    </div>
</div>