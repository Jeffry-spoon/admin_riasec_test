@extends('layouts.app') @section('content')
    <main class="main-content">
        @include('components.navbar')
        <div class="position-relative iq-banner">
            <!--Nav Start-->

            <div class="iq-navbar-header" style="height: 215px">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1>Hello {{ auth()->user()->name }}!</h1>
                                    <p>
                                        We are on a mission to help users like you
                                        build successful RIASEC project.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ asset('images/dashboard/top-header.png') }}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" />
                </div>
            </div>
            <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="row row-cols-1">
                        <div class="overflow-hidden d-slider1">
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                                <div class="flex-wrap card-header d-flex justify-content-between">
                                    <div class="header-title m">
                                        <h4 class="mb-2 card-title">
                                            Result Summary
                                        </h4>
                                        <p class="mb-4">
                                            <svg class="me-1 text-primary icon-24" width="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1583 8.23285C16.1583 10.5825 14.2851 12.4666 11.949 12.4666C9.61292 12.4666 7.73974 10.5825 7.73974 8.23285C7.73974 5.88227 9.61292 4 11.949 4C14.2851 4 16.1583 5.88227 16.1583 8.23285ZM11.949 20C8.51785 20 5.58809 19.456 5.58809 17.2802C5.58809 15.1034 8.49904 14.5396 11.949 14.5396C15.3802 14.5396 18.31 15.0836 18.31 17.2604C18.31 19.4362 15.399 20 11.949 20ZM17.9571 8.30922C17.9571 9.50703 17.5998 10.6229 16.973 11.5505C16.9086 11.646 16.9659 11.7748 17.0796 11.7946C17.2363 11.8216 17.3984 11.8369 17.5631 11.8414C19.2062 11.8846 20.6809 10.821 21.0883 9.21974C21.6918 6.84123 19.9198 4.7059 17.6634 4.7059C17.4181 4.7059 17.1835 4.73201 16.9551 4.77884C16.9238 4.78605 16.8907 4.80046 16.8728 4.82838C16.8513 4.8626 16.8674 4.90853 16.8889 4.93825C17.5667 5.8938 17.9571 7.05918 17.9571 8.30922ZM20.6782 13.5126C21.7823 13.7296 22.5084 14.1727 22.8093 14.8166C23.0636 15.3453 23.0636 15.9586 22.8093 16.4864C22.349 17.4851 20.8654 17.8058 20.2887 17.8886C20.1696 17.9066 20.0738 17.8031 20.0864 17.6833C20.3809 14.9157 18.0377 13.6035 17.4315 13.3018C17.4055 13.2883 17.4002 13.2676 17.4028 13.255C17.4046 13.246 17.4154 13.2316 17.4351 13.2289C18.7468 13.2046 20.1571 13.3847 20.6782 13.5126ZM6.43711 11.8413C6.60186 11.8368 6.76304 11.8224 6.92063 11.7945C7.03434 11.7747 7.09165 11.6459 7.02718 11.5504C6.4004 10.6228 6.04313 9.50694 6.04313 8.30913C6.04313 7.05909 6.43353 5.89371 7.11135 4.93816C7.13284 4.90844 7.14806 4.86251 7.12746 4.82829C7.10956 4.80127 7.07553 4.78596 7.04509 4.77875C6.81586 4.73192 6.58127 4.70581 6.33593 4.70581C4.07951 4.70581 2.30751 6.84114 2.91191 9.21965C3.31932 10.8209 4.79405 11.8845 6.43711 11.8413ZM6.59694 13.2545C6.59962 13.268 6.59425 13.2878 6.56918 13.3022C5.9621 13.6039 3.61883 14.9161 3.91342 17.6827C3.92595 17.8034 3.83104 17.9061 3.71195 17.889C3.13531 17.8061 1.65163 17.4855 1.19139 16.4867C0.936203 15.9581 0.936203 15.3457 1.19139 14.817C1.49225 14.1731 2.21752 13.73 3.32156 13.512C3.84358 13.385 5.25294 13.2049 6.5656 13.2292C6.5853 13.2319 6.59515 13.2464 6.59694 13.2545Z"
                                                    fill="currentColor" />
                                            </svg>
                                            {{ $countResults }} pengerjaan di minggu ini, dari
                                            <strong>{{ \Carbon\Carbon::parse($formattedStartOfWeek)->format('Y-m-d') }}</strong>
                                            hingga
                                            <strong>{{ \Carbon\Carbon::parse($formattedEndOfWeek)->format('Y-m-d') }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="accordion" id="accordionExample">
                                        @if (count($grouped) > 0)
                                            @foreach ($grouped as $eventId => $resultGroup)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $eventId }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $eventId }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $eventId }}">
                                                            {{ $resultGroup[0]->title }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $eventId }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $eventId }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive" style="overflow-x: auto;">
                                                                <table id="basic-table" class="table mb-0 table-striped"
                                                                    role="grid">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>User</th>
                                                                            <th>R</th>
                                                                            <th>I</th>
                                                                            <th>A</th>
                                                                            <th>S</th>
                                                                            <th>E</th>
                                                                            <th>C</th>
                                                                            <th>Test Date</th>
                                                                            <th>Start Time</th>
                                                                            <th>End Time</th>
                                                                            <th>Completion Time</th>
                                                                            <th>Email</th>
                                                                            <th>Grade</th>
                                                                            <th>School Name</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($resultGroup as $result)
                                                                            <tr>
                                                                                <td>{{ $result->name }}</td>
                                                                                @php
                                                                                $score = json_decode($result->score, true);
                                                                            @endphp
                                                                            @if (isset($score['REALISTIC']))
                                                                                <td>{{ $score['REALISTIC'] }}</td>
                                                                            @elseif(isset($score['R']))
                                                                                <td>{{ $score['R'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif

                                                                            @if (isset($score['INVESTIGATIVE']))
                                                                                <td>{{ $score['INVESTIGATIVE'] }}</td>
                                                                            @elseif(isset($score['I']))
                                                                                <td>{{ $score['I'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif
                                                                            @if (isset($score['ARTISTIC']))
                                                                                <td>{{ $score['ARTISTIC'] }}</td>
                                                                            @elseif(isset($score['A']))
                                                                                <td>{{ $score['A'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif
                                                                            @if (isset($score['SOCIAL']))
                                                                                <td>{{ $score['SOCIAL'] }}</td>
                                                                            @elseif(isset($score['S']))
                                                                                <td>{{ $score['S'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif
                                                                            @if (isset($score['ENTERPRISING']))
                                                                                <td>{{ $score['ENTERPRISING'] }}</td>
                                                                            @elseif(isset($score['E']))
                                                                                <td>{{ $score['E'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif
                                                                            @if (isset($score['CONVENTIONAL']))
                                                                                <td>{{ $score['CONVENTIONAL'] }}</td>
                                                                            @elseif(isset($score['C']))
                                                                                <td>{{ $score['C'] }}</td>
                                                                            @else
                                                                                <td>N/A</td>
                                                                            @endif
                                                                            <td>{{ $result->created_at }}</td>
                                                                            <td>{{ $result->start_time }}</td>
                                                                            <td>{{ $result->end_time }}</td>
                                                                            <td>{{ $result->difference }}</td>
                                                                            <td>{{ $result->email }}</td>
                                                                            <td>{{ $result->education_level }}</td>
                                                                            <td>{{ $result->school_name }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="accordion-item d-flex justify-content-center align-items-center" style="height: 50px">
                                                <p class="text-black-50 accordion-header">Tidak ada test yang
                                                    dikerjakan minggu ini untuk sementara</p>
                                                <div class="accordion-collapse collapse" aria-labelledby=""
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p class="text-center text-black-50">Tidak ada test yang
                                                            dikerjakan minggu ini untuk sementara</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card" data-aos="fade-up" data-aos-delay="500">
                                <div class="text-center card-body d-flex justify-content-around">
                                    <div>
                                        @if ($totalResult >= 1000000)
                                            <h2 class="mb-2">
                                                {{ $totalResult / 1000000 }} M
                                            </h2>
                                        @elseif($totalResult >= 1000)
                                            <h2 class="mb-2">
                                                {{ $totalResult / 1000 }} K
                                            </h2>
                                        @else
                                            <h2 class="mb-2">{{ $totalResult }}</h2>
                                        @endif
                                        <p class="mb-0 text-gray">
                                            Total Pengerjaan
                                        </p>
                                    </div>
                                    <hr class="hr-vertial" />
                                    <div>
                                        @if ($totalUser >= 1000000)
                                            <h2 class="mb-2">
                                                {{ $totalUser / 1000000 }} M
                                            </h2>
                                        @elseif($totalUser >= 1000)
                                            <h2 class="mb-2">
                                                {{ $totalUser / 1000 }} K
                                            </h2>
                                        @else
                                            <h2 class="mb-2">{{ $totalUser }}</h2>
                                        @endif
                                        <p class="mb-0 text-gray">Total Peserta</p>
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
{{-- <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                                <div class="flex-wrap card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="mb-2 card-title">
                                            Result Summary
                                        </h4>
                                        <p class="mb-0">
                                            <svg class="me-1 text-primary icon-24" width="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1583 8.23285C16.1583 10.5825 14.2851 12.4666 11.949 12.4666C9.61292 12.4666 7.73974 10.5825 7.73974 8.23285C7.73974 5.88227 9.61292 4 11.949 4C14.2851 4 16.1583 5.88227 16.1583 8.23285ZM11.949 20C8.51785 20 5.58809 19.456 5.58809 17.2802C5.58809 15.1034 8.49904 14.5396 11.949 14.5396C15.3802 14.5396 18.31 15.0836 18.31 17.2604C18.31 19.4362 15.399 20 11.949 20ZM17.9571 8.30922C17.9571 9.50703 17.5998 10.6229 16.973 11.5505C16.9086 11.646 16.9659 11.7748 17.0796 11.7946C17.2363 11.8216 17.3984 11.8369 17.5631 11.8414C19.2062 11.8846 20.6809 10.821 21.0883 9.21974C21.6918 6.84123 19.9198 4.7059 17.6634 4.7059C17.4181 4.7059 17.1835 4.73201 16.9551 4.77884C16.9238 4.78605 16.8907 4.80046 16.8728 4.82838C16.8513 4.8626 16.8674 4.90853 16.8889 4.93825C17.5667 5.8938 17.9571 7.05918 17.9571 8.30922ZM20.6782 13.5126C21.7823 13.7296 22.5084 14.1727 22.8093 14.8166C23.0636 15.3453 23.0636 15.9586 22.8093 16.4864C22.349 17.4851 20.8654 17.8058 20.2887 17.8886C20.1696 17.9066 20.0738 17.8031 20.0864 17.6833C20.3809 14.9157 18.0377 13.6035 17.4315 13.3018C17.4055 13.2883 17.4002 13.2676 17.4028 13.255C17.4046 13.246 17.4154 13.2316 17.4351 13.2289C18.7468 13.2046 20.1571 13.3847 20.6782 13.5126ZM6.43711 11.8413C6.60186 11.8368 6.76304 11.8224 6.92063 11.7945C7.03434 11.7747 7.09165 11.6459 7.02718 11.5504C6.4004 10.6228 6.04313 9.50694 6.04313 8.30913C6.04313 7.05909 6.43353 5.89371 7.11135 4.93816C7.13284 4.90844 7.14806 4.86251 7.12746 4.82829C7.10956 4.80127 7.07553 4.78596 7.04509 4.77875C6.81586 4.73192 6.58127 4.70581 6.33593 4.70581C4.07951 4.70581 2.30751 6.84114 2.91191 9.21965C3.31932 10.8209 4.79405 11.8845 6.43711 11.8413ZM6.59694 13.2545C6.59962 13.268 6.59425 13.2878 6.56918 13.3022C5.9621 13.6039 3.61883 14.9161 3.91342 17.6827C3.92595 17.8034 3.83104 17.9061 3.71195 17.889C3.13531 17.8061 1.65163 17.4855 1.19139 16.4867C0.936203 15.9581 0.936203 15.3457 1.19139 14.817C1.49225 14.1731 2.21752 13.73 3.32156 13.512C3.84358 13.385 5.25294 13.2049 6.5656 13.2292C6.5853 13.2319 6.59515 13.2464 6.59694 13.2545Z"
                                                    fill="currentColor" />
                                            </svg>
                                            {{ $countResults }} pengerjaan di minggu ini, dari
                                            <strong>{{ \Carbon\Carbon::parse($formattedStartOfWeek)->format('Y-m-d') }}</strong>
                                            hingga
                                            <strong>{{ \Carbon\Carbon::parse($formattedEndOfWeek)->format('Y-m-d') }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="mt-4 table-responsive">
                                        <table id="basic-table" class="table mb-0 table-striped" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>R</th>
                                                    <th>I</th>
                                                    <th>A</th>
                                                    <th>S</th>
                                                    <th>E</th>
                                                    <th>C</th>
                                                    <th>Test Date</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>School Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($resultsSummary) > 0)
                                                    @foreach ($resultsSummary as $result)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6>
                                                                        {{ $result->name }}
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            @php
                                                            $score = json_decode($result->score, true); @endphp
                                                            @if (isset($score['REALISTIC']))
                                                                <td>{{ $score['REALISTIC'] }}</td>
                                                            @elseif(isset($score['R']))
                                                                <td>{{ $score['R'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif

                                                            @if (isset($score['INVESTIGATIVE']))
                                                                <td>{{ $score['INVESTIGATIVE'] }}</td>
                                                            @elseif(isset($score['I']))
                                                                <td>{{ $score['I'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif
                                                            @if (isset($score['ARTISTIC']))
                                                                <td>{{ $score['ARTISTIC'] }}</td>
                                                            @elseif(isset($score['A']))
                                                                <td>{{ $score['A'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif
                                                            @if (isset($score['SOCIAL']))
                                                                <td>{{ $score['SOCIAL'] }}</td>
                                                            @elseif(isset($score['S']))
                                                                <td>{{ $score['S'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif
                                                            @if (isset($score['ENTERPRISING']))
                                                                <td>{{ $score['ENTERPRISING'] }}</td>
                                                            @elseif(isset($score['E']))
                                                                <td>{{ $score['E'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif
                                                            @if (isset($score['CONVENTIONAL']))
                                                                <td>{{ $score['CONVENTIONAL'] }}</td>
                                                            @elseif(isset($score['C']))
                                                                <td>{{ $score['C'] }}</td>
                                                            @else
                                                                <td>N/A</td>
                                                            @endif
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i') }}
                                                            </td>
                                                            <td>
                                                                {{ $result->email }}
                                                            </td>
                                                            <td>
                                                                {{ $result->phone_number }}
                                                            </td>
                                                            <td>
                                                                {{ $result->school_name }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="12" class="text-center text-black-50">Tidak ada test yang dikerjakan
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
                </div> --}}
