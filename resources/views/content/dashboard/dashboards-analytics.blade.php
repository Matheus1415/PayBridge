@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
    <div class="row gy-6">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar do usuário" class="w-px-40 h-auto rounded-circle">
                    </div>
                    <div>
                        <h5 class="mb-0">Olá, {{ $user->name }}!</h5>
                        <p>
                            <strong>Plano:</strong> {{ $data['subscription_name'] ?? 'N/A' }}<br>
                            <strong>Status:</strong> 
                            @if(isset($data['stripe_status']))
                                @if($data['stripe_status'] === 'active')
                                    <span class="text-success">Ativo</span>
                                @else
                                    <span class="text-warning">{{ ucfirst($data['stripe_status']) }}</span>
                                @endif
                            @else
                                <span class="text-danger">Sem assinatura</span>
                            @endif
                            <br>
                            <strong>Assinatura termina em:</strong> {{ $data['subscription_end'] ?? 'N/A' }}
                        </p>
                        <p>Quantidade de documentos {{$invoices}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
