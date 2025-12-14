<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '| Dashboard')</title>
    <style id="custom-header-overrides">
        .hover-opacity-100 {
            transition: opacity .3s ease !important;
        }
        .hover-opacity-100:hover {
            opacity: 1 !important;
        }

        .dropdown-item.hover-bg-primary:hover,
        .hover-bg-primary:hover {
            background: rgba(99, 102, 241, 0.25) !important;
            color: white !important;
        }

        .dropdown-item.hover-bg-danger:hover,
        .hover-bg-danger:hover {
            background: rgba(239, 68, 68, 0.25) !important;
            color: white !important;
        }

        .dropdown-item.text-white:hover {
            color: white !important;
        }
    </style>
    <style>
        body {
            font-size: 14px;
        }
    </style>

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

        // delete toast alert
        @if(session('deleted'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('deleted') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#ce1313',
            color: 'white',
            iconColor: 'white'
        });
        Toast.fire();
        @endif


            // update success toast alert
        @if(session('success'))
        const Toast2 = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#e7ae39',
            color: 'white',
            iconColor: 'white'
        });
        Toast2.fire();
        @endif

        // toast for when after creating
        @if(session('create'))
        const Toast3 = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('create') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#3ab61d',
            color: 'white',
            iconColor: 'white'
        });
        Toast3.fire();
        @endif

        // toast for excel import
        @if(session('status'))
        const Toast4 = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('status') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#3ab61d',
            color: 'white',
            iconColor: 'white'
        });
        Toast4.fire();
        @endif
    });
</script>

{{--search script--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('globalSearchInput');
        const exportForm = document.getElementById('exportForm');
        const exportSearchInput = document.getElementById('exportSearch');
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

        // export only search result
        if (exportForm && exportSearchInput) {
            exportForm.addEventListener('submit', function() {
                exportSearchInput.value = searchInput.value.trim();
            });
        }
    });
</script>

{{--sweetalert for updating--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Listen for any button with data-confirm="update"
        document.body.addEventListener('click', function (e) {
            const btn = e.target.closest('button[data-confirm="update"]') ||
                e.target.closest('input[type="submit"][data-confirm="update"]');

            if (!btn) return;

            e.preventDefault();
            const form = btn.closest('form');

            if (!form) return;

            Swal.fire({
                title: 'Save Changes?',
                text: 'Are you sure you want to update this record?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Update',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-secondary mx-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

</script>

{{--export only what u search script--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('globalSearchInput');
        if (!searchInput) return;

        // Find ALL export forms that have the hidden search field
        const exportForms = document.querySelectorAll('form[data-export]');

        const updateHiddenFields = () => {
            const query = searchInput.value.trim().toLowerCase();
            exportForms.forEach(form => {
                const hidden = form.querySelector('input[name="search"]');
                if (hidden) hidden.value = query;
            });
        };

        // Update on every key press
        searchInput.addEventListener('keyup', updateHiddenFields);
        searchInput.addEventListener('search', updateHiddenFields); // when user clears with X

        // Also update right before submit (just in case)
        exportForms.forEach(form => {
            form.addEventListener('submit', updateHiddenFields);
        });
    });
</script>

@stack('scripts')

<script>
    // Universal image preview function - works on all pages and modals
    window.previewImage = function(event, previewId) {
        const preview = document.getElementById(previewId);
        if (!preview) return;

        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    };

    // Re-initialize previews whenever new content is loaded (especially for modals)
    document.addEventListener('DOMContentLoaded', initImagePreviews);

    // Also run when modal content changes (for AJAX-loaded edit forms)
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                initImagePreviews();
            }
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    function initImagePreviews() {
        const previewIds = ['profilePreview', 'nicFrontPreview', 'nicBackPreview', 'previewProfile', 'previewNicFront', 'previewNicBack'];

        previewIds.forEach(id => {
            const img = document.getElementById(id);
            if (img) {
                // Show existing images
                if (img.src && img.src !== location.href && img.src !== '') {
                    img.style.display = 'block';
                }
            }
        });
    }
</script>
</body>
</html>
