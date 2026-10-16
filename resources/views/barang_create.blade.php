<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - SIMLAB-RPL</title>

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
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #111827;
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            color: #f87171;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #cbd5e1;
            padding: 14px;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e293b;
            color: #f87171;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #f87171;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #94a3b8;
        }

        .form-card {
            background: #1e293b;
            padding: 30px;
            border-radius: 14px;
            max-width: 850px;
            border: 1px solid #334155;
        }

        .form-card h2 {
            margin-bottom: 25px;
            font-size: 21px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            color: #cbd5e1;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            background: #0f172a;
            border: 1px solid #475569;
            border-radius: 8px;
            color: #e2e8f0;
            outline: none;
            font-size: 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #f87171;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .error-box {
            background: #450a0a;
            color: #fecaca;
            border: 1px solid #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin-left: 20px;
            margin-top: 8px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-save {
            background: #ef4444;
            color: white;
        }

        .btn-save:hover {
            background: #dc2626;
        }

        .btn-back {
            background: #334155;
            color: #e2e8f0;
        }

        .btn-back:hover {
            background: #475569;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">SIMLAB-RPL</div>

        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('barang.index') }}">Daftar Barang</a>
        <a href="{{ route('barang.create') }}" class="active">Tambah Barang</a>
    </aside>

    <main class="main">

        <header class="header">
            <h1>Tambah Barang</h1>
            <p>Tambahkan data inventaris baru ke Laboratorium RPL.</p>
        </header>

        <section class="form-card">
            <h2>Formulir Data Barang</h2>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Data belum berhasil disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input
                            type="text"
                            id="kode_barang"
                            name="kode_barang"
                            value="{{ old('kode_barang') }}"
                            placeholder="Contoh: BRG001"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input
                            type="text"
                            id="nama_barang"
                            name="nama_barang"
                            value="{{ old('nama_barang') }}"
                            placeholder="Masukkan nama barang"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select id="kategori_id" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>

                            @foreach ($kategoris as $kategori)
                                <option
                                    value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}
                                >
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok', 0) }}"
                            min="0"
                            required
                        >
                    </div>

                    <div class="form-group full">
                        <label for="spesifikasi">Spesifikasi</label>
                        <textarea
                            id="spesifikasi"
                            name="spesifikasi"
                            placeholder="Masukkan spesifikasi barang (opsional)"
                        >{{ old('spesifikasi') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select id="kondisi" name="kondisi" required>
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-save">
                        Simpan Barang
                    </button>

                    <a href="{{ route('barang.index') }}" class="btn btn-back">
                        Kembali
                    </a>
                </div>

            </form>
        </section>

    </main>

</body>
</html>