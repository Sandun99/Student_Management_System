<div class="row justify-content-center">
    <div class="row g-4">
        <div class="col-md-6">

            <table class="table">
                <tr>
                    <th>Course Name</th>
                    <td><strong>{{ $course->name }}</strong></td>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <td>{{ $course->code }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                       {{ $course->category }}
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>Rs. {{ number_format($course->price, 2) }}</td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td>{{ $course->duration }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $course->start_date?->format('d M, Y')}}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <h5 class="fw-bold mb-3">
                 Assigned Subjects
            </h5>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                @foreach($course->subjects as $subject)
                    <div class="col">
                        <div class="border rounded p-3 bg-light h-100">
                            <h6 class="mb-1">{{ $subject->name }}</h6>
                            <small class="text-muted">
                                Code: {{ $subject->sub_code ?? 'N/A' }}
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
    </div>
</div>
