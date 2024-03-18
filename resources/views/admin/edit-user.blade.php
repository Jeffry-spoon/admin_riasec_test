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
                                    <h3>{{ $user->name }}</h3>
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
            <div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Edit Team Member Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <form id="userForm" method="POST" action="{{ route('team.update', $user->user_id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label @error('uname') is-invalid @enderror" for="uname">User Name</label>
                                                <input type="text" class="form-control" id="uname" placeholder="User Name" value="{{ $user->name }}" name="name">
                                                @error('uname')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label @error('email') is-invalid @enderror" for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}" name="email">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="password-field">Password</label>
                                                <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">Repeat Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="rpass" placeholder="Repeat Password" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">User Role</label>
                                                <select name="type" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">Select</option>
                                                    <option value="penanggung jawab" {{ $user->role === 'penanggung jawab' ? 'selected' : '' }}>Penanggung Jawab</option>
                                                    <option value="fasilitator" {{ $user->role === 'fasilitator' ? 'selected' : '' }}>Fasilitator</option>
                                                </select>
                                            </div>
                                        </div>

                                            <button type="submit" class="btn btn-primary me-3" id="submitButton"
                                                disabled>Update</button>
                                            <a href="{{ route('team.index') }}" type="submit" class="btn btn-danger">Cancel</a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Footer Section Start -->
        @include('components.footer')
        <!-- Footer Section End -->
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('userForm');
            var originalFormData = new FormData(form);
            var submitButton = document.getElementById('submitButton');

            form.addEventListener('input', function() {
                checkFormChanges();
            });

            function checkFormChanges() {
                var currentFormData = new FormData(form);
                var formDataChanged = false;

                for (var pair of currentFormData.entries()) {
                    if (!originalFormData.has(pair[0]) || originalFormData.get(pair[0]) !== pair[1]) {
                        formDataChanged = true;
                        break;
                    }
                }

                submitButton.disabled = !formDataChanged;
            }

            // Reset original form data when the form is submitted
            form.addEventListener('submit', function() {
                originalFormData = new FormData(form);
                submitButton.disabled = true; // Menonaktifkan tombol setelah pengiriman formulir
            });
        });
    </script>

@endsection
