<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body class="auth-body">
    <div>
        <h1>Welcome</h1>
        <p>Please register first</p>
        <form action="/aksi/auth/register.php" method="post">
            <label for="username">Nama:<br></label>
            <input type="text" id="username" name="username" required><br>
            <label for="alamat">Alamat:<br></label>
            <input type="text" id="alamat" name="alamat" required><br>
            <label for="gender">Gender:<br></label>
            <select name="gender" id="gender">
                <option value="">pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br><br>
            <label for="password">Password:<br></label>
            <input type="password" id="password" name="password" required><br>
            <label for="no_hp">Nomor Telepon:<br></label>
            <input type="number" id="no_hp" name="no_hp" required><br>
            <a href="./index.php">Login</a>
            <input type="submit" value="Register" class="submit">
        </form>
    </div>
</body>
</html>