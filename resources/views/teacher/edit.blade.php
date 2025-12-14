<div class="tab-pane fade show active" id="basic" role="tabpanel">
    <form action="{{ route('teacher.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $teacher->id }}">

        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $teacher->name }}"
                           placeholder="Full Name" required>
                </div>
                <div class="form-group mb-3">
                    <label>Teacher ID</label>
                    <input type="text"
                           name="t_id"
                           class="form-control mt-2"
                           value="{{ $teacher->t_id }}"
                           placeholder="Teacher ID"
                           required>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control mt-2"
                        value="{{ $teacher->email }}"
                        placeholder="Email"
                        required>
                </div>
                <div class="form-group mb-3">
                    <label>NIC</label>
                    <input type="text"
                           name="nic"
                           class="form-control mt-2"
                           value="{{ $teacher->nic }}"
                           placeholder="NIC"
                           required>
                </div>
                <div class="form-group mb-3">
                    <label>Date Of Birth</label>
                    <input type="date"
                           name="dob"
                           class="form-control mt-2"
                           value="{{ $teacher->dob?->format('Y-m-d') }}">
                </div>
                <div class="form-group mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control mt-2" required>
                        <option value="male"   {{ $teacher->gender == 'male'   ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Mobile</label>
                    <input type="text"
                           name="mobile"
                           class="form-control mt-2"
                           value="{{ $teacher->mobile }}"
                           placeholder="Mobile"
                           required>
                </div>
                <div class="form-group mb-3">
                    <label>Address</label>
                    <textarea name="address"
                              class="form-control mt-2"
                              rows="2"
                              placeholder="Address">
                        {{ $teacher->address }}
                    </textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label>Subjects</label>
                    <select name="subjects[]" id="subjects-select" class="form-select" multiple required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}"
                                {{ $teacher->subjects->contains($subject->id) ? 'selected' : '' }}>
                                {{ $subject->name }} ({{ $subject->sub_code }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Grade</label>
                    <select name="grades[]" id="grades-select" class="form-select" multiple required>
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}"
                                {{ $teacher->grades->contains($grade->id) ? 'selected' : '' }}>
                                {{ $grade->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control mt-2" value="{{ $teacher->username }}" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label mb-3">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ $teacher->password }}" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>Profile Picture</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light d-flex align-items-center justify-content-center flex-column">
                        <input type="file"
                               name="profile"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(event, 'profilePreview')">
                        <div class="mt-3">
                            <img id="profilePreview"
                                 src="{{ $teacher->profile ? asset($teacher->profile) : '' }}"
                                 alt="Profile Preview"
                                 class="img-fluid rounded-circle center item"
                                 style="width: 150px; height: 150px; object-fit: cover; {{ $teacher->profile ? '' : 'display: none;' }}">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>NIC Front</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="nic_front"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(event, 'nicFrontPreview')">
                        <div class="mt-3">
                            <img id="nicFrontPreview"
                                 src="{{ $teacher->nic_front ? asset($teacher->nic_front) : '' }}"
                                 alt="NIC Front Preview"
                                 class="img-fluid"
                                 style="width: 300px; height: 150px; object-fit: cover; {{ $teacher->nic_front ? '' : 'display: none;' }}">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>NIC Back</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="nic_back"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(event, 'nicBackPreview')">
                        <div class="mt-3">
                            <img id="nicBackPreview"
                                 src="{{ $teacher->nic_back ? asset($teacher->nic_back) : '' }}"
                                 alt="NIC Back Preview"
                                 class="img-fluid"
                                 style="width: 300px; height: 150px; object-fit: cover; {{ $teacher->nic_back ? '' : 'display: none;' }}">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="btn btn-secondary btn-lg w-100 mt-4"
                    data-confirm="update">
                Update Teacher
            </button>
        </div>
    </form>
</div>
