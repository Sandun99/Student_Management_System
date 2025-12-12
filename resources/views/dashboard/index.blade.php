@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        :root {
            --bg: #0f172a;
            --card-bg: rgba(15, 23, 42, 0.7);
            --border: rgba(255, 255, 255, 0.12);
            --text: #e2e8f0;
            --text-muted: #94a3b8;
        }

        body {
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #1e293b 0%, #1e40af 50%, #5b21b6 100%);
            padding: 2.5rem 0 4rem;
            border-radius: 0 0 40px 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"><path d="M0,100 C300,250 700,50 1000,150 L1000,300 L0,300 Z" fill="rgba(255,255,255,0.08)"/></svg>') bottom/cover no-repeat;
            pointer-events: none;
        }

        .header-title {
            font-weight: 900;
            font-size: 3rem;
            letter-spacing: -0.8px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }

        .stats-grid {
            margin-top: -2.5rem;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 1.4rem 1rem;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            border-radius: 18px 18px 0 0;
            background: var(--gradient);
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.04);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .stat-number {
            font-size: 2.3rem;
            font-weight: 800;
            margin: 0.4rem 0;
            background: linear-gradient(90deg, #a78bfa, #c4b5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .stat-icon {
            font-size: 2.8rem;
            opacity: 0.1;
            position: absolute;
            right: 12px;
            bottom: 8px;
            transition: all 0.4s ease;
        }

        .stat-card:hover .stat-icon {
            opacity: 0.25;
            transform: scale(1.3) rotate(12deg);
        }

        .stat-link {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 0.8rem;
            transition: all 0.3s ease;
        }

        .stat-link:hover {
            color: #e2e8f0;
            gap: 12px;
        }

        .actions-grid {
            margin: 3rem 0;
        }

        .action-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.4rem 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 110px;
        }

        .action-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .action-icon {
            font-size: 2.2rem;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .action-card:hover .action-icon {
            color: #e2e8f0;
            transform: scale(1.1);
        }

        .action-label {
            font-size: 0.95rem;
            color: var(--text);
            font-weight: 500;
        }

        .action-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-top: 0.4rem;
        }

        .action-btn:hover {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 1400px) {
            .header-title { font-size: 2.8rem; }
            .stat-number { font-size: 2.1rem; }
        }

        @media (max-width: 992px) {
            .dashboard-header { padding: 2rem 0 3.5rem; }
            .header-title { font-size: 2.5rem; }
            .stats-grid { margin-top: -2rem; }
            .stat-card { padding: 1.2rem 0.9rem; }
        }

        @media (max-width: 768px) {
            .header-title { font-size: 2.3rem; }
            .stat-number { font-size: 2rem; }
        }
    </style>
@endpush

@section('content')
    <div class="dashboard-header text-white">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="header-title mb-3">
                        Dashboard
                    </h1>
                    <p class="lead opacity-90">Welcome back!</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="fs-5 opacity-80">
                        {{ now()->format('l, j F Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row stats-grid g-4">
            <!-- Teachers -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #8b5cf6, #a78bfa)">
                    <i class="bi bi-person-gear stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalTeachers }}">0</div>
                    <div class="stat-label">Teachers</div>
                    <a href="{{ route('teacher.teacher.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Students -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #10b981, #34d399)">
                    <i class="bi bi-people-fill stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalStudents }}">0</div>
                    <div class="stat-label">Students</div>
                    <a href="{{ route('student.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Courses -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #f59e0b, #fbbf24)">
                    <i class="bi bi-book-half stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalCourses }}">0</div>
                    <div class="stat-label">Courses</div>
                    <a href="{{ route('course.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Subjects -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #ef4444, #f87171)">
                    <i class="bi bi-journal-text stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalSubjects }}">0</div>
                    <div class="stat-label">Subjects</div>
                    <a href="{{ route('subject.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Grades -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #06b6d4, #22d3ee)">
                    <i class="bi bi-building stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalGrades }}">0</div>
                    <div class="stat-label">Grades</div>
                    <a href="{{ route('grade.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Classes -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="stat-card text-white" style="--gradient: linear-gradient(90deg, #8b5cf6, #d946ef)">
                    <i class="bi bi-clock-history stat-icon"></i>
                    <div class="stat-number" data-target="{{ $totalClasses }}">0</div>
                    <div class="stat-label">Classes</div>
                    <a href="{{ route('class.index') }}" class="stat-link">
                        View <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-fluid actions-grid">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <a href="{{ route('profile.index') }}" class="action-card text-decoration-none text-white">
                        <i class="bi bi-person-circle action-icon"></i>
                        <div class="action-label">Profile</div>
                        <span class="action-btn">Edit</span>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <a href="#" class="action-card text-decoration-none text-white">
                        <i class="bi bi-gear action-icon"></i>
                        <div class="action-label">Settings</div>
                        <span class="action-btn">Configure</span>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <a href="#" class="action-card text-decoration-none text-white">
                        <i class="bi bi-question-circle action-icon"></i>
                        <div class="action-label">Help</div>
                        <span class="action-btn">Contact</span>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <form action="{{ route('auth.logout') }}" method="POST" class="action-card text-decoration-none text-white d-flex flex-column align-items-center justify-content-center">
                        @csrf
                        <i class="bi bi-box-arrow-right action-icon"></i>
                        <div class="action-label">Logout</div>
                        <button type="submit" class="action-btn border-0 bg-transparent p-0">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target.querySelector('.stat-number');
                    const target = +counter.getAttribute('data-target');
                    let count = 0;
                    const increment = target / 70;

                    const timer = setInterval(() => {
                        count += increment;
                        if (count >= target) {
                            counter.textContent = target.toLocaleString();
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.ceil(count).toLocaleString();
                        }
                    }, 20);

                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.7 });

        document.querySelectorAll('.stat-card').forEach(card => observer.observe(card));
    </script>
@endpush
