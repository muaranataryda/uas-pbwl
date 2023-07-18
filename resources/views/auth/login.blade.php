@extends('auth.layouts.main')

@section('main-body')

@if (session()->has('pesan'))
        {!! session('pesan') !!}
@endif

<div class="login-page">
    <div class="form">
      <form class="register-form" action="/register" method="post">
        @csrf

        <input type="email" placeholder="email" name="email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <input type="text" placeholder="nama" name="nama" required/>
        <input type="text" placeholder="No Hp" name="hp" required/>
        <textarea name="alamat" placeholder="Isi alamat..."></textarea>

        <button type="submit">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>

      <form class="login-form" action="/login" method="post">
        @csrf

        <input type="text" placeholder="username" name="email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>

@endsection
