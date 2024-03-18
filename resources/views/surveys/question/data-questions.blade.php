@extends('layouts.app')

@section('content')
    <main class="main-content">
        @include('components.navbar')



        <div class="conatiner-fluid content-inner mt-n3 py-0">
            <div class="row" style="margin-top: 60px">
                <div class="col-sm-12">
                    @if (session('alert'))
                        <x-alert :type="session('alert')['type']" :message="session('alert')['message']" />
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Quizzes & Surveys</h4>
                                <a class="btn btn-border ps-4" href="{{ route('type.create') }}">
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
                                                            <th>No. of Questions</th>
                                                            <th>Participants</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            <th>Updated by</th>
                                                            <th>Active</th>
                                                            <th style="min-width: 100px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        use Carbon\Carbon;
                                                    @endphp
                                                    <tbody>
                                                        @foreach ($totalData as $data)
                                                            <tr>
                                                                <td>{{ $data->type_name }}</td>
                                                                <td>{{ $data->total_questions }}</td>
                                                                <td>{{ $data->total_participants }}</td>
                                                                <td>{{ $data->created_at }}</td>
                                                                <td>{{ $data->updated_at }}</td>
                                                                <td>{{ $data->updated_by }}</td>
                                                                <td>
                                                                    @if ($data->is_active == 1)
                                                                        <span class="badge bg-primary">Active</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        <a class="btn btn-sm btn-icon btn-warning"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Edit" data-original-title="Edit"
                                                                            href="{{ route('type.edit', $data->id) }}">
                                                                            <span class="btn-inner">
                                                                                <svg class="icon-20" width="20"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path
                                                                                        d="M15.1655 4.60254L19.7315 9.16854"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-icon btn-danger"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Delete"
                                                                            href="{{ route('type.destroy', $data->id) }}"
                                                                            onclick="return confirmDelete(event)">
                                                                            <span class="btn-inner">
                                                                                <svg class="icon-20" width="20"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    stroke="currentColor">
                                                                                    <path
                                                                                        d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path d="M20.708 6.23975H3.75"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                    <path
                                                                                        d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
