@extends('layouts/contentNavbarLayout')

@section('title', 'Assinatura Concluída')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card text-center p-4 shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <i class="ri-checkbox-circle-line text-success display-4"></i>
                        </div>
                        <h4 class="card-title mb-3">Assinatura realizada com sucesso!</h4>
                        <p class="card-text mb-4">
                            Obrigado por escolher um de nossos planos. Agora você tem acesso completo ao painel e recursos
                            da plataforma.
                        </p>
                        <a href="{{ route('dashboard-analytics') }}" class="btn btn-primary">
                            Ir para o painel
                            <i class="ri-arrow-right-line ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
