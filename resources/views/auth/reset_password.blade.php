@extends('layout.auth')

@section('body-class', 'register-page')
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.register-logo -->
        <div class="card">

            <div class="card-body register-card-body">
                <p class="register-box-msg">Resert password</p>
                @session('status')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession
                <form action=" {{ route('password.update') }} " method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->token }}">
                    <div class="input-group mb-3">
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"/>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
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

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Cadastro</button>
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <p class="mt-3 text-center ">
                    <a href="{{route('login')}}" class="text-center"> Back to login </a>
                </p>
            </div>
            <!-- /.register-card-body -->
        </div>
    </div>
@endsection
