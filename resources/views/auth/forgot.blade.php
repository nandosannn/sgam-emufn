@extends('layout.auth')

@section('body-class', 'login-page')

@section('content')
    <div class="login-box">
        <div class="login-logo">
             <a href="{{route('login')}}"><b>Admin</b>LTE</a>
        </div>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="width: 18%">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset password</p>

                @session('status')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>

                @endsession
                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Enviar o Link</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
                <div class=" text-center p-3">
                    <p class="mb-0">
                        <a href="{{route('login')}}" class="text-center">Voltar para Login</a>
                    </p>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
