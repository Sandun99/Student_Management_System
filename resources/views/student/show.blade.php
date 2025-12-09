<div class="row justify-content-center">
    <div class="row g-4">
        <div class="col-md-12">
            <p class="text-center">
                <img src="{{ asset($student->profile) }}" alt="img" style="width: 200px; height: 200px;" class="rounded-circle border border-dark"/>
            </p>
            <h4 class="fw-bold mt-3 text-center">{{ $student->name }}</h4>
            <p class="text-muted mb-2 text-center">
                <strong>Reg No:</strong> {{ $student->reg_no }}
            </p>

            <table class="table mt-4 ">
                <tr>
                    <th>NIC</th>
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
                <tr>
                    <th>Course Details</th>
                    <td>{{ $student->course->name }} - {{ $student->course->code }}</td>
                </tr>
            </table>
        </div>

        <div class="row mt-3">
            <div class="row mt-3">
                <table class="table">
                    <tr>
                        <th class="col-2 align-middle">
                            NIC Front
                        </th>
                        <td>
                            <img src="{{ asset($student->nic_front) }}" alt="img" class="w-50"/>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-2 align-middle">
                            NIC Back
                        </th>
                        <td>
                            <img src="{{ asset($student->nic_back) }}" alt="img" class="w-50"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12  mt-4">
            <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>
