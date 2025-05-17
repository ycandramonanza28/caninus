<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
    <title>Verifikasi Berhasil</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #e0eaff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #937D41;
            font-size: 28px;
            margin-bottom: 16px;
        }

        p {
            color: #444;
            font-size: 16px;
            line-height: 1.6;
        }

        .email-icon {
            font-size: 48px;
            color: #937D41;
            margin-bottom: 16px;
        }

        .btn-login {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 24px;
            background-color: #937D41;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #937D41;
        }
    </style>
</head>

<body>
    <div class="container">

        <img src="{{ asset('img/logo.jpg') }}" alt="" width="200">


        <h1>Selamat! Email Anda telah berhasil diverifikasi.</h1>
        <p>
            Anda kini dapat melanjutkan ke halaman login dan mulai menggunakan layanan kami.
        </p>
        <p>
            <strong>Cek kotak masuk email Anda</strong> (atau folder spam jika belum terlihat), karena kami telah
            mengirimkan <strong>username dan password login</strong> untuk Anda.
        </p>
        <p>
            Simpan informasi tersebut dengan baik demi keamanan akun Anda.
        </p>
        <a href="{{ url('/login') }}" class="btn-login">Menuju Halaman Login</a>
    </div>
</body>

</html>
