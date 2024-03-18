@extends('layouts.app')

@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('components.navbar')
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    @include('components.breadcrumbs')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ asset('images/dashboard/top-header.png') }}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
            <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title mb-2  ">Add New Team Member</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="userForm" method="POST" action="{{ route('team.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label @error('uname') is-invalid @enderror" for="uname">User
                                            Name</label>
                                        <input type="text" class="form-control" id="uname" placeholder="User Name"
                                            name="name" value="{{ old('name') }}">
                                        @error('uname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label @error('email') is-invalid @enderror"
                                            for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="password-field">Password</label>
                                        <input id="password-field" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="rpass">Repeat Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="rpass" placeholder="Repeat Password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">User Role</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option value="">Select</option>
                                            <option value="penanggung jawab">Penanggung Jawab</option>
                                            <option value="fasilitator">Fasilitator</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-3" id="submitButton"
                                    disabled>Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('userForm');
            var submitButton = document.getElementById('submitButton');

            form.addEventListener('input', function() {
                checkFormCompletion();
            });

            function checkFormCompletion() {
                var inputs = form.querySelectorAll('input, select');
                var isComplete = true;

                inputs.forEach(function(input) {
                    if (input.value.trim() === '' && input.type !== 'submit') {
                        isComplete = false;
                    }
                });

                submitButton.disabled = !isComplete;
            }
        });
    </script>


@endsection
