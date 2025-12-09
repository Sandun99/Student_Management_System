<div class="row justify-content-center">
    <div class="row g-4">
        <div class="col-md-12">

            <h4 class="fw-bold mt-3 text-center">{{ $teacher->name }}</h4>
            <p class="text-muted mb-2 text-center">
                <strong>Teacher ID:</strong> {{ $teacher->t_id }}
            </p>
            <table class="table  mt-4">
                <tr>
                    <th>NIC</th>
                    <td>{{ $teacher->nic }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $teacher->email }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $teacher->mobile}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        {{ $teacher->gender }}
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $teacher->dob?->format('d M, Y') }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $teacher->address }}</td>
                </tr>
                <tr>
                    <th>Assigned Grade</th>
                    @foreach($teacher->grades as $grade)
                        <td>
                            {{$grade->full_name}}
                        </td>
                    @endforeach

                </tr>
            </table>
            <div class="col-md-12 mt-4">
                <h5 class="fw-bold mb-3">
                    Assigned Subjects
                </h5>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach($teacher->subjects as $subject)
                        <div class="col">
                            <div class="border rounded p-3 bg-light h-100">
                                <h6 class="mb-1">{{ $subject->name }}</h6>
                                <small class="text-muted">
                                    Code: {{ $subject->sub_code }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 mt-4">
                    @if($teacher->username || $teacher->password)
                        <div class="col-12">
                            <h5 class="fw-bold mb-3">
                                Account Login
                            </h5>
                            <div class="border rounded p-3 bg-light">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <small class="text-muted">Username</small>
                                        <p class="mb-0"><strong>{{ $teacher->username }}</strong></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted">Password</small>
                                        <p class="mb-0">
                                            <strong>
                                                {{ $teacher->password ? '••••••••' : '—' }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <table class="table">
                        <tr>
                            <th class="col-2 align-middle">
                                NIC Front
                            </th>
                            <td>
                                <img src="{{ asset($teacher->nic_front) }}" alt="img" class="w-50"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2 align-middle">
                                NIC Back
                            </th>
                            <td>
                                <img src="{{ asset($teacher->nic_back) }}" alt="img" class="w-50"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-12 text-center mt-4">
                <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


