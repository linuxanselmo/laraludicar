@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Seja Bem Vindo!</h1>
                        <p class="text-lead text-white">Use este formulário para cria a sua conta e participa do projeto</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Cadastro de Terapeuta</h5>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('auth.terapeuta.register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Nome de Usuário" title="Nome de Usuário" aria-label="username" value="{{ old('username') }}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="fullname" class="form-control" placeholder="Nome completo sem abreviações" title="Nome completo sem abreviações" aria-label="fullname" value="{{ old('fullname') }}" >
                                    @error('fullname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="especialty" class="form-control" placeholder="Sua principal especialidade" title="Sua principal especialidade" aria-label="especialty" value="{{ old('especialty') }}" >
                                    @error('especialty') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="register" class="form-control" placeholder="Sigla e número de registro" title="Sigla e número de registro" aria-label="register" value="{{ old('register') }}" >
                                    @error('register') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>

                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Digite seu melhor e-mail" title="Digite seu melhor e-mail" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control"  placeholder="Senha" title="Senha"  aria-label="password" value="{{ old('password') }}">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="address" class="form-control" placeholder="Digite seu endereço completo" title="Digite seu endereço completo" aria-label="address" value="{{ old('address') }}" >
                                    @error('address') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Digite sua cidade" title="Digite sua cidade" aria-label="city" value="{{ old('city') }}" >
                                    @error('city') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="cell" class="form-control" placeholder="Digite seu número de celular" title="Digite seu número de celular" aria-label="cell" value="{{ old('cell') }}" >
                                    @error('cell') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="whatsapp" class="form-control" placeholder="Digite o número do seu whatsapp" title="Digite o número do seu whatsapp" aria-label="whatsapp" value="{{ old('whatsapp') }}" >
                                    @error('whatsapp') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <textarea name="about" class="form-control" placeholder="Digite informações complementares relevantes" title="Digite informações complementares relevantes" aria-label="about" value="{{ old('about') }}"  row='12'></textarea>
                                    @error('about') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cadastra</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Já tem uma conta? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Acesse aqui</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
