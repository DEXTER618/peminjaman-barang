<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIMLAB-RPL</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #f8fafc;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            padding: 24px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 14px;
        }

        .card p {
            color: #94a3b8;
            margin-bottom: 12px;
        }

        .card h2 {
            margin: 0;
            font-size: 32px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-primary {
            background: #38bdf8;
            color: #082f49;
        }

        .btn-secondary {
            background: #334155;
            color: white;
        }

        @media (max-width: 768px) {
            body {
                padding: 18px;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 420px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Dashboard SIMLAB-RPL</h1>

        <p class="subtitle">
            Sistem Informasi Inventaris Laboratorium RPL
        </p>

        <div class="cards">
            <div class="card">
                <p>Total Jenis Barang</p>
                <h2>{{ $totalBarang }}</h2>
            </div>

            <div class="card">
                <p>Barang Tersedia</p>
                <h2>{{ $barangTersedia }}</h2>
            </div>

            <div class="card">
                <p>Barang Dipinjam</p>
                <h2>{{ $barangDipinjam }}</h2>
            </div>

            <div class="card">
                <p>Barang Maintenance</p>
                <h2>{{ $barangMaintenance }}</h2>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                Lihat Daftar Barang
            </a>

            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                + Tambah Barang
            </a>
        </div>
    </div>
</body>
</html>