<?php
include '../../middleware/admin.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body class="bw-rounded-theme">
    <?php
    include '../../middleware/admin.php';
    include '../../koneksi.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $data = mysqli_query($koneksi, "select 
        user.*, 
        peminjam.alamat AS alamat_peminjam,
        peminjam.gender AS gender_peminjam,
        peminjam.no_hp AS no_hp_peminjam,
        petugas.nip AS nip_petugas,
        petugas.alamat AS alamat_petugas,
        petugas.gender AS gender_petugas
        from user 
        left join peminjam
         on user.id_user = peminjam.id_user_fk 
        left join petugas
         on user.id_user = petugas.fk_id_user
        where id_user = '$id'");
    $row = mysqli_fetch_array($data);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../styles/styles.css">
    </head>
    <body class="bw-rounded-theme">
        <header>
            <h1>Edit User</h1>
        </header>

        <?php include '../../component/sidebar_admin.php'; ?>

        <main>
            <div >
                <div >
                    <form action="/aksi/user/user_edit_aksi.php" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">

                        <div >
                            <div>
                                <label for="nama_user">Nama</label>
                                <input type="text" id="nama_user" name="nama_user" value="<?php echo $row['nama_user']; ?>" required>
                            </div>

                            <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                            </div>

                            <div>
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                            </div>

                            <div>
                                <label for="level">Level</label>
                                <select name="level" id="level" onchange="fetchOption()" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="admin" <?php if ($row['level'] === 'admin') echo 'selected'; ?>>Admin</option>
                                    <option value="petugas" <?php if ($row['level'] === 'petugas') echo 'selected'; ?>>Petugas</option>
                                    <option value="peminjam" <?php if ($row['level'] === 'peminjam') echo 'selected'; ?>>Peminjam</option>
                                </select>
                            </div>
                        </div>

                        <div id="section_petugas" class="role-section" style="display:none;">
                            <h2>Data Petugas</h2>
                            <div>
                                <div>
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip" value="<?php echo $row['nip_petugas']; ?>">
                                </div>

                                <div>
                                    <label for="alamat_petugas">Alamat</label>
                                    <input type="text" id="alamat_petugas" name="alamat_petugas" value="<?php echo $row['alamat_petugas']; ?>">
                                </div>

                                <div>
                                    <label for="gender_petugas">Gender</label>
                                    <select name="gender_petugas" id="gender_petugas">
                                        <option value="">-- Pilih --</option>
                                        <option value="L" <?php if ($row['gender_petugas'] === 'L') echo 'selected'; ?>>Laki-Laki</option>
                                        <option value="P" <?php if ($row['gender_petugas'] === 'P') echo 'selected'; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="section_peminjam" class="role-section" style="display:none;">
                            
                            <h2>Data Peminjam</h2>
                            <div>
                                <div>
                                    <label for="alamat_peminjam">Alamat</label>
                                    <input type="text" id="alamat_peminjam" name="alamat_peminjam" value="<?php echo $row['alamat_peminjam']; ?>">
                                </div>

                                <div>
                                    <label for="gender_peminjam">Gender</label>
                                    <select name="gender_peminjam" id="gender_peminjam">
                                        <option value="">-- Pilih --</option>
                                        <option value="L" <?php if ($row['gender_peminjam'] === 'L') echo 'selected'; ?>>Laki-Laki</option>
                                        <option value="P" <?php if ($row['gender_peminjam'] === 'P') echo 'selected'; ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="no_hp">No HP</label>
                                    <input type="text" id="no_hp" name="no_hp" value="<?php echo $row['no_hp_peminjam']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer>&copy;2025 Kura</footer>

        <script>
            function fetchOption() {
                var level = document.getElementById('level').value;
                var sections = document.getElementsByClassName('role-section');
                var petugasFields = ['nip', 'alamat_petugas', 'gender_petugas'];
                var peminjamFields = ['alamat_peminjam', 'gender_peminjam', 'no_hp'];

                function setRequired(fields, isRequired) {
                    for (var i = 0; i < fields.length; i++) {
                        var field = document.getElementById(fields[i]);
                        if (field) {
                            field.required = isRequired;
                        }
                    }
                }

                for (var i = 0; i < sections.length; i++) {
                    sections[i].style.display = 'none';
                }

                setRequired(petugasFields, false);
                setRequired(peminjamFields, false);

                if (level === 'petugas') {
                    document.getElementById('section_petugas').style.display = 'block';
                    setRequired(petugasFields, true);
                } else if (level === 'peminjam') {
                    document.getElementById('section_peminjam').style.display = 'block';
                    setRequired(peminjamFields, true);
                }
            }

            document.addEventListener('DOMContentLoaded', fetchOption);
        </script>
    </body>
    </html>