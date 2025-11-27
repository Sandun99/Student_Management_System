<div class="tab-pane fade show active" id="basic" role="tabpanel">
    <form action="{{ route('teacher.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$teacher->id}}">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder=""
                           value="{{$teacher->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Teacher ID </label>
                    <input type="text"
                           name="t_id"
                           class="form-control"
                           placeholder=""
                           value="{{$teacher->t_id}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text"
                           name="email"
                           class="form-control"
                           placeholder=""
                           value="{{$teacher->email}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>NIC</label>
                    <input type="text"
                           name="nic"
                           class="form-control"
                           placeholder=""
                           value="{{$teacher->nic}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Date of Birth</label>
                    <input type="date"
                           name="dob"
                           value="{{$teacher->dob}}"
                           class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Gender <span class="text-danger">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Mobile Number</label>
                    <input type="text"
                           name="mobile"
                           class="form-control"
                           placeholder=""
                           value="{{$teacher->mobile}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Address</label>
                    <textarea name="address"
                              rows="3"
                              class="form-control"
                              placeholder="">
                        {{ $teacher->address }}
                    </textarea>
                </div>

            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="form-group mb-3">
                        <label>Subject <span class="text-danger">*</span></label>
                        <select name="subjects[]" id="subjects-select" class="form-select" multiple required>
                            @foreach($subjects ?? [] as $subject)
                                <option value="{{ $subject->id }}">
                                    {{ $subject->name }} ({{ $subject->sub_code }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Grade <span class="text-danger">*</span></label>
                        <select name="grade_id" class="form-select" required>
                            <option value="">Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{$teacher->username}}"
                                   placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   value="{{$teacher->password}}"
                                   placeholder="">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>NIC Front</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*"
                               value="{{$teacher->image_1}}"
                               onchange="previewImage(event, 'teacherPreview')">
                        <div class="mt-3">
                            <img id="teacherPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>NIC Back</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="image_2"
                               class="form-control"
                               accept="image/*"
                               value="{{$teacher->image_2}}"
                               onchange="previewImage(event, 'teacherPreview')">
                        <div class="mt-3">
                            <img id="teacherPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                Update Teacher
            </button>
        </div>
    </form>
</div>
