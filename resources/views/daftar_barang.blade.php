<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL | Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #111827;
            position: fixed;
            padding: 30px 20px;
            border-right: 1px solid #263247;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #38bdf8;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 40px;
        }

        .menu {
            display: block;
            padding: 13px;
            margin-bottom: 10px;
            border-radius: 8px;
            color: #cbd5e1;
            text-decoration: none;
        }

        .menu.active,
        .menu:hover {
            background: #1e293b;
            color: #38bdf8;
        }

        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 15px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .description {
            color: #94a3b8;
            font-size: 14px;
        }

        .badge {
            background: #1e293b;
            color: #38bdf8;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 22px;
        }

        .card p {
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 30px;
            color: #38bdf8;
        }

        .panel {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 24px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .panel-header h2 {
            font-size: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            border: none;
            border-radius: 7px;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-add {
            background: #0284c7;
            color: white;
        }

        .btn-edit {
            background: #334155;
            color: #7dd3fc;
        }

        .btn-delete {
            background: #7f1d1d;
            color: #fecaca;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th {
            background: #0f172a;
            color: #94a3b8;
            font-size: 12px;
            text-align: left;
            text-transform: uppercase;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #334155;
        }

        td {
            font-size: 13px;
        }

        tbody tr:hover {
            background: #263449;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            background: #064e3b;
            color: #6ee7b7;
            font-size: 11px;
        }

        .success {
            background: #064e3b;
            color: #a7f3d0;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            color: #94a3b8;
            padding: 25px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 20px;
            }

            .subtitle {
                margin-bottom: 15px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
        .status-tersedia {
    background-color: #dcfce7;
    color: #166534;
}

.status-dipinjam {
    background-color: #ffe4e6;
    color: #9f1239;
}

.status-maintenance {
    background-color: #fef3c7;
    color: #92400e;
}
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="logo">SIMLAB-RPL</div>
        <div class="subtitle">Sistem Inventaris Laboratorium</div>

        <a href="/barang" class="menu active">📊 Dashboard</a>
        <a href="{{ route('barang.create') }}" class="menu">➕ Tambah Barang</a>
    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Dashboard Inventaris</h1>
                <p class="description">
                    Kelola inventaris Laboratorium Rekayasa Perangkat Lunak.
                </p>
            </div>

            <div class="badge">● Sistem Aktif</div>
        </div>

        @if (session('success'))
            <div class="success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <section class="stats">
            <div class="card">
                <p>Total Jenis Barang</p>
                <h2>{{ $daftarBarang->count() }}</h2>
            </div>

            <div class="card">
                <p>Barang Tersedia</p>
                <h2>
                    {{ $daftarBarang->where('status', 'Tersedia')->count() }}
                </h2>
            </div>

            <div class="card">
                <p>Barang Dipinjam</p>
                <h2>
                    {{ $daftarBarang->where('status', 'Dipinjam')->count() }}
                </h2>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
    <h2>Daftar Inventaris</h2>

    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <form action="{{ url('/barang') }}" method="GET"
              style="display: flex; gap: 8px;">
            <input
                type="text"
                name="cari"
                placeholder="Cari kode atau nama barang..."
                value="{{ $cari ?? '' }}"
                style="padding: 10px; border-radius: 7px;
                       border: 1px solid #334155;
                       background: #0f172a; color: white;
                       min-width: 220px;"
            >

            <button type="submit" class="btn btn-edit">
                Cari
            </button>

            @if (!empty($cari))
                <a href="{{ url('/barang') }}" class="btn btn-edit">
                    Reset
                </a>
            @endif
        </form>

        <a href="{{ route('barang.create') }}" class="btn btn-add">
            + Tambah Barang
        </a>
    </div>
</div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Spesifikasi</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($daftarBarang as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kode_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $barang->spesifikasi ?? '-' }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ $barang->kondisi }}</td>
                                <td>
                                    <span class="status status-{{ strtolower($barang->status) }}">
                                        {{ $barang->status }}
                                    </span>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('barang.edit', $barang->id) }}"
                                        class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('barang.destroy', $barang->id) }}"
                                        method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                            onclick="event.preventDefault(); if (confirm('Yakin ingin menghapus barang ini?')) this.form.submit();">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="empty">
                                    Belum ada data barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>
</html>