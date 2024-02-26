@extends('layouts.app')

@section('content')
    <main class="main-content">
        <!-- Bagian Header -->
        @include('components.navbar')
        <!-- Akhir Bagian Header -->

        <!-- Konten Utama -->
        <div class="container-fluid content-inner mt-n2 py-0">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Questions</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="questionsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $key => $question)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $question->questions_text }}</td>
                                            <td>{{ $question->category_text }}</td>
                                            <td>Scala Likert</td>
                                            <td>
                                                <button class="btn btn-sm btn-icon btn-danger" onclick="deleteRow(this)"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            stroke="currentColor">
                                                            <path
                                                                d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <button type="button" class="btn btn-link" onclick="addNewQuestion()">
                                                <i class="hi hi-plus mr-1"></i> Add New Question
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Kolom Samping -->
                <div class="col-xl-3 col-lg-4">
                    <!-- Form Tambah Kuis dan Survei -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Quizzes & Surveys</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form for adding quizzes and surveys -->
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
                                        <input type="text" class="form-control" id="slug" name="slug" readonly>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="flexSwitchCheckDefault ">Is Active?</label>
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
        <!-- Footer -->
        @include('components.footer')
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

        function addNewQuestion() {
            // Membuat baris baru
            const table = document.getElementById('questionsTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            // Menambahkan sel-sel ke dalam baris baru
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);
            const cell5 = newRow.insertCell(4); // Add cell for delete button

            // Mengisi nilai dari sel-sel tersebut
            cell1.textContent = table.rows.length;
            cell2.innerHTML = '<input type="text" class="form-control" placeholder="Enter question">';
            cell3.innerHTML = document.getElementById('categorySelect')
                .outerHTML; // Memanggil elemen select dari luar skrip
            cell4.textContent = "Scala Likert";
            cell5.innerHTML =
                '<button class="btn btn-sm btn-icon btn-danger" onclick="deleteRow(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">' +
                '<span class="btn-inner">' +
                '<svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">' +
                '<path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>' +
                '<path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>' +
                '<path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>' +
                '</svg>' +
                '</span>' +
                '</button>';

            // Meningkatkan counter untuk nomor urut berikutnya
            questionCounter++;
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Mendapatkan referensi ke tabel
            var table = document.getElementById('questionsTable');
            var tbody = table.getElementsByTagName('tbody')[0];
            var rows = tbody.getElementsByTagName('tr');

            // Memperbarui nomor urut pada setiap baris setelah penghapusan
            for (var i = 0; i < rows.length; i++) {
                rows[i].getElementsByTagName('td')[0].innerHTML = i + 1;
            }
        }
    </script>
@endsection
