<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - SIMLAB-RPL</title>
</head>
<body>
    <h1>Tambah Barang</h1>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>Jumlah kategori: {{ $kategoris->count() }}</p>
    <form action="{{ route('barang.store') }}" method="POST">
    @csrf
        <label>Kode Barang</label>
        <input type="text" name="kode_barang">
        <br><br>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang">
        <br><br>

<label>Kategori</label>
<select name="kategori_id">
    <option value="">Pilih kategori</option>

    @foreach ($kategoris as $kategori)
        <option value="{{ $kategori->id }}">
            {{ $kategori->nama_kategori }}
        </option>
    @endforeach
</select>
<br><br>
        <label>Spesifikasi</label>
        <textarea name="spesifikasi"></textarea>
        <br><br>

        <label>Stok</label>
        <input type="number" name="stok" min="0" value="0">
        <br><br>

        <label>Kondisi</label>
        <select name="kondisi">
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>
        <br><br>

        <label>Status</label>
        <select name="status">
            <option value="Tersedia">Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Maintenance">Maintenance</option>
        </select>
        <br><br>

        <button type="submit">Simpan Barang</button>
    </form>

    <p><a href="/barang">Kembali ke daftar barang</a></p>
</body>
</html>