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
                                    <h3></h3>
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
        <div class="conatiner-fluid content-inner mt-n2 py-0">
            <div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Questions</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="fname">First Name:</label>
                                                <input type="text" class="form-control" id="fname"
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">Security</h5>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="uname">User Name:</label>
                                                <input type="text" class="form-control" id="uname"
                                                    placeholder="User Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="pass">Password:</label>
                                                <input type="password" class="form-control" id="pass"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">Repeat Password:</label>
                                                <input type="password" class="form-control" id="rpass"
                                                    placeholder="Repeat Password ">
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-label"><input class="form-check-input me-2" type="checkbox"
                                                    value="" id="flexCheckChecked">Enable
                                                Two-Factor-Authentication</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add New User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Quizess & Surveys</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" aria-describedby="title" placeholder="Input here..."
                                                name="title" autofocus required value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="form-group">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="flexSwitchCheckDefault">Is Active?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"
                                                id="toggleLabel">No</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="../../dashboard/extra/privacy-policy.html">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item"><a href="../../dashboard/extra/terms-of-service.html">Terms of Use</a>
                    </li>
                </ul>
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Hope UI, Made with
                    <span class="">
                        <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                fill="currentColor"></path>
                        </svg>
                    </span> by <a href="https://iqonic.design/">IQONIC Design</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>

    <script>
        const toggleSwitch = document.getElementById('flexSwitchCheckDefault');
        const toggleLabel = document.getElementById('toggleLabel');

        toggleSwitch.addEventListener('change', function() {
            if (toggleSwitch.checked) {
                toggleLabel.textContent = 'Yes';
            } else {
                toggleLabel.textContent = 'No';
            }
        });
    </script>
@endsection
