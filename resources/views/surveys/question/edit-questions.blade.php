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
                                    <h3>{{ $type->type_name }}</h3>
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
            <!-- Konten Utama -->
        </div>
        <div class="container-fluid content-inner mt-n2 py-0">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4 class="card-title">Questions</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST"
                                action="{{ $questions->isEmpty() ? route('questions.store', $type->id) : route('questions_types.update', $type->id) }}">
                                @csrf
                                <!-- Tabel pertanyaan -->
                                <table class="table" id="questionsTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Category</th>
                                            <th>Questions Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $key => $question)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <textarea class="form-control" rows="1" name="questions_text[]">{{ $question->questions_text }}</textarea>
                                                </td>
                                                <td>
                                                    <select class="form-select" name="category[]">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                @if ($category->category_text == $question->category_text) selected @endif>
                                                                {{ $category->category_text }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>Scala Likert (1-6)</td>
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
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Icon SVG di sini -->
                                                    </svg>
                                                    Add New Question
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button id="submitQuestionsButton" type="submit" class="btn btn-primary ">
                                    {{ $questions->isEmpty() ? 'Create questions' : 'Update questions' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Kolom Samping -->
                <div class="col-xl-3 col-lg-4 ">
                    <!-- Form Tambah Kuis dan Survei -->
                    <div class="card sticky-top">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Quizzes & Surveys</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form for adding quizzes and surveys -->
                            <form method="POST" action="{{ route('type.update', $type->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="tittype_namele" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" aria-describedby="title" placeholder="Input here..."
                                            name="type_name" autofocus value="{{ $type->type_name }}">
                                        @error('type_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" readonly
                                            value="{{ $type->slug }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="flexSwitchCheckDefault" data-bs-toggle="tooltip" data-bs-placement="top">Is
                                        Active?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            name="is_active" value="1"
                                            @if ($type->is_active) checked @endif onchange="toggleActive(this)">
                                        <label class="form-check-label" for="flexSwitchCheckDefault" id="toggleLabel">
                                            @if ($type->is_active)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" id="updateTypeButton" class="btn btn-primary" disabled>Update
                                    type</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('components.footer')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

        function addNewQuestion() {
            // Tambahkan baris baru
            const table = document.getElementById('questionsTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            // Menambahkan sel-sel ke dalam baris baru
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);
            const cell5 = newRow.insertCell(4);

            // Mengisi nilai dari sel-sel tersebut
            cell1.textContent = table.rows.length;
            cell2.innerHTML = '<textarea class="form-control" rows="1" name="questions_text[]"></textarea>';
            cell3.innerHTML = `
        <select class="form-select" name="category[]">
            <option value="1">REALISTIC</option>
            <option value="2">INVESTIGATIVE</option>
            <option value="3">ARTISTIC</option>
            <option value="4">SOCIAL</option>
            <option value="5">ENTERPRISING</option>
            <option value="6">CONVENTIONAL</option>
        </select>`;
            cell4.textContent = "Scala Likert";
            cell5.innerHTML = `
        <button class="btn btn-sm btn-icon btn-danger" onclick="deleteRow(this)"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
            <span class="btn-inner">
                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
        </button>`;

            // Meningkatkan counter untuk nomor urut berikutnya
            questionCounter++;

            // Memanggil fungsi untuk memperbarui status tombol "Create Question"
            toggleSubmitButtonState();
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

        function toggleActive(checkbox) {
            if (checkbox.checked) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will deactivate other active surveys!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, activate it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Handle activation logic here
                        // You might want to make an AJAX call to the server to update the active status
                        // For now, you can proceed with form submission
                    } else {
                        // Uncheck the checkbox if user cancels the activation
                        checkbox.checked = false;
                    }
                })
            }
        }

        // Fungsi untuk mengirim data ke controller menggunakan AJAX
        function sendDataToController() {
            // Merapihkan data
            var data = prepareData();
            console.log(data);

            // Mengirim data menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "{{ route('questions.store', $type->id) }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    questions: data // Mengirim data yang sudah dirapihkan
                },
                success: function(response) {
                    // Handle response dari server jika diperlukan
                    console.log('AJAX Response:', response);

                    let url = "{{ route('type.index') }}";
                    // window.location.href = url.replace(':slug', result.slug);
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting questions', error);
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                }
            });
        }

        // Fungsi untuk mengirim data ke server menggunakan AJAX
    function updateQuestions() {
        // Menyiapkan data untuk dikirim
        var formData = new FormData(document.getElementById('questionsForm'));

        // Melakukan request AJAX
        $.ajax({
            url: "{{ route('questions.update', $type->id) }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Tampilkan pesan sukses atau lakukan tindakan lain yang sesuai
                console.log('Questions updated successfully:', response);
                // Misalnya, Anda dapat menampilkan pesan berhasil menggunakan SweetAlert
                Swal.fire({
                    title: 'Success',
                    text: 'Questions updated successfully!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan, mungkin menampilkan pesan kesalahan atau melakukan tindakan lain
                console.error('Error updating questions:', error);
                // Misalnya, Anda dapat menampilkan pesan kesalahan menggunakan SweetAlert
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to update questions. Please try again later.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }

        // Fungsi untuk merapikan data dari form sebelum dikirim
        function prepareData() {
            var questions = [];
            var categories = [];

            // Mendapatkan referensi ke tabel
            var table = document.getElementById('questionsTable');
            var tbody = table.getElementsByTagName('tbody')[0];
            var rows = tbody.getElementsByTagName('tr');

            // Loop melalui setiap baris tabel
            for (var i = 0; i < rows.length; i++) {
                var questionText = rows[i].querySelector('textarea[name="questions_text[]"]').value;
                var category = rows[i].querySelector('select[name="category[]"]').value;

                questions.push(questionText);
                categories.push(category);
            }

            // Menggabungkan data pertanyaan dan kategori menjadi satu array multidimensional
            var preparedData = [];
            for (var j = 0; j < questions.length; j++) {
                preparedData.push({
                    questions_text: questions[j],
                    category: categories[j]
                });
            }

            return preparedData;
        }

        // Mendapatkan elemen-elemen yang ingin dipantau perubahannya
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const is_activeCheckbox = document.getElementById('flexSwitchCheckDefault');
        const updateTypeButton = document.getElementById('updateTypeButton');

        // Mendengarkan perubahan pada elemen-elemen tersebut
        titleInput.addEventListener('input', toggleButtonState);
        slugInput.addEventListener('input', toggleButtonState);
        is_activeCheckbox.addEventListener('change', toggleButtonState);

        function toggleButtonState() {
            // Mengecek apakah ada perubahan pada input form atau form select
            const isTitleChanged = titleInput.value !== "{{ $type->type_name }}";
            const isSlugChanged = slugInput.value !== "{{ $type->slug }}";
            const isIsActiveChanged = is_activeCheckbox.checked !== {{ $type->is_active ? 'true' : 'false' }};

            // Mengaktifkan tombol "Update type" jika ada perubahan, jika tidak, dinonaktifkan
            updateTypeButton.disabled = !(isTitleChanged || isSlugChanged || isIsActiveChanged);
        }
    </script>
@endsection
