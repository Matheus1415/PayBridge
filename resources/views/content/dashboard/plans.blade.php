@extends('layouts/contentNavbarLayout')

@section('title', 'Planos')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                    <div>
                        <h5 class="mb-0">Olá, {{ $user->name }}!</h5>
                        <small class="text-muted">Você está logado.</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Plano Básico -->
        <div class="col-lg">
            <div class="card border rounded shadow-none">
                <div class="card-body text-center">
                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/bookmark.png"
                        alt="Plano Básico" width="100" class="mb-4">
                    <h4 class="mb-1">Básico</h4>
                    <p class="text-muted">Ideal para começar</p>
                    <h3 class="text-primary mb-3">R$ 9,90<span class="fs-6">/mês</span></h3>

                    <a href="#" class="btn btn-label-success w-100">Seu plano atual</a>
                </div>
            </div>
        </div>

        <!-- Plano Padrão -->
        <div class="col-lg">
            <div class="card border-primary border shadow-none">
                <div class="card-body text-center position-relative">
                    <span class="badge bg-label-primary position-absolute top-0 end-0 mt-3 me-3">Mais popular</span>
                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/wallet-round.png"
                        alt="Plano Padrão" width="100" class="mb-4 mt-4">
                    <h4 class="mb-1">Padrão</h4>
                    <p class="text-muted">Para pequenos negócios</p>
                    <h3 class="text-primary mb-3">R$ 49<span class="fs-6">/anual</span></h3>

                    <a href="#" class="btn btn-primary w-100">Assinar plano</a>
                </div>
            </div>
        </div>

        <!-- Plano Empresarial -->
        <div class="col-lg">
            <div class="card border rounded shadow-none">
                <div class="card-body text-center">
                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/briefcase-round.png"
                        alt="Plano Empresarial" width="100" class="mb-4">
                    <h4 class="mb-1">Empresarial</h4>
                    <p class="text-muted">Para grandes empresas</p>
                    <h3 class="text-primary mb-3">R$ 99<span class="fs-6">/trianual</span></h3>

                    <a href="#" class="btn btn-label-primary w-100">Assinar plano</a>
                </div>
            </div>
        </div>
    </div>
@endsection
