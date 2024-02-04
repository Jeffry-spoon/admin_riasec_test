@extends('layouts.app')

@section('content')
    <main class="main-content">
        @include('components.navbar')
        <div class="iq-navbar-header">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                @include('components.breadcrumbs')
                                <h1>{{ $data->category_text }}</h1>
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

        <div class="conatiner-fluid content-inner py-0">
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

                            <form method="post" action="{{ route('categories.update', $data->slug) }}">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('components.footer')
    </main>

    <!-- Sertakan file JS Summernote -->
    <script src="{{ asset('js/summernote-bs4.js') }}"></script>

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
                ]
            });
        });
    </script>
@endsection
