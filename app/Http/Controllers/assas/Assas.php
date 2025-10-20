<?php

namespace App\Http\Controllers\Assas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Services\AsaasService;

class Assas extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $customerId = 'cus_000007143231';

        $type = strtoupper($request->get('type', 'BOLETO'));

        $paymentData = [
            'customer' => $customerId,
            'billingType' => $type,
            'value' => 50.00,
            'dueDate' => now()->addDays(3)->format('Y-m-d'),
            'description' => "Cobrança de teste via {$type}",
            'externalReference' => uniqid('TESTE_'),
        ];

        if ($type === 'CREDIT_CARD') {
            $paymentData['creditCard'] = [
                'holderName' => 'Usuário Teste',
                'number' => '4000000000000010',
                'expiryMonth' => '12',
                'expiryYear' => '2030',
                'ccv' => '123',
            ];

            $paymentData['creditCardHolderInfo'] = [
                'name' => 'Usuário Teste',
                'email' => 'teste@example.com',
                'cpfCnpj' => '12345678909',
                'postalCode' => '01001000',
                'addressNumber' => '100',
                'phone' => '11999999999',
            ];
        }

        // $payment = AsaasService::createPayment($paymentData);
        $payment = AsaasService::getPayment('11695890');
        $pixData = AsaasService::getPixQrCode('11695890');
        
        return view('content.assas.home-assas', [
            'user' => $user,
            'type' => $type,
            'payment' => $payment,
            'pixData' => $pixData,
        ]);
    }


    // $customerData = [
    //     'name' => $user->name ?? 'Usuário Teste',
    //     'email' => $user->email ?? 'teste@example.com',
    //     'cpfCnpj' => $user->cpf ?? '12345678909', 
    //     'mobilePhone' => $user->phone ?? '91991507663',
    // ];

    // $asaasCustomer = AsaasService::createCustomer($customerData);

}
