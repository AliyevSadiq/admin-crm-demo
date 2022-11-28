@extends('crm.layouts.auth')
@section('auth')
    <div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if($errors->has('invalid_auth'))
                <h4 class="text-danger">{{$errors->first('invalid_auth')}}</h4>
            @endif
            <form action="{{route('crm.login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if($errors->has("email"))
                    <small class="text-danger">{{$errors->first("email")}}</small>
                @endif
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>

                    </div>
                </div>
                @if($errors->has("password"))
                    <small class="text-danger">{{$errors->first("password")}}</small>
                @endif
            <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
