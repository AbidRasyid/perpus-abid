<form action="/aksi/buku/buku_tambah_aksi.php" method="post">
    <label for="isbn">Isbn:<br></label>
    <input type="text" id="isbn" name="isbn" class="inputtext" required><br>

    <label for="Judul_Buku">Judul Buku:<br></label>
    <input type="text" id="Judul_Buku" name="judul" class="inputtext" required><br>
                
    <label for="Pengarang">Pengarang:<br></label>
    <input type="text" id="Pengarang" name="pengarang" class="inputtext" required><br>
                
    <label for="Penerbit">Penerbit:<br></label>
    <input type="text" id="Penerbit" name="penerbit" class="inputtext" required><br>
                
    <label for="Tahun_Terbit">Tahun terbit:<br></label>
    <input type="text" id="Tahun_Terbit" name="tahun_terbit" class="inputtext" required><br>
                
    <label for="stok">Stok:</label>
    <input type="text" id="stok" name="stok" class="inputtext" required ><br>
                
    <input type="submit" value="Tambahkan" class="submit">
</form>