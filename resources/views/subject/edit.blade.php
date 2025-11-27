<div class="tab-pane fade show active" id="details" role="tabpanel">
    <form action="{{ route('subject.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$subject->id}}">
        <div class="mb-4">
            <label for="subjectName" class="form-label fw-semibold">
                Subject Name
            </label>
            <input
                type="text"
                id="subjectName"
                name="name"
                class="form-control form-control-lg"
                placeholder="English"
                value="{{$subject->name}}"
                required>
        </div>

        <div class="mb-4">
            <label for="subjectCode" class="form-label fw-semibold">
                Subject Code
            </label>
            <input
                type="text"
                id="subjectCode"
                name="sub_code"
                class="form-control form-control-lg"
                placeholder="EN/2025"
                value="{{$subject->sub_code}}"
                required>
        </div>

        <div class="d-flex gap-2 justify-content-end mt-5">
            <button type="submit" class="btn btn-primary px-4">
                Update Subject
            </button>
        </div>
    </form>
</div>
