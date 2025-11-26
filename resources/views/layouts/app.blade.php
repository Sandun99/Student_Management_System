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
    function deleteButton(id, prefix) {
        if (!prefix) {
            Swal.fire('Error!', 'Delete failed: prefix missing (grade/course/student)', 'error');
            console.error('deleteButton: prefix is required! Example: deleteButton(5, "grade")');
            return;
        }

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-danger mx-3',
                cancelButton: 'btn btn-secondary mx-3'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const url = `/${prefix}/delete/${id}`;

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network error or route not found');
                        }
                        return response.json();
                    })
                    .then(res => {
                        const row = document.querySelector(`tr[data-id="${id}"]`);
                        if (row) row.remove();

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            background: '#28a745',
                            color: 'white',
                            iconColor: 'white'
                        });
                        Toast.fire({
                            icon: 'success',
                            title: res.message || 'Deleted successfully!'
                        });
                    })
                    .catch(error => {
                        console.error('Delete failed:', error);
                        Swal.fire('Error!', 'Failed to delete. Check console.', 'error');
                    });
            }
        });
    }
</script>

@stack('scripts')
</body>
</html>
