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
    </div>
@endsection
