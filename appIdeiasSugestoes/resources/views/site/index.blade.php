@extends('site.master.layout')

@section('content')

<section class="passo-passo container pt-5 pb-5">
    <div class="card-deck">

        <div class="card card-shadow">
            <div class="icon text-center">
                <i class="fa  fa-file-text fa-7x " style="color:green"></i>
            </div>
            <!--
            <img class="card-img-top img-card" src="{{ asset('/img/icon1.png') }}" alt="Card image cap">
            -->
            <div class="card-body">
                <h5 class="card-title">1° Passo</h5>
                <p class="card-text">Cadastre-se no portal, para criar seu login de acesso.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Cadastre-se</small>
            </div>
        </div>

        <div class="card card-shadow">
            <div class="icon text-center">
                <i class="fa fa-desktop fa-7x " style="color:green"></i>
            </div>
            <!--
            <img class="card-img-top img-card" src="{{ asset('/') }}img/icon2.png" alt="Card image cap">
            -->
            <div class="card-body">
                <h5 class="card-title">2° Passo</h5>
                <p class="card-text">Registre sua ideia ou sugestão pelo formulário.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Registrar sugestão</small>
            </div>
        </div>

        <div class="card card-shadow">
            <div class="icon text-center">
                <i class="fa  fa-thumbs-up fa-7x " style="color:green"></i>
            </div>
            <!--
            <img class="card-img-top img-card" src="{{ asset('/') }}img/icon3.png" alt="Card image cap">
            -->
            <div class="card-body">
                <h5 class="card-title">3° Passo</h5>
                <p class="card-text">Aguarde a avaliação da sua ideia ou sugestão, receberá um e-mail de confirmação.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Aguarde avaliação</small>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="cadastro bg-light pt-5 pb-5">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-12 col-lg-7 align-self-center">
                    <!-- <img class="image-fluide" src="img/image1.png" alt=""> -->
                    <h3>Formulário de ideia ou sugestão</h3>
                    <p class="lead">
                        Preencha os dados do formulário e nos envie. Aguarde o e-mail de confirmação.
                    </p>

                    <form action="" class="row">
                        <div class="col-12 col-lg-8 pl-0">
                            <label for="formSugestao" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="formSugestao">
                            
                            <label for="formSugestao" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="formSugestao" aria-describedby="emailHelp">

                            <label for="formSugestao" class="form-label">Ideia ou Sugestão</label>
                            <textarea class="form-control" id="formSugestao">Texto aqui</textarea>
                            
                            <br>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 align-self-xs-center">
                    <h3>Registre sua ideia ou sugestão</h3>
                    <p class="lead">
                        Preencha os dados do formulário e nos envie. Aguarde o e-mail de confirmação.
                    </p>
                    <ul>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection