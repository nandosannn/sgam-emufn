@extends('layout.auth')

@section('body-class', 'register-page')
@section('content')
    <div class="container" style="max-width: 800px; margin: auto;">
        <div class="register-logo">
            <a href="{{ route('login') }}"><b>SGAM</b></a>
        </div>
        <!-- /.register-logo -->

        <div class="card">
            <div class="card-body register-card-body">

                <form action=" {{ route('register') }} " method="POST">
                    @csrf
                    <h3 class="mt-3 mb-3" >Dados do usuário</h3>
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Nome"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                                    <input type="text" name="sobrenome"
                                        class="form-control @error('sobrenome') is-invalid @enderror"
                                        placeholder="Sobrenome" value="{{ old('sobrenome') }}" />
                                    @error('sobrenome')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                                placeholder="CPF" value="{{ old('cpf') }}" />
                            @error('cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Password Confirmation" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <h3 class="mt-5 mb-3">Informações basicas</h3>
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                                    <input type="text" name="ocupacao"
                                        class="form-control @error('ocupacao') is-invalid @enderror" placeholder="Ocupação"
                                        value="{{ old('ocupacao') }}" />
                                    @error('ocupacao')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                                    <input type="phone " name="telefone"
                                        class="form-control @error('telefone') is-invalid @enderror"
                                        placeholder="Telefone" value="{{ old('telefone') }}" />
                                    @error('telefone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Cadastro</button>
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <p class="mt-3 text-center">
                    <a href="{{ route('login') }}"> Já sou membro </a>
                </p>
            </div>
            <!-- /.register-card-body -->
        </div>

    </div>
@endsection
