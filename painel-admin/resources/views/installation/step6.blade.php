@extends('layouts.installer')

@section('content')
    <!-- Title -->
    <div class="text-center text-white mb-4">
        <h2>Instalação do software FastDelivery</h2>
        <h6 class="fw-normal">Tudo feito, ótimo trabalho.Seu software está pronto para ser executado.</h6>
    </div>

    <!-- Card -->
    <div class="card mt-4">
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="p-4 rounded mb-4 text-center">
                <h5 class="fw-normal">Definir a seguinte configuração para executar o sistema corretamente</h5>

                <ul class="list-group mar-no mar-top bord-no">
                    <li class="list-group-item">Configuração de negócios</li>
                    <li class="list-group-item">Configuração de email</li>
                    <li class="list-group-item">Configuração do gateway de pagamento</li>
                    <li class="list-group-item">Configuração do gateway SMS</li>
                    <li class="list-group-item">APIs de terceiros</li>
                </ul>
            </div>

            <div class="text-center">
                <a href="{{ env('APP_URL') }}" target="_blank" class="btn btn-secondary px-sm-5">Página Inicial</a>
                @php
                $data = \App\Models\DataSetting::where('type', 'login_admin')->pluck('value')->first() ?? 'admin';
                @endphp
                <a href="{{ env('APP_URL') }}/login/{{$data}}" target="_blank" class="btn btn-dark px-sm-5">Painel de Administração</a>
            </div>
        </div>
    </div>
@endsection
