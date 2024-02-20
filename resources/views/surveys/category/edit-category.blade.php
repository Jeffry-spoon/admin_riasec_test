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
                                    <h3>{{ $data->category_text }}</h3>
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
            @if (session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title mb-2  ">Description: </h4>
                                    <p>{!! nl2br(e($data->description)) !!}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('categories.update', $data->slug) }}"
                                    id="descriptionForm">
                                    @csrf
                                    <div class="mb-3">
                                        <!-- Ganti textarea dengan editor Summernote -->
                                        <textarea class="form-control summernote @error('description') is-invalid @enderror" name="description" id="description"
                                            rows="3">{{ $data->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitButton"
                                        >Update</button>
                                    <a href="{{ route('categories.index') }}" type="submit"
                                        class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')

    </main>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Tentukan tinggi editor
                placeholder: 'Masukkan deskripsi disini...', // Placeholder teks
                codexHtml: true, // Mengirimkan konten sebagai HTML
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        checkFormChanges();
                    }
                }
            });

            function checkFormChanges() {
                var form = document.getElementById('descriptionForm'); // Form
                var submitButton = document.getElementById('submitButton'); // Tombol Update
                var descriptionTextarea = document.getElementById('description'); // Textarea Deskripsi

                // Cek apakah terjadi perubahan pada konten textarea
                var currentDescription = $('.summernote').summernote('code').trim();
                var originalDescription = '{{ $data->description }}'; // Deskripsi asli dari database

                // Jika terdapat perubahan, aktifkan tombol Update
                if (currentDescription !== originalDescription) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            }
        });
    </script>
@endsection
