@extends('layouts.app')

@section('content')
    <main class="main-content">
        @include('components.navbar')

        <div class="conatiner-fluid content-inner mt-4 py-0">
            <div class="row" style="margin-top: 60px">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Categories</h4>
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
                                                            <th>Category</th>
                                                            <th style="max-width: 200px;">Description</th>
                                                            <th>Created by</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            <th style="min-width: 100px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        use Carbon\Carbon;
                                                    @endphp
                                                    <tbody>
                                                        @foreach ($categories as $category)
                                                            <tr>
                                                                <td>{{ $category->category_text }}</td>
                                                                <td class="w-50 text-wrap text-truncate" style="max-height: 3.6rem;">{!! nl2br(e($category->description)) !!}</td>
                                                                <td>{{ $category->username }}</td>
                                                                <td>{{ $category->created_at }}</td>
                                                                <td>
                                                                    @if ($category->updated_at == $category->created_at)
                                                                       -
                                                                    @else
                                                                        {{ $category->updated_at}}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        <a class="btn btn-sm btn-icon btn-warning"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Edit" data-original-title="Edit"
                                                                            href="{{ route('categories.edit', $category->slug) }}">
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
@endsection
