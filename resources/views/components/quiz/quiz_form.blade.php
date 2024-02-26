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
                    <input type="text" class="form-control" id="slug" name="slug"
                        readonly>
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
