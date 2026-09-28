<form action="/aksi/user/user_tambah_aksi.php" method="post">
    
    <label for="nama">Nama:<br></label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="username">Username:<br></label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:<br></label>
    <input type="password" id="password" name="password" required><br>

    <label for="level">Level:<br></label>
    <select name="level" id="level" onchange="fetchOptions()">
        <option value="">pilih</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="peminjam">Peminjam</option>
    </select>

    <script>
        function fetchOptions(){
            var level = document.getElementById('level').value;
            var preset = document.getElementsByClassName('preset-question');

            for(var i = 0; i < preset.length; i++){
                preset[i].style.display = 'none';
            }

            if(level === 'admin'){
                document.getElementById('form_admin').style.display = 'block';
            }else if(level === 'petugas'){
                const form = document.getElementById('form_petugas');
                document.getElementById('nip').required = true;
                document.getElementById('alamat_petugas').required = true;
                document.getElementById('gender_petugas').required = true;
                Object.assign(form.style, {
                    display : 'block'
                });

            }else if(level === 'peminjam'){
                const form = document.getElementById('form_peminjam');
                document.getElementById('alamat_peminjam').required = true;
                document.getElementById('gender_peminjam').required = true;
                document.getElementById('no_hp').required = true;
                Object.assign(form.style, {
                    display : 'block',
                });
            }
        }
    </script>

    <div id="form_admin" class="preset-question" style="display:none;">
        <input type="submit" value="Tambahkan" class="submit">
    </div>

    <div id="form_petugas" class="preset-question" style="display:none;">
        <p>Form Petugas</p>
        <label for="nip">NIP:<br></label>
        <input type="text" id="nip" name="nip"><br>
        <label for="alamat_petugas">Alamat:<br></label>
        <input type="text" id="alamat_petugas" name="alamat_petugas"><br>
        <label for="gender">Gender:<br></label>
        <select name="gender_petugas" id="gender_petugas">
            <option value="">pilih</option>
            <option value='L'>Laki-laki</option>
            <option value='P'>Perempuan</option>
        </select>
        <input type="submit" value="Tambahkan" class="submit">
    </div>

    <div id="form_peminjam" class="preset-question" style="display:none;">
        <p>Form Peminjam</p>
        <label for="alamat">Alamat:<br></label>
        <input type="text" id="alamat_peminjam" name="alamat_peminjam"><br>
        <label for="gender">Gender:<br></label>
        <select name="gender_peminjam" id="gender_peminjam">
            <option value="">pilih</option>
            <option value='L'>Laki-laki</option>
            <option value='P'>Perempuan</option>
        </select>
        <label for="no_hp">no hp:<br></label>
        <input type="number" id="no_hp" name="no_hp"><br>
        <input type="submit" value="Tambahkan" class="submit">
    </div>

</form>