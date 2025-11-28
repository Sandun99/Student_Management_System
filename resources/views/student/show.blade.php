<div class="row justify-content-center">
    <div class="row g-4">
        <div class="col-md-12">

            <h4 class="fw-bold mt-3 text-center">{{ $student->name }}</h4>
            <p class="text-muted mb-2 text-center">
                <strong>Reg No:</strong> {{ $student->reg_no }}
            </p>

            <table class="table mt-4 ">
                <tr>
                    <th width="40%">NIC</th>
                    <td><strong>{{ $student->nic }}</strong></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $student->dob?->format('d M, Y') }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        {{ $student->gender}}
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $student->mobile }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $student->address}}</td>
                </tr>
                <tr>
                    <th>Grades</th>
                    <td>{{ $student->grade->full_name }}</td>
                </tr>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">
                            Course Details
                        </h5>
                        <div class="row g-3">
                            <div class="border rounded p-3 bg-light h-100">
                                <strong>
                                    {{ $student->course->name }}
                                    <small class="text-muted d-block">{{ $student->course->code }}</small>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($student->username || $student->password)
                            <div class="col-12">
                                <h5 class="fw-bold mb-3">
                                    Account Login
                                </h5>
                                <div class="border rounded p-3 bg-light">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <small class="text-muted">Username</small>
                                            <p class="mb-0"><strong>{{ $student->username }}</strong></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <small class="text-muted">Password</small>
                                            <p class="mb-0">
                                                <strong>
                                                    {{ $student->password ? '••••••••' : '—' }}
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>


{{--                @if($student->nic_back ?? false)--}}
{{--                    <div class="col-12">--}}
{{--                        <h5 class="fw-bold mb-3">--}}
{{--                            NIC Back Side--}}
{{--                        </h5>--}}
{{--                        <img src="{{ asset('storage/' . $student->nic_back) }}"--}}
{{--                             alt="NIC Back"--}}
{{--                             class="img-fluid rounded shadow"--}}
{{--                             style="max-height: 200px; object-fit: contain; background: #f8f9fa;">--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($student->nic_front ?? false)--}}
{{--                    <img src="{{ asset('storage/' . $student->nic_front) }}"--}}
{{--                         alt="{{ $student->name }}"--}}
{{--                         class="img-fluid rounded shadow mb-4"--}}
{{--                         style="max-height: 280px; object-fit: cover; border: 4px solid #fff;">--}}
{{--                @else--}}
{{--                    <div class="bg-light border rounded d-flex align-items-center justify-content-center mb-4 shadow"--}}
{{--                         style="height: 280px;">--}}
{{--                        <i class="bi bi-person-fill fs-1 text-muted"></i>--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>

