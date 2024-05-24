@extends('auth.layout.main')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Verify Your Email</h2>
        </div>
        <div class="card-body">
            <p>Please click the button below to verify your email address.</p>
            <a href="{{ route('verifyEmail', ['verificationCode' => $verificationCode]) }}">
                Verify Email
            </a>
        </div>
        <div class="card-footer">
            <p>Thanks,<br>{{ config('app.name') }}</p>
        </div>
    </div>
</div>
@endsection