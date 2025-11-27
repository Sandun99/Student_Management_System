<div class="tab-pane fade show active" id="details" role="tabpanel">
    <form action="{{ route('grade.update', $grade->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$grade->id}}">
        <div class="mb-4">
            <label for="gradeName" class="form-label fw-semibold">
                Grade Name <span class="text-danger">*</span>
            </label>
            <input
                type="text"
                id="gradeName"
                name="name"
                class="form-control form-control-lg"
                placeholder="Enter grade (10, 11, 12)"
                value="{{$grade->name}}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Class <span class="text-danger">*</span></label>
            <select name="class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach(\App\Models\Classes::orderBy('name')->get() as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="gradeCode" class="form-label fw-semibold">
                Grade Code
                <span class="text-danger">*</span>
            </label>
            <input
                type="text"
                id="gradeCode"
                name="code"
                class="form-control form-control-lg"
                placeholder="GR/001"
                value="{{$grade->code}}"
                required>
        </div>

        <div class="d-flex gap-2 justify-content-end mt-5">
            <button type="submit" class="btn btn-primary px-4">
                Update Grade
            </button>
        </div>
    </form>
</div>
