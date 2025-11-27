<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '| Dashboard')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    @include('partials.header')

    @include('partials.sidebar')

    @include('partials.popupModels')

    <main class="app-main">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/adminlte.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script src="https://kit.fontawesome.com/70b0d3af29.js" crossorigin="anonymous"></script>

{{--Sweet Alert Script--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[data-delete]').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                const name = this.getAttribute('data-delete') || 'item';

                Swal.fire({
                    title: 'Delete this ' + name + '?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger mx-2',
                        cancelButton: 'btn btn-secondary mx-2'
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'GET';
                        form.action = url;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });

        // === 2. Show ONE success toast ONLY after redirect (no duplicate) ===
        @if(session('deleted'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('deleted') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#28a745',
            color: 'white',
            iconColor: 'white'
        });
        Toast.fire();
        @endif
    });
</script>

{{--search script--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('globalSearchInput');
        if (!searchInput) return;

        const tableBody = document.getElementById('searchableTable');
        const rows = tableBody?.querySelectorAll('tr') || [];

        searchInput.addEventListener('keyup', function () {
            const query = this.value.trim().toLowerCase();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const isVisible = query === '' || text.includes(query);

                row.style.display = isVisible ? '' : 'none';
            });

            let noResultsRow = tableBody.querySelector('tr.no-results');
            if (query !== '') {
                const visibleRows = Array.from(rows).filter(r => r.style.display !== 'none' && !r.classList.contains('no-results'));
                if (visibleRows.length === 0) {
                    if (!noResultsRow) {
                        noResultsRow = document.createElement('tr');
                        noResultsRow.className = 'no-results';
                        noResultsRow.innerHTML = `<td colspan="${tableBody.querySelector('tr')?.children.length || 8}" class="text-center text-muted py-4">No results found for "<strong>${this.value}</strong>"</td>`;
                        tableBody.appendChild(noResultsRow);
                    }
                } else if (noResultsRow) {
                    noResultsRow.remove();
                }
            }
        });

        searchInput.addEventListener('search', () => {
            if (searchInput.value === '') {
                document.querySelector('tr.no-results')?.remove();
                rows.forEach(row => row.style.display = '');
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>
