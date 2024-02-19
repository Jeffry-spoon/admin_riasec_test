@extends('layouts.app')

@section('content')
    <main class="main-content">
        @include('components.navbar')

        <div class="conatiner-fluid content-inner mt-4 py-0">
            <div class="row" style="margin-top: 60px">
                <div class="col-sm-12">
                    @if (session('alert'))
                        <x-alert :type="session('alert')['type']" :message="session('alert')['message']" />
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Event</h4>
                                <a class="btn btn-border ps-4" href="{{ route('event.create') }}">
                                    Add New
                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>

                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Data Table !-->
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body px-0">
                                            <div class="table-responsive">
                                                <table id="user-list-table" class="table table-striped" role="grid"
                                                    data-bs-toggle="data-table">
                                                    <thead>

                                                        <tr class="ligth">
                                                            <th>Title</th>
                                                            <th>Slug</th>
                                                            <th>Cut off date</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            {{-- <th>Active</th> --}}
                                                            <th style="min-width: 100px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        use Carbon\Carbon;
                                                    @endphp
                                                    <tbody>
                                                        @if (count($events) > 0)
                                                        @foreach ( $events as $event)
                                                            <tr>
                                                                <td>{{ $event->title }}</td>
                                                                <td>{{ $event->slug }}</td>
                                                                <td>{{ $event->cut_off_date }}</td>
                                                                <td>{{ $event->created_at }}</td>
                                                                <td>{{ $event->updated_at }}</td>
                                                                {{-- <td>
                                                                    @if ($event->is_active == 1)
                                                                        <span class="badge bg-primary">Active</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    @endif
                                                                </td> --}}
                                                            </tr>

                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="12"
                                                                class="text-center text-black-50">Tidak ada
                                                                event yang berlangsung
                                                                minggu ini untuk sementara</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('components.footer')
    </main>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3A57E8',
                cancelButtonColor: '#B42F1F',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
@endsection
