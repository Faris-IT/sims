<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIMS')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .sims-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #111827;
            color: white;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .brand {
            padding: 0 12px 24px;
            border-bottom: 1px solid #374151;
            margin-bottom: 20px;
        }

        .brand h1 {
            margin: 0;
            font-size: 22px;
        }

        .brand p {
            margin: 6px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .menu-title {
            color: #9ca3af;
            font-size: 11px;
            text-transform: uppercase;
            padding: 0 12px;
            margin: 20px 0 8px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu a {
            color: #d1d5db;
            text-decoration: none;
            padding: 11px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .menu a:hover {
            background: #1f2937;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .user-role {
            font-size: 12px;
            color: #6b7280;
        }

        .content {
            padding: 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-title {
            margin: 0;
            font-size: 26px;
        }

        .page-description {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            color: #6b7280;
            background: #f9fafb;
            padding: 14px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        tr:hover td {
            background: #fafafa;
        }

        .badge {
            display: inline-block;
            padding: 4px 9px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .pagination {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 20px;
            }

            .page-header {
                align-items: flex-start;
                gap: 16px;
                flex-direction: column;
            }
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 10px;
        }

        .detail-full {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 13px;
            color: #64748b;
        }

        .detail-item strong {
            font-size: 15px;
            color: #1e293b;
        }

        @media (max-width: 700px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-full {
                grid-column: auto;
            }
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-full {
            grid-column: 1 / -1;
        }

        .required {
            color: #dc2626;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-full {
                grid-column: auto;
            }
        }

        .btn-danger {
            background: #dc2626;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            opacity: 0.9;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

    <div class="sims-layout">

        <aside class="sidebar">

            <div class="brand">
                <h1>SIMS</h1>
                <p>Sistem Informasi Manajemen Sekolah</p>
            </div>

            <div class="menu-title">Menu Utama</div>

            <nav class="menu">

                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>

                @if(in_array(auth()->user()->role?->name, ['tu', 'kepala_sekolah']))
                <a href="{{ route('students.index') }}">
                    Data Siswa
                </a>
                @endif

                <a href="#">
                    Data Guru
                </a>

                <a href="#">
                    Kelas
                </a>

                <a href="#">
                    Jurusan
                </a>

                <a href="#">
                    Tahun Ajaran
                </a>

            </nav>

            <div class="menu-title">Sistem</div>

            <nav class="menu">
                <a href="#">
                    Pengaturan
                </a>

                <a href="#">
                    Laporan
                </a>
            </nav>

        </aside>


        <main class="main">

            <header class="topbar">

                <div class="topbar-title">
                    @yield('header', 'Dashboard')
                </div>

                <div class="user-info">

                    <div>
                        <div class="user-name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="user-role">
                            {{ auth()->user()->role?->display_name ?? 'Tanpa Role' }}
                        </div>
                    </div>

                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                </div>

            </header>


            <section class="content">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @yield('content')

            </section>

        </main>

    </div>

</body>

</html>