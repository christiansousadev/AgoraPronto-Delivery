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
             aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="Passo final!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 90%"></div>
        </div>
    </div>

    <!-- Card -->
    <div class="card mt-4 position-relative">
        <div class="d-flex justify-content-end mb-2 position-absolute top-end">
            <a href="#" class="d-flex align-items-center gap-1">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="Configuração do administrador">

                            <img src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/info.svg" alt=""
                                 class="svg">
                        </span>
            </a>
        </div>
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase">Etapa 5. </h5>
                <h5 class="fw-normal">Configurações da conta do administrador</h5>
            </div>
            <p class="mb-4">Essas informações serão usadas para criar <strong>O usúario SuperAdmin</strong>
                para o seu painel de administração.
            </p>


            @if (isset($error) || session()->has('error'))
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <strong>{{isset($error) ? $error : session('error')}}</strong>
                    </div>
                </div>
            </div>
        @elseif(session()->has('success'))
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <strong>{{session('success')}}</strong>
                    </div>
                </div>
            </div>
        @endif

            <form method="POST" action="{{ route('system_settings',['token'=>bcrypt('step_6')]) }}">
                @csrf
                <div class="bg-light p-4 rounded mb-4">
                    <div class="px-xl-2 pb-sm-3">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="from-group">
                                    <label for="first-name" class="d-flex align-items-center gap-2 mb-2">Nome da empresa</label>
                                    <input type="text" id="first-name" class="form-control" name="web_name"
                                           required placeholder="Ex: FastDelivery">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="first-name" class="d-flex align-items-center gap-2 mb-2">
                                        Nome</label>
                                    <input type="text" id="first-name" class="form-control" name="f_name"
                                           required placeholder="Ex: Joao">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="last-name" class="d-flex align-items-center gap-2 mb-2">
                                        Sobrenome</label>
                                    <input type="text" id="last-name" class="form-control" name="l_name"
                                           required placeholder="Ex: da Silva">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="phone" class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-medium">Fone</span>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true"
                                              data-bs-title="Fornecer um número válido.Este número será usado para enviar o código de verificação e outros anexos no futuro">
                                                    <img
                                                        src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/info2.svg"
                                                        class="svg" alt="">
                                                </span>
                                    </label>

                                    <div class="number-input-wrap">
                                        <select name="phone_code" id="phone_code" class="js-example-basic-single form-select">
                                            @foreach(TELEPHONE_CODES as $item)
                                                <option value="{{$item['code']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                        <input type="tel" id="phone" class="form-control" name="phone" required
                                               placeholder="Ex: 48998463846">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="email" class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-medium">Email</span>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true"
                                              data-bs-title="Forneça um email válido.Este email será usado para enviar o código de verificação e outros anexos no futuro">
                                                    <img
                                                        src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/info2.svg"
                                                        class="svg" alt="">
                                                </span>
                                    </label>

                                    <input type="email" id="email" class="form-control" name="email" required
                                           placeholder="Ex: joaodasilva@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="password"
                                           class="d-flex align-items-center gap-2 mb-2">Senha</label>
                                    <div class="input-inner-end-ele position-relative">
                                        <input type="password" autocomplete="new-password" id="password"
                                               name="password" required class="form-control"
                                               placeholder="Ex: 8+ caracteres" minlength="8">
                                        <div class="togglePassword">
                                            <img
                                                src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/eye.svg"
                                                alt="" class="svg eye">
                                            <img
                                                src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/eye-off.svg"
                                                alt="" class="svg eye-off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="confirm-password" class="d-flex align-items-center gap-2 mb-2">Confirme sua senha</label>
                                    <div class="input-inner-end-ele position-relative">
                                        <input type="password" autocomplete="new-password" id="confirm_password"
                                               name="confirm_password" class="form-control" placeholder="Ex: 8+ caracteres" required>
                                        <div class="togglePassword">
                                            <img
                                                src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/eye.svg"
                                                alt="" class="svg eye">
                                            <img
                                                src="{{dynamicAsset('public/assets/installation')}}/assets/img/svg-icons/eye-off.svg"
                                                alt="" class="svg eye-off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark px-sm-5">Instalação completa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
