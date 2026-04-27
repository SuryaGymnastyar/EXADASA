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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="" class="form-auth">
            <h1 class="title" style="color: #0000ff;">EXADASA</h1>
            <p class="subtitle">Login ke sistem ujian</p>
            <section class="form-group" style="margin-top: 16px;">
                <section class="form-group-input">
                    <label for="nisn" class="poppins-regular">Nisn</label>
                    <input type="text" name="nisn" placeholder="Masukkan nisn..." style="padding-right: 38px;" id="nisn"
                        class="input">
                    <i class="ph ph-user" style="position: absolute; bottom: 12px; right: 10px; font-size: 16px;"></i>
                </section>
                <section class="form-group-input">
                    <label for="password" class="poppins-regular">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password..."
                        style="padding-right: 38px;" id="password" class="input">
                    <i class="ph ph-eye-slash"
                        style="position: absolute; bottom: 12px; right: 10px; font-size: 16px;"></i>
                </section>
            </section>
            <section class="form-group-input checkbox">
                <label for="remember" style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" id="remember" name="remember"> <span style="font-size: 12px;" class="poppins-regular">Ingat saya</span>
                </label>
                <a href="" style="color:#0000ff; font-size: 12px;" class="poppins-regular">Lupa password?</a>
            </section>
            <section class="form-group-input">
                <button type="submit" style="width: 100%;" class="btn-primary">Login</button>
            </section>
        </form>
    </div>
</body>

</html>