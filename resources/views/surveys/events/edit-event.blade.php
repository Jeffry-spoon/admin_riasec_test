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
                                    <h3>{{ $events->first()->title }}</h3>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title mb-2  ">Edit Event</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('event.update', $events->first()->slug) }}"
                                    id="eventForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <div class="form-group d-flex">
                                            <div class="flex-grow-1 me-2">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                                    aria-describedby="title" placeholder="Input here..." name="title"
                                                    autofocus required value="{{ $events->first()->title }}">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="flex-grow-1">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    value="{{ $events->first()->slug }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                        <div class="form-group">
                                            <label for="date" class="form-label">Cut off date</label>
                                            @php
                                                // Ambil bagian tanggal dari string
                                                $cutOffDate = substr($events->first()->cut_off_date, 0, 10);
                                            @endphp

                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id="date" aria-describedby="title" placeholder="Input here..."
                                                name="date" autofocus value="{{ $cutOffDate }}"
                                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                    <label for="flexSwitchCheckDefault" data-bs-toggle="tooltip" data-bs-placement="top" disabled
                                        title="Next Version 👌">Is Active?</label>
                                    <div class="form-check form-switch" disabled>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled
                                            name="is_active" value="1"
                                            @if ($events->first()->is_active) checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault" id="toggleLabel">
                                            @if ($events->first()->is_active)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary" id="submitButton"
                                        disabled>Update</button>
                                    <a href="{{ route('event.index') }}" type="submit" class="btn btn-danger">Cancel</a>
                            </div>

                            </form>
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
        document.getElementById('title').addEventListener('input', function() {
            var title = this.value.trim().toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = title;
        });

        const toggleSwitch = document.getElementById('flexSwitchCheckDefault');
        const toggleLabel = document.getElementById('toggleLabel');

        toggleSwitch.addEventListener('change', function() {
            if (toggleSwitch.checked) {
                toggleLabel.textContent = 'Yes';
            } else {
                toggleLabel.textContent = 'No';
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('eventForm');
    var originalFormData = new FormData(form);
    var submitButton = document.getElementById('submitButton');
    var toggleSwitch = document.getElementById('flexSwitchCheckDefault');

    // Simpan nilai awal tombol is_active
    var originalIsActive = toggleSwitch.checked;

    form.addEventListener('input', function() {
        checkFormChanges();
    });

    toggleSwitch.addEventListener('change', function() {
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

        // Periksa apakah nilai is_active telah berubah
        if (toggleSwitch.checked !== originalIsActive) {
            formDataChanged = true;
        }

        submitButton.disabled = !formDataChanged;
    }

    // Reset original form data when the form is submitted
    form.addEventListener('submit', function() {
        originalFormData = new FormData(form);
        submitButton.disabled = true; // Menonaktifkan tombol setelah pengiriman formulir
        originalIsActive = toggleSwitch.checked; // Perbarui nilai is_active asli setelah pengiriman
    });
});

    </script>
@endsection
