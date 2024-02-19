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
                                <h1></h1>
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
                                <h4 class="card-title mb-2  ">Add New Event</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('event.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group d-flex">
                                        <div class="flex-grow-1 me-2">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" aria-describedby="title" placeholder="Input here..."
                                                name="title" autofocus required value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="flex-grow-1">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="date" class="form-label">Cut off date</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            id="date" aria-describedby="title" placeholder="Input here..."
                                            name="date" autofocus required value="{{ old('date') }}"
                                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="flexSwitchCheckDefault">Is Active?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            name="is_active" value="1">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            id="toggleLabel">No</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

        @include('components.footer')
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
    </script>
@endsection
