@extends('layouts/contentNavbarLayout')

@section('title', 'Assas Teste')

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
    @if ($type == 'BOLETO')
        <div class="container py-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detalhes da Cobrança - {{ $payment['billingType'] ?? 'Desconhecido' }}</h5>
                    <span class="badge bg-{{ $payment['status'] === 'PENDING' ? 'warning' : 'success' }}">
                        {{ $payment['status'] }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>ID da Cobrança:</strong> {{ $payment['id'] }}</p>
                            <p><strong>Descrição:</strong> {{ $payment['description'] }}</p>
                            <p><strong>Valor:</strong> R$ {{ number_format($payment['value'], 2, ',', '.') }}</p>
                            <p><strong>Vencimento:</strong>
                                {{ \Carbon\Carbon::parse($payment['dueDate'])->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Cliente:</strong> {{ $payment['customer'] }}</p>
                            <p><strong>Número da Fatura:</strong> {{ $payment['invoiceNumber'] }}</p>
                            <p><strong>Nosso Número:</strong> {{ $payment['nossoNumero'] }}</p>
                            <p><strong>Data de Criação:</strong>
                                {{ \Carbon\Carbon::parse($payment['dateCreated'])->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="{{ $payment['bankSlipUrl'] }}" target="_blank" class="btn btn-outline-primary me-2">
                            <i class="bi bi-file-earmark-pdf"></i> Visualizar Boleto
                        </a>

                        @if ($payment['invoiceUrl'])
                            <a href="{{ $payment['invoiceUrl'] }}" target="_blank" class="btn btn-outline-success">
                                <i class="bi bi-receipt"></i> Ver Fatura Online
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-footer text-muted text-end">
                    <small>Referência externa: {{ $payment['externalReference'] }}</small>
                </div>
            </div>
        </div>
    @elseif ($type == 'PIX')
        <div class="container py-5">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        💸 Pagamento via PIX - {{ $payment['status'] === 'PENDING' ? 'Aguardando Pagamento' : 'Pago' }}
                    </h5>
                </div>

                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ $payment['description'] }}</h6>
                    <p><strong>Valor:</strong> R$ {{ number_format($payment['value'], 2, ',', '.') }}</p>
                    <p><strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($payment['dueDate'])->format('d/m/Y') }}</p>

                    <hr>

                    {{-- QR Code PIX --}}
                    @if (isset($pixData['encodedImage']))
                        <div class="mb-3">
                            <img src="data:image/png;base64,{{ $pixData['encodedImage'] }}" alt="QR Code PIX"
                                class="img-fluid shadow-sm" style="max-width: 250px; border-radius: 8px;">
                        </div>

                        <p class="fw-bold">Copia e Cola:</p>
                        <textarea class="form-control text-center" readonly rows="3">{{ $pixData['payload'] }}</textarea>
                    @else
                        <div class="alert alert-warning">
                            <i class="bi bi-hourglass-split"></i> O QR Code PIX ainda está sendo gerado.<br>
                            <small>Tente recarregar a página em alguns segundos.</small>
                        </div>
                    @endif
                </div>

                <div class="card-footer text-muted text-end">
                    <small>Referência externa: {{ $payment['externalReference'] }}</small><br>
                    <a href="{{ $payment['invoiceUrl'] }}" target="_blank" class="text-decoration-none">
                        Ver fatura no Asaas →
                    </a>
                </div>
            </div>
        </div>
    @elseif ($type == 'CREDIT_CARD')
        <div class="container py-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Cobrança via Cartão de Crédito</h5>
                    <span class="badge bg-{{ $payment['status'] === 'CONFIRMED' ? 'success' : 'warning' }}">
                        {{ $payment['status'] }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>ID da Cobrança:</strong> {{ $payment['id'] }}</p>
                            <p><strong>Descrição:</strong> {{ $payment['description'] }}</p>
                            <p><strong>Valor:</strong> R$ {{ number_format($payment['value'], 2, ',', '.') }}</p>
                            <p><strong>Data de Criação:</strong>
                                {{ \Carbon\Carbon::parse($payment['dateCreated'])->format('d/m/Y') }}</p>
                            <p><strong>Data de Pagamento do Cliente:</strong>
                                {{ \Carbon\Carbon::parse($payment['clientPaymentDate'])->format('d/m/Y') }}</p>
                            <p><strong>Data prevista para crédito:</strong>
                                {{ \Carbon\Carbon::parse($payment['estimatedCreditDate'])->format('d/m/Y') }}</p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2">Dados do Cartão</h6>
                            <p><strong>Últimos 4 dígitos:</strong>
                                {{ $payment['creditCard']['creditCardNumber'] ?? '---' }}</p>
                            <p><strong>Bandeira:</strong> {{ $payment['creditCard']['creditCardBrand'] ?? '---' }}</p>
                            <p><strong>Token do Cartão:</strong>
                                <code>{{ $payment['creditCard']['creditCardToken'] ?? '---' }}</code>
                            </p>

                            <hr>

                            <a href="{{ $payment['invoiceUrl'] }}" target="_blank" class="btn btn-outline-primary me-2">
                                <i class="bi bi-receipt"></i> Ver Fatura
                            </a>

                            @if ($payment['transactionReceiptUrl'])
                                <a href="{{ $payment['transactionReceiptUrl'] }}" target="_blank"
                                    class="btn btn-outline-success">
                                    <i class="bi bi-file-earmark-check"></i> Ver Comprovante
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted text-end">
                    <small>Referência externa: {{ $payment['externalReference'] }}</small>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center my-5">
            <i class="bi bi-exclamation-triangle"></i> Algo deu errado ou tipo de cobrança desconhecido.
        </div>
    @endif


@endsection
