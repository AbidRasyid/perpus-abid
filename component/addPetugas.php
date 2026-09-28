<form action="/aksi/petugas/petugas_tambah_aksi.php" method="post">
    <label for="nip">NIP:<br></label>
    <input type="text" id="nip" name="nip" required><br>

    <label for="nama">Nama:<br></label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="username">Username:<br></label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:<br></label>
    <input type="password" id="password" name="password" required><br>

    <label for="alamat">Alamat:<br></label>
    <input type="text" id="alamat" name="alamat" required><br>
    
    <label for="gender">Gender:<br></label>
    <select name="gender" id="gender">
        <option value="">pilih</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
    
    <input type="submit" value="Tambahkan" class="submit">
</form>