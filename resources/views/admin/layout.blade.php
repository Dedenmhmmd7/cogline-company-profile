<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - COGLINE</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #7B2CBF;
            --primary-light: #9D4EDD;
            --secondary: #FF6B35;
            --dark: #1a1d2e;
            --gray: #64748b;
            --gray-light: #f1f5f9;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-light);
            color: var(--dark);
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--dark);
            color: white;
            padding: 2rem 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 0 1.5rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1.5rem;
        }

        .sidebar-brand h2 {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-brand p {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
            margin-top: 0.25rem;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }

        .sidebar-menu .badge {
            margin-left: auto;
            font-size: 0.7rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 2rem;
        }

        .topbar {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-light);
        }

        .btn-secondary {
            background: var(--secondary);
            color: white;
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }

        .table th {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.875rem;
            text-transform: uppercase;
        }

        .table tr:hover {
            background: var(--gray-light);
        }

        .badge {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .badge-success {
            background: #d1fae5;
            color: var(--success);
        }

        .badge-danger {
            background: #fee2e2;
            color: var(--danger);
        }

        .badge-warning {
            background: #fef3c7;
            color: var(--warning);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--gray-light);
            border-radius: 8px;
            font-family: inherit;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: #d1fae5;
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        .alert-error {
            background: #fee2e2;
            color: var(--danger);
            border-left: 4px solid var(--danger);
        }

        .alert-warning {
            background: #fef3c7;
            color: var(--warning);
            border-left: 4px solid var(--warning);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-card-icon.primary {
            background: rgba(123, 44, 191, 0.1);
            color: var(--primary);
        }

        .stat-card-icon.secondary {
            background: rgba(255, 107, 53, 0.1);
            color: var(--secondary);
        }

        .stat-card h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: var(--gray);
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-list {
            list-style: none;
            padding: 0;
        }

        .error-list li {
            margin-bottom: 0.5rem;
        }

        /* Custom SweetAlert2 Styling */
        .swal2-popup {
            font-family: 'Inter', sans-serif !important;
            border-radius: 16px !important;
        }

        .swal2-title {
            font-weight: 700 !important;
        }

        .swal2-confirm {
            background: var(--danger) !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            padding: 0.75rem 2rem !important;
        }

        .swal2-cancel {
            background: var(--gray) !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            padding: 0.75rem 2rem !important;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h2>COGLINE</h2>
                <p>Admin Panel</p>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pricing.index') }}" class="{{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i>
                        <span>Pricing</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <i class="fas fa-star"></i>
                        <span>Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i>
                        <span>Kontak</span>
                        @php
                            $newContactCount = \App\Models\ContactSubmission::where('status', 'new')->count();
                        @endphp
                        @if($newContactCount > 0)
                            <span class="badge badge-warning">{{ $newContactCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <i class="fas fa-globe"></i>
                        <span>View Website</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="width: 100%; background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 1rem; padding: 0.875rem 1.5rem; color: rgba(255,255,255,0.7); text-align: left;">
                            <i class="fas fa-sign-out-alt" style="width: 20px; text-align: center;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="topbar">
                <h1>@yield('page-title', 'Dashboard')</h1>
                
                <div class="user-menu">
                    <span>{{ Auth::user()->name }}</span>
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="error-list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Global Delete Confirmation Script -->
    <script>
        // Delete confirmation
        function confirmDelete(formId, itemName) {
            Swal.fire({
                title: 'Hapus Data?',
                html: `Apakah Anda yakin ingin menghapus <strong>${itemName}</strong>?<br><small style="color: #ef4444;">Data yang dihapus tidak dapat dikembalikan!</small>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                cancelButtonText: '<i class="fas fa-times"></i> Batal',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form
                    document.getElementById(formId).submit();
                }
            });
        }

        // Success notification
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timerProgressBar: true,
            });
        @endif

        // Error notification
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonColor: '#7B2CBF',
            });
        @endif
    </script>

    @stack('scripts')
</body>
</html>