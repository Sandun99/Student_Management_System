<div class="tab-pane fade show active" id="description" role="tabpanel">
    <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$course->id}}">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label>Course Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Web Development"
                           value="{{$course->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Course Code</label>
                    <input type="text"
                           name="code"
                           class="form-control"
                           placeholder="IT/012"
                           value="{{$course->code}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Category</label>
                    <select name="category" class="form-select">
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Design">Design</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Business">Business</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Start Date</label>
                    <input type="date"
                           name="start_date"
                           class="form-control"
                           value="{{ $course->start_date?->format('Y-m-d') }}"
                           required>
                </div>


                <div class="form-group mb-3">
                    <label>Duration </label>
                    <input type="text"
                           name="duration"
                           class="form-control"
                           placeholder="(6 Months)"
                           value="{{$course->duration}}"
                           required>
                </div>
            </div>

            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label>Course Price Rs.</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           placeholder="3000.00"
                           step="0.01"
                           value="{{$course->price}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Subjects</label>
                    <select name="subjects[]" id="subjects-select" class="form-select" multiple required>
                        @foreach(\App\Models\Subject::all() as $subject)
                            <option value="{{ $subject->id }}"
                                {{ $course->subjects->pluck('id')->contains($subject->id) ? 'selected' : '' }}>
                                {{ $subject->name }} ({{ $subject->sub_code ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Course Image</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(event)"
                               value="{{$course->image}}">
                        <div class="mt-3">
                            <img id="imagePreview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px; display: none;">
                            <p class="text-muted mt-2 mb-0">Click to upload course thumbnail</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-secondary btn-lg">
                Create Course
            </button>
        </div>
    </form>
</div>
