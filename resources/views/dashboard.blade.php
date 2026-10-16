<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIMLAB-RPL</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #f8fafc;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            flex-shrink: 0;
            padding: 28px 18px;
            background: #111c31;
            border-right: 1px solid #334155;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            border-bottom: 1px solid #334155;
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 43px;
            height: 43px;
            background: #0284c7;
            border-radius: 12px;
            font-size: 22px;
        }

        .brand h2 {
            margin: 0;
            font-size: 17px;
        }

        .brand p {
            margin: 5px 0 0;
            color: #94a3b8;
            font-size: 12px;
        }

        .nav-label {
            margin: 28px 10px 12px;
            color: #64748b;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
            padding: 13px 14px;
            border-radius: 9px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #075985;
            color: #ffffff;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-footer {
            margin-top: 35px;
            padding: 15px 12px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 10px;
        }

        .sidebar-footer p {
            margin: 0;
            font-size: 13px;
            font-weight: bold;
        }

        .sidebar-footer span {
            display: block;
            margin-top: 7px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.5;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 35px;
        }

        .topbar h1 {
            margin: 0;
            color: #f87171;
            font-size: 29px;
        }

        .subtitle {
            margin: 10px 0 0;
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.6;
        }

        .system-badge {
            padding: 10px 14px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 9px;
            color: #cbd5e1;
            font-size: 12px;
            white-space: nowrap;
        }

        .section-heading {
            margin-bottom: 18px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 19px;
        }

        .section-heading p {
            margin: 7px 0 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .card {
            min-width: 0;
            padding: 23px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 14px;
            transition: transform 0.2s, border-color 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: #64748b;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
        }

        .card-label {
            color: #cbd5e1;
            font-size: 13px;
            line-height: 1.5;
        }

        .card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 11px;
            font-size: 21px;
        }

        .icon-blue {
            background: #0c4a6e;
        }

        .icon-green {
            background: #14532d;
        }

        .icon-orange {
            background: #7c2d12;
        }

        .icon-red {
            background: #7f1d1d;
        }

        .card h3 {
            margin: 0;
            font-size: 32px;
        }

        .card-note {
            margin: 10px 0 0;
            color: #94a3b8;
            font-size: 12px;
        }

        .actions-card {
            padding: 25px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 14px;
        }

        .actions-card h2 {
            margin: 0 0 8px;
            font-size: 19px;
        }

        .actions-card > p {
            margin: 0 0 22px;
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            padding: 13px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #0284c7;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #0369a1;
        }

        .btn-secondary {
            background: #334155;
            color: #f8fafc;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .footer {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid #334155;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 1100px) {
            .sidebar {
                width: 220px;
            }

            .main {
                padding: 28px;
            }

            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 700px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
                border-right: none;
                border-bottom: 1px solid #334155;
            }

            .brand {
                padding-bottom: 18px;
            }

            .nav-label {
                margin-top: 18px;
            }

            .nav-link {
                display: inline-flex;
                margin: 0 4px 5px 0;
                padding: 11px 12px;
            }

            .sidebar-footer {
                display: none;
            }

            .main {
                padding: 24px 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 28px;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .cards {
                gap: 12px;
            }

            .card {
                padding: 17px;
            }

            .card-top {
                align-items: flex-start;
                flex-direction: column-reverse;
                gap: 12px;
                margin-bottom: 16px;
            }

            .card h3 {
                font-size: 27px;
            }

            .actions-card {
                padding: 20px;
            }
        }

        @media (max-width: 380px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .card-top {
                align-items: center;
                flex-direction: row;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <aside class="sidebar">
            <div class="brand">
                <div class="brand-icon">▦</div>
                <div>
                    <h2>SIMLAB-RPL</h2>
                    <p>Inventory Management</p>
                </div>
            </div>

            <p class="nav-label">MENU UTAMA</p>

            <nav>
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <span class="nav-icon">⌂</span>
                    Dashboard
                </a>

                <a href="{{ route('barang.index') }}" class="nav-link">
                    <span class="nav-icon">▤</span>
                    Daftar Barang
                </a>

                <a href="{{ route('barang.create') }}" class="nav-link">
                    <span class="nav-icon">＋</span>
                    Tambah Barang
                </a>
            </nav>

            <div class="sidebar-footer">
                <p>Laboratorium RPL</p>
                <span>Sistem informasi inventaris dan pengelolaan barang laboratorium.</span>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div>
                    <h1>Dashboard SIMLAB-RPL</h1>
                    <p class="subtitle">
                        Selamat datang di Sistem Informasi Inventaris Laboratorium RPL.
                        Pantau kondisi inventaris melalui ringkasan berikut.
                    </p>
                </div>

                <div class="system-badge">
                    ● Sistem Inventaris
                </div>
            </header>

            <section>
                <div class="section-heading">
                    <h2>Ringkasan Inventaris</h2>
                    <p>Informasi jumlah barang berdasarkan data yang tersimpan.</p>
                </div>

                <div class="cards">
                    <article class="card">
                        <div class="card-top">
                            <span class="card-label">Total Jenis Barang</span>
                            <span class="card-icon icon-blue">▤</span>
                        </div>
                        <h3>{{ $totalBarang }}</h3>
                        <p class="card-note">Seluruh data inventaris</p>
                    </article>

                    <article class="card">
                        <div class="card-top">
                            <span class="card-label">Barang Tersedia</span>
                            <span class="card-icon icon-green">✓</span>
                        </div>
                        <h3>{{ $barangTersedia }}</h3>
                        <p class="card-note">Status tersedia</p>
                    </article>

                    <article class="card">
                        <div class="card-top">
                            <span class="card-label">Barang Dipinjam</span>
                            <span class="card-icon icon-orange">↗</span>
                        </div>
                        <h3>{{ $barangDipinjam }}</h3>
                        <p class="card-note">Status sedang dipinjam</p>
                    </article>

                    <article class="card">
                         <div class="card-top">
                            <span class="card-label">Barang Maintenance</span>
                            <span class="card-icon icon-red">⚙</span>
                        </div>
                        <h3>{{ $barangMaintenance }}</h3>
                        <p class="card-note">Status pemeliharaan</p>
                    </article>
                </div>
            </section>

            <section class="actions-card">
                <h2>Akses Cepat</h2>
                <p>Pilih menu di bawah untuk mengelola data inventaris laboratorium.</p>

                <div class="actions">
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                        <span>▤</span>
                        Lihat Daftar Barang
                    </a>

                    <a href="{{ route('barang.create') }}" class="btn btn-primary">
                        <span>＋</span>
                        Tambah Barang
                    </a>
                </div>
            </section>

            <footer class="footer">
                SIMLAB-RPL &copy; {{ date('Y') }}<br>
                Sistem Informasi Inventaris Laboratorium Rekayasa Perangkat Lunak.
            </footer>
        </main>

    </div>
</body>
</html>