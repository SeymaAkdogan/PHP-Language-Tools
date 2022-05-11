@extends('base')
@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-white mx-16" style="margin-top: 75px;">

            <form method='POST' action="/register">
                @csrf
                @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endisset
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control hover:shadow-none focus:shadow-none" name='username' />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control hover:shadow-none focus:shadow-none" name='email' />
                </div>

                <div class='row mb-3'>
                    <div class='col'>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control hover:shadow-none focus:shadow-none" name='password' />
                    </div>
                    <div class='col'>
                        <label for="repassword" class="form-label">Re-Password</label>
                        <input type="password" class="form-control hover:shadow-none focus:shadow-none" name='repassword' />
                    </div>
                </div>
                <div class="mb-3">
                    You Already Have an Account
                    <a href="/login" class="underline decoration-solid" style="color: blue;">LOGIN!</a>
                </div>

                <button type="submit" class="btn bg-white " style="color: #ff6700;">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection
