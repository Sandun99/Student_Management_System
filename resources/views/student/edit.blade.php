<div class="tab-pane fade show active" id="basic" role="tabpanel">
    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$student->id}}">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder=""
                           value="{{$student->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Reg_No </label>
                    <input type="text"
                           name="reg_no"
                           class="form-control"
                           placeholder="ST/0000"
                           value="{{$student->reg_no}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Date of Birth</label>
                    <input type="date"
                           name="dob"
                           class="form-control"
                           value="{{ $student->dob?->format('Y-m-d') }}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>NIC</label>
                    <input type="text"
                           name="nic"
                           class="form-control"
                           placeholder=""
                           value="{{$student->nic}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-select" required>
                        <option value="male"   {{ $student->gender == 'male'   ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Mobile Number</label>
                    <input type="text"
                           name="mobile"
                           class="form-control"
                           placeholder=""
                           value="{{$student->mobile}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Address</label>
                    <textarea
                        name="address"
                        rows="3"
                        class="form-control"
                        placeholder="">
                        {{ $student->address }}
                        </textarea>
                </div>

                <div class="form-group mb-3">
                    <label>email</label>
                    <input type="text"
                           name="email"
                           class="form-control"
                           placeholder=""
                           value="{{$student->email}}"
                           required>
                </div>

            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Course </label>
                            <select name="course_id" class="form-select" required>
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }} {{ $course->code ? "($course->code)" : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Grade</label>
                            <select name="grade_id" class="form-select" required>
                                <option value="">-- Select Grade --</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ $student->grade_id == $grade->id ? 'selected' : '' }}>
                                        {{ $grade->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{$student->username}}"
                                   placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   value="{{$student->password}}"
                                   placeholder="">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Profile Picture</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="profile"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(event, 'profilePreview')">
                        @if($student->profile)
                            <div class="mt-3">
                                <img id="profilePreview"
                                     src="{{ asset($student->profile) }}"
                                     alt="Profile"
                                     class="img-fluid rounded-circle"
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @else
                            <div class="mt-3">
                                <img id="profilePreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                            </div>
                        @endif
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
                        @if($student->nic_front)
                            <div class="mt-3">
                                <img id="nicFrontPreview"
                                     src="{{ asset($student->nic_front) }}"
                                     alt="NIC Front"
                                     class="img-fluid"
                                     style="width: 300px; height: 150px; object-fit: cover;">
                            </div>
                        @else
                            <div class="mt-3">
                                <img id="nicFrontPreview" src="" alt="Preview" class="img-fluid" style="width: 300px; height: 150px; object-fit: cover; display: none;">
                            </div>
                        @endif
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
                        @if($student->nic_back)
                            <div class="mt-3">
                                <img id="nicBackPreview"
                                     src="{{ asset($student->nic_back) }}"
                                     alt="NIC Back"
                                     class="img-fluid"
                                     style="width: 300px; height: 150px; object-fit: cover;">
                            </div>
                        @else
                            <div class="mt-3">
                                <img id="nicBackPreview" src="" alt="Preview" class="img-fluid" style="width: 300px; height: 150px; object-fit: cover; display: none;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button type="submit"
                class="btn btn-secondary btn-lg w-100 mt-4"
                data-confirm="update">
            Update Student
        </button>
    </form>
</div>
@push('scripts')
    <script>
        function previewImage(event, previewId) {
            const preview = document.getElementById(previewId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
