@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('page-script')
    @vite('resources/assets/js/auth.js')
@endsection

@section('content')
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6 mx-4">

                <!-- Login -->
                <div class="card p-7">

                    <div class="card-body mt-1">
                        <h4 class="mb-1">Bem-vindo ao {{ config('variables.templateName') }}! 👋🏻</h4>
                        <p class="mb-5">Por favor, faça login na sua conta e comece a aventura</p>

                        <form id="formAuthentication" class="mb-5" action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <div class="form-floating form-floating-outline mb-5">
                                <input type="text" class="form-control" id="email" name="email-username"
                                    placeholder="Digite seu email ou nome de usuário" autofocus>
                                <label for="email">Email ou Nome de Usuário</label>
                            </div>
                            <div class="mb-5">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="••••••••••••" aria-describedby="password" />
                                            <label for="password">Senha</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="ri-eye-off-line ri-20px"></i></span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Lembrar-me
                                    </label>
                                </div>
                                <a href="{{ url('auth/forgot-password-basic') }}" class="float-end mb-1">
                                    <span>Esqueceu a senha?</span>
                                </a>
                            </div>
                            --}}
                            <div class="mb-5">
                                <button class="btn btn-primary d-grid w-100" type="submit">Entrar</button>
                            </div>
                        </form>

                        {{-- <p class="text-center mb-5">
                            <span>É novo na nossa plataforma?</span>
                            <a href="{{ url('auth/register-basic') }}">
                                <span>Crie uma conta</span>
                            </a>
                        </p> --}}
                    </div>
                </div>

                <img src="{{ asset('assets/img/illustrations/tree-3.png') }}" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block">
                <img src="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}"
                    class="authentication-image d-none d-lg-block" height="172" alt="triangle-bg">
                <img src="{{ asset('assets/img/illustrations/tree.png') }}" alt="auth-tree"
                    class="authentication-image-object-right d-none d-lg-block">
            </div>
        </div>
    </div>
@endsection
