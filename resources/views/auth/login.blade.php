@extends('base')
@section('content')


<div class="container mt-3">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-white mx-16" style="margin-top: 75px;">

      <form method='POST' action="/login" class="mt-3">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="username" class="form-control hover:shadow-none focus:shadow-none" name='username' />

        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control hover:shadow-none focus:shadow-none" name='password' />
        </div>
        <div class="mb-3">
            If You Don't Have an Account,
            <a href="/register" class="underline decoration-solid" style="color: blue;">REGISTER!</a>
        </div>

        <button type="submit" class="btn bg-white " style="color: #ff6700;">Login</button>
      </form>

    </div>
  </div>
</div>

@endsection
