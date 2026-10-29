@extends('layouts.installer')

@section('content')
    <!-- Title -->
    <div class="text-center text-white mb-4">
        <h2>Instalação do software FastDelivery</h2>
        <h6 class="fw-normal">Prossiga passo a passo com dados adequados de acordo com as instruções</h6>
    </div>

    <!-- Progress -->
    <div class="pb-2">
        <div class="progress cursor-pointer" role="progressbar" aria-label="Instalação do software FastDelivery"
             aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="Quarto passo!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 80%"></div>
        </div>
    </div>

    <!-- Card -->
    <div class="card mt-4 position-relative">
        <div class="d-flex justify-content-end mb-2 position-absolute top-end">
            <a href="#" class="d-flex align-items-center gap-1">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="Clique na seção para importar automaticamente o banco de dados">

                            <img src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/info.svg" alt=""
                                 class="svg">
                        </span>
            </a>
        </div>
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase">Passo 4. </h5>
                <h5 class="fw-normal">Importar banco de dados modelo</h5>
            </div>
            <p class="mb-5">
                Seu banco de dados foi conectado! Basta clicar na seção para importar automaticamente o banco de dados modelo
            </p>

            @if(session()->has('error'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            Seu banco de dados não está limpo, você deseja limpar o banco de dados e importar?
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('force-import-sql') }}" class="btn btn-danger px-sm-5" onclick="showLoder()">
                        Forçar importação do Banco de dados</a>
                </div>
            @else
                <div class="text-center">
                    <a href="{{ route('import_sql',['token'=>bcrypt('step_5')]) }}" class="btn btn-dark px-sm-5"
                       onclick="showLoder()">Clique aqui</a>
                </div>
            @endif


        </div>
    </div>

    <script type="text/javascript">
        function showLoder() {
            $('#loading').fadeIn();
        }
    </script>
@endsection

@section('scripts')

@endsection
