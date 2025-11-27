<div class="tab-pane fade show active" id="basic" role="tabpanel">
    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                           value="{{$student->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Date of Birth</label>
                    <input type="date"
                           name="dob"
                           class="form-control"
                           value="{{$student->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>NIC</label>
                    <input type="text"
                           name="nic"
                           class="form-control"
                           placeholder=""
                           value="{{$student->name}}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Gender</label>
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
                           value="{{$student->name}}"
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
                           value="{{$student->name}}"
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
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }} {{ $course->code ? '('. $course->code .')' : '' }}
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
                                    <option value="{{ $grade->id }}">{{ $grade->full_name }}</option>
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
                    <label>NIC Front</label>
                    <div class="border border-dashed rounded p-4 text-center bg-light">
                        <input type="file"
                               name="nic_front"
                               class="form-control"
                               accept="image/*"
                               value="{{$student->nic_front}}"
                               onchange="previewImage(event, 'studentPreview')">
                        <div class="mt-3">
                            <img id="studentPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
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
                               value="{{$student->nic_back}}"
                               onchange="previewImage(event, 'studentPreview')">
                        <div class="mt-3">
                            <img id="studentPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                Create Student
            </button>
        </div>
    </form>
</div>
