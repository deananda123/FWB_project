<h1 align="center">ARTEKA</h1>

<hr/>

<h3 align="center">Marketplace untuk Lukisan & Ilustrasi</h3>

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/36f5b8ce-b59d-4c5d-892f-31a6f36b31b5" alt="Logo Unsulbar" width="200"/>
</p>

<p align="center">
  <strong>Deananda</strong><br/><br/>
  <strong>D0223333</strong><br/><br/>
  <strong>Framework Web Based</strong><br/><br/>
  <strong>2025</strong>
</p>

---

<h2>Role dan Fitur</h2>

<h3>1. Seniman</h3>
<p>Role yang mendaftar untuk menjual karya seni dua dimensi seperti lukisan dan ilustrasi.</p>
<ul>
  <li>Login & Register</li>
  <li>Upload Karya: Gambar, judul, harga, dan deskripsi</li>
  <li>Lihat daftar karya sendiri</li>
  <li>Hapus karya (jika belum disetujui admin)</li>
  <li>Lihat order masuk dan konfirmasi jika deal</li>
</ul>

<h3>2. Konsumen</h3>
<p>Role untuk pengguna yang ingin membeli karya seni.</p>
<ul>
  <li>Login & Register</li>
  <li>Lihat galeri karya</li>
  <li>Lihat profil seniman</li>
  <li>Order karya</li>
  <li>Lihat daftar order sendiri</li>
</ul>

<h3>3. Admin</h3>
<p>Role untuk mengatur dan mengawasi platform.</p>
<ul>
  <li>Login Admin</li>
  <li>Lihat semua karya</li>
  <li>Setujui karya seniman sebelum tampil ke konsumen</li>
  <li>Lihat profil user</li>
  <li>Hapus karya atau user jika diperlukan</li>
</ul>

<hr>

<h2>Struktur Database</h2>

<!-- Tabel Users -->
<h3>1. Tabel <code>users</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigIncrements</td><td>Primary key, auto increment</td></tr>
<tr><td>name</td><td>string</td><td>Nama user</td></tr>
<tr><td>email</td><td>string</td><td>Harus unik</td></tr>
<tr><td>password</td><td>string</td><td>Password terenkripsi</td></tr>
<tr><td>role</td><td>enum</td><td>'admin', 'seniman', 'konsumen'</td></tr>
<tr><td>lokasi</td><td>string</td><td>Nullable (khusus seniman)</td></tr>
<tr><td>jam_operasional</td><td>string</td><td>Nullable (khusus seniman)</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<!-- Tabel Karya -->
<h3>2. Tabel <code>karya</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigIncrements</td><td>Primary key</td></tr>
<tr><td>user_id</td><td>foreignId</td><td>FK ke users.id → seniman</td></tr>
<tr><td>judul</td><td>string</td><td>Judul karya seni</td></tr>
<tr><td>gambar</td><td>string</td><td>URL gambar karya</td></tr>
<tr><td>deskripsi</td><td>text</td><td>Deskripsi singkat</td></tr>
<tr><td>harga</td><td>decimal</td><td>Harga karya</td></tr>
<tr><td>stok</td><td>integer</td><td>Jumlah ketersediaan</td></tr>
<tr><td>status</td><td>enum</td><td>'pending', 'approved', 'rejected'</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<!-- Tabel Orders -->
<h3>3. Tabel <code>orders</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigIncrements</td><td>Primary key</td></tr>
<tr><td>user_id</td><td>foreignId</td><td>FK ke users.id → konsumen</td></tr>
<tr><td>karya_id</td><td>foreignId</td><td>FK ke karya.id</td></tr>
<tr><td>status</td><td>enum</td><td>'pending', 'completed', 'canceled'</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<!-- Tabel Profil -->
<h3>4. Tabel <code>profil</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigIncrements</td><td>Primary key</td></tr>
<tr><td>user_id</td><td>foreignId</td><td>FK ke users.id → seniman</td></tr>
<tr><td>alamat</td><td>string</td><td>Lokasi toko seniman</td></tr>
<tr><td>jam_operasional</td><td>string</td><td>Jam buka dan tutup toko</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<!-- Tabel Kategori -->
<h3>5. Tabel <code>kategori</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigIncrements</td><td>Primary key</td></tr>
<tr><td>nama</td><td>string</td><td>Nama kategori</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<!-- Pivot karya_kategori -->
<h3>6. Tabel <code>karya_kategori</code></h3>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>karya_id</td><td>foreignId</td><td>FK ke karya.id</td></tr>
<tr><td>kategori_id</td><td>foreignId</td><td>FK ke kategori.id</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Otomatis oleh Laravel</td></tr>
</tbody>
</table>

<hr>

<h2>Relasi Antar Tabel</h2>
<table border="1" cellpadding="5" cellspacing="0">
<thead>
<tr><th>Asal</th><th>Tujuan</th><th>Relasi</th></tr>
</thead>
<tbody>
<tr><td>User (konsumen)</td><td>Orders</td><td>One to Many</td></tr>
<tr><td>User (seniman)</td><td>Karya</td><td>One to Many</td></tr>
<tr><td>Karya</td><td>Orders</td><td>One to Many</td></tr>
<tr><td>User</td><td>Profil</td><td>One to One</td></tr>
<tr><td>Karya</td><td>Kategori</td><td>Many to Many</td></tr>
</tbody>
</table>
