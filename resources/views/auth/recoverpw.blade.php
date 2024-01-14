{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')

@section('content')

<div class="wrapper">
    <section class="login-content">
       <div class="row m-0 align-items-center bg-white vh-100">
          <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
             <img src="{{asset('images/auth/02.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images">
          </div>
          <div class="col-md-6 p-0">
             <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                <div class="card-body">
                   <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3">
                      <!--Logo start-->
                      <!--logo End-->

                      <!--Logo start-->
                      <div class="logo-main">
                          <div class="logo-normal">
                            <img src="{{asset('images/favicon.svg')}}" alt="Logo" style="width: 36px;">
                          </div>
                          <div class="logo-mini">
                            <img src="{{asset('images/favicon.svg')}}" alt="Logo" style="width: 36px;">
                          </div>
                      </div>
                      <!--logo End-->

                      <h4 class="logo-title ms-3">Admin</h4>
                   </a>
                   <h2 class="mb-2">Reset Password</h2>
                   <p>Enter your email address and your new password to reset your password.</p>
                   <form>
                    @csrf
                      <div class="row">
                         <div class="col-lg-12">
                            <div class="floating-label form-group">
                               <label for="email" class="form-label">Email</label>
                               <input type="email" class="form-control mb-3" id="email" aria-describedby="email" placeholder="Input your email here...">
                               <label for="email" class="form-label">New Password</label>
                               <input type="email" class="form-control mb-3" id="password" aria-describedby="email" placeholder="Input your new password here...">
                               <label for="email" class="form-label">Confirmation New Password</label>
                               <input type="email" class="form-control mb-3" id="password" aria-describedby="email" placeholder="Confirmation  your new password here...">
                            </div>
                         </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Reset</button>
                   </form>
                </div>
             </div>
             <div class="sign-bg sign-bg-right">
                <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <g opacity="0.05">
                   <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                   <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                   <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                   <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                   </g>
                </svg>
             </div>
          </div>
       </div>
    </section>
    </div>

@endsection
