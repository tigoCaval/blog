@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                    <p class="mb-4">Basta inserir seu endereço de e-mail abaixo e enviaremos um link para redefinir sua senha!</p>
                  </div>
                  <form class="user" method="POST" action="{{ route('password.email') }}"> 
                    @csrf
                    
                    <div class="form-group">
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Endereço de E-mail...">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    
                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4 btn-user btn-block">
                          <button type="submit" class="btn btn-primary btn-user">
                            Redefinir Senha
                          </button>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Crie sua conta!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('login') }}">já tem uma conta? Conecte-se!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection
