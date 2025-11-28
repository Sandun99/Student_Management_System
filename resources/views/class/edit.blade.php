<div class="tab-pane fade show active" id="details" role="tabpanel">
    <form action="{{ route('class.update', $classes->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$classes->id}}">
        <div class="mb-4">
            <label for="className" class="form-label fw-semibold">
                Class Name
            </label>
            <input
                type="text"
                id="className"
                name="name"
                class="form-control form-control-lg"
                placeholder="Enter class name"
                value="{{$classes->name}}"
                required>
        </div>

        <div class="mb-4">
            <label for="classCode" class="form-label fw-semibold">
                Class Code
            </label>
            <input
                type="text"
                id="classCode"
                name="code"
                class="form-control form-control-lg"
                placeholder="CL/001"
                value="{{$classes->code}}"
                required>
        </div>

        <div class="d-flex gap-2 justify-content-end mt-5">
            <button type="submit"
                    class="btn btn-secondary btn-lg w-100 mt-4"
                    data-confirm="update">
                Update Class
            </button>
        </div>
    </form>
</div>
