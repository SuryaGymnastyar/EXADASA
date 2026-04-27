<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <div class="container">
        <form action="" class="form-auth">
            <h1 class="title" style="color: #0000ff;">EXADASA</h1>
            <p class="subtitle">Login ke sistem ujian</p>
            <section class="form-group">
                <label for="nisn">Nisn</label>
                <input type="text" name="nisn" id="nisn" class="input">
            </section>
            <section class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="input">
            </section>
            <section class="form-group">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember"> Remember me
                </label>
            </section>
            <section class="form-group checkbox">
                <button type="submit" class="btn-primary">Login</button>
                <a href="">Lupa password?</a>
            </section>
            <p style="color:#ffffffa7;">Belum punya akun? <a href="" style="color: #0000ff">Register</a></p>
        </form>
    </div>
</body>

</html>