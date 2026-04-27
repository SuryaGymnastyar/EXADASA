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
            <section class="form-group" style="margin-top: 16px;">
                <section class="form-group-input">
                    <label for="nisn">Nisn</label>
                    <input type="text" name="nisn" placeholder="Masukkan nisn..." id="nisn" class="input">
                </section>
                <section class="form-group-input">
                    <label for="password">Password</label>
                    <input type="text" name="password" placeholder="Masukkan password..." id="password" class="input">
                </section>
            </section>
            <section class="form-group-input checkbox">
                <label for="remember" style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" id="remember" name="remember"> <span style="font-size: 14px;">Remember me</span>
                </label>
                <a href="" style="color:#0000ff; font-size: 14px;">Lupa password?</a>
            </section>
            <section class="form-group-input">
                <button type="submit" style="width: 100%;" class="btn-primary">Login</button>
            </section>
            <p style="color:#000000a7; font-size: 14px; margin: 10px 0;">Belum punya akun? <a href=""
                    style="color: #0000ff">Register</a></p>
        </form>
    </div>
</body>

</html>