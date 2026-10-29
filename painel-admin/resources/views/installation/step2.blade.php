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
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="Segundo passo!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 40%"></div>
        </div>
    </div>

    <!-- Card -->
    <div class="card mt-4">
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex justify-content-end mb-2">
                <a href="https://agorapronto.com/"
                   class="d-flex align-items-center gap-1" target="_blank">
                    Onde obter essas informações?
                    <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                          data-bs-title="Informações de compra">
                                <img src="{{asset('public/assets/installation')}}/assets/img/svg-icons/info.svg" alt=""
                                     class="svg">
                            </span>
                </a>
            </div>

            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase">Passo 2. </h5>
                <h5 class="fw-normal">Atualizar informações de compra</h5>
            </div>
            <p class="mb-4">Forneça o seu <strong>email da AgoraPronto</strong> e o número do Pedido </p>

            <form method="POST" action="{{ route('purchase.code',['token'=>bcrypt('step_3')]) }}">
                @csrf
                <div class="bg-light p-4 rounded mb-4">

                    <div class="px-xl-2 pb-sm-3">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="username" class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-medium">Email</span>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true"
                                              data-bs-title="Email de cadastro da AgoraPronto">
                                                    <img
                                                        src="{{asset('public/assets/installation')}}/assets/img/svg-icons/info2.svg"
                                                        class="svg" alt="">
                                                </span>
                                    </label>
                                    <input type="text" id="username" class="form-control" name="username"
                                           placeholder="Ex: joao@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="purchase_key" class="mb-2">Nº do Pedido</label>
                                    <input type="text" id="purchase_key" class="form-control" name="purchase_key"
                                           placeholder="Ex: 2056" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark px-sm-5">Continue</button>
                    {{--<a href="step3.html" class="btn btn-dark px-sm-5">Continue</a>--}}
                </div>
            </form>
        </div>
    </div>
@endsection
