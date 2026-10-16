<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - SIMLAB-RPL</title>
</head>
<body>
    <h1>Edit Barang</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Barang</label><br>
        <input type="text" name="kode_barang"
            value="{{ old('kode_barang', $barang->kode_barang) }}" required>
        <br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang"
            value="{{ old('nama_barang', $barang->nama_barang) }}" required>
        <br><br>

        <label>Kategori</label><br>
        <select name="kategori_id" required>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Spesifikasi</label><br>
        <textarea name="spesifikasi">{{ old('spesifikasi', $barang->spesifikasi) }}</textarea>
        <br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" min="0"
            value="{{ old('stok', $barang->stok) }}" required>
        <br><br>

        <label>Kondisi</label><br>
        <select name="kondisi" required>
            @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $kondisi)
                <option value="{{ $kondisi }}"
                    {{ old('kondisi', $barang->kondisi) == $kondisi ? 'selected' : '' }}>
                    {{ $kondisi }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Status</label><br>
        <select name="status" required>
            @foreach (['Tersedia', 'Dipinjam', 'Maintenance'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', $barang->status) == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="/barang">Kembali ke daftar barang</a></p>
</body>
</html>