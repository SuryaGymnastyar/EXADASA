<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
</head>

<body>
    <div class="container">
        <form action="" class="form-auth">
            <h1 class="title" style="color: #0000ff;">EXADASA</h1>
            <p class="subtitle">Login ke sistem ujian</p>
            <section class="form-group" style="margin-top: 16px;">
                <section class="form-group-input">
                    <label for="nisn">Nisn</label>
                    <input type="text" name="nisn" placeholder="Masukkan nisn..." style="padding-right: 38px;" id="nisn" class="input">
                    <i class="ph ph-user" style="position: absolute; bottom: 10px; right: 10px; font-size: 16px;"></i>
                </section>
                <section class="form-group-input">
                    <label for="password">Password</label>
                    <input type="text" name="password" placeholder="Masukkan password..." style="padding-right: 38px;" id="password" class="input">
                    <i class="ph ph-eye-slash" style="position: absolute; bottom: 10px; right: 10px; font-size: 16px;"></i>
                </section>
            </section>
            <section class="form-group-input checkbox">
                <label for="remember" style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" id="remember" name="remember"> <span style="font-size: 14px;">Remember
                        me</span>
                </label>
                <a href="" style="color:#0000ff; font-size: 14px;">Lupa password?</a>
            </section>
            <section class="form-group-input">
                <button type="submit" style="width: 100%;" class="btn-primary">Login</button>
            </section>
        </form>
    </div>
</body>

</html>