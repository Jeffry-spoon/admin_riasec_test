{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')

@section('content')
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>    </div>
      <!-- loader END -->

        <div class="wrapper">
        <section class="login-content">
           <div class="row m-0 align-items-center bg-white vh-100">
              <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                 <img src="{{ asset('images/auth/02.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
              </div>
              <div class="col-md-6 p-0">
                 <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                    <div class="card-body" :status="session('status')">
                       <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                          <!--Logo start-->
                          <!--logo End-->

                          <!--Logo start-->
                        <img src="{{ asset('images/favicon.svg') }}" style="width: 36px">
                          <!--logo End-->

                          <h4 class="logo-title ms-3">Admin</h4>
                       </a>
                       <h2 class="mb-2">Reset Password</h2>
                       <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>
                       <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                          <div class="row">
                             <div class="col-lg-12">
                                <div class="floating-label form-group">
                                   <label for="email" class="form-label">Email</label>
                                   <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder=" " name="email" value="{{ old('email') }}">
                                   @error('email')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
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
