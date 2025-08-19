@php
    use App\Models\Setting;
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @if($logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/logos/' . $logo) }}">
        <meta property="og:image" content="{{ asset('storage/logos/' . $logo) }}">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        /* Green gradient for the body background */
        background: linear-gradient(135deg, #2196F3 0%, #0022ff 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.95);
        width: 100%;
        max-width: 420px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        animation: fadeIn 0.8s ease-out;
    }

    .login-header {
        /* Blue to Green gradient for header */
        background: linear-gradient(to right, #2196F3, #0022ff);
        padding: 30px 20px 30px;
        text-align: center;
        color: white;
        position: relative;
    }

    .login-header h1 {
        font-size: 32px;
        font-weight: 700;
        letter-spacing: 1px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 5px;
    }

    .login-header p {
        font-size: 16px;
        opacity: 0.9;
    }

    .logo-container {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .logo {
        background: white;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        border: 4px solid white;
        animation: float 3s ease-in-out infinite;
    }

    .logo i {
        /* Darker Green for logo icon */
        font-size: 36px;
        color: var(--primary-dark); /* Darker Green */
    }

    .login-form {
        padding: 40px 30px 30px;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        /* Blue for input icons */
        color: #2196F3;
        font-size: 18px;
    }

    .form-group input {
        width: 100%;
        padding: 14px 14px 14px 45px;
        border: 2px solid #eee;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s;
    }

    .form-group input:focus {
        /* Green border and shadow on focus */
        border-color: #2196F3;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
        outline: none;
    }

    .login-btn {
        /* Green to Blue gradient for login button */
        background: linear-gradient(to right, #2196F3, #0022ff);
        border: none;
        width: 100%;
        padding: 16px;
        border-radius: 10px;
        color: white;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        /* Green/Blue shadow for button */
        box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
        margin-top: 10px;
    }

    .login-btn:hover {
        /* Darker Green to Darker Blue on hover */
        background: linear-gradient(to right, #2196F3, #0022ff);
        transform: translateY(-2px);
        /* Darker Green/Blue shadow on hover */
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.6);
    }

    .login-footer {
        text-align: center;
        padding: 20px;
        color: #777;
        font-size: 14px;
        background-color: #f9f9f9;
        border-top: 1px solid #eee;
    }

    .login-footer a {
        /* Blue for footer links */
        color: #2196F3;
        text-decoration: none;
        font-weight: 600;
    }

    .login-footer a:hover {
        text-decoration: underline;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @media (max-width: 480px) {
        .login-container {
            max-width: 100%;
        }

        .login-form {
            padding: 30px 20px;
        }

        .logo {
            width: 70px;
            height: 70px;
        }

        .logo i {
            font-size: 30px;
        }
    }
</style>

</head>
<body class="bg-light">
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <div class="logo">
                    @if (isset($logo) && $logo)
                    <img src="{{ asset('storage/logos/' . $logo) }}" alt="Logo Desa" style="max-width:50px;max-height:50px;">
                @else
                    <i class="fas fa-laugh-wink"></i>
                @endif
                </div>
            </div>
            <h1>DESA PASIRAMAN WONOTIRTO</h1>
            <p>Admin Login</p>
        </div>

        <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">EMAIL</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Masukkan username Anda"  value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">PASSWORD</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                    <span class="password-toggle" onclick="togglePassword()" style="right: 11px;">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="login-btn">LOGIN</button>
        </form >
        </div>
    </div>

    <script>
        function togglePassword() 
        {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle i');

            if (passwordInput.type === 'password') 
            {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else 
            {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Loading animation on login button
        document.addEventListener('DOMContentLoaded', function () 
        {
            const form = document.querySelector('form');
            const loginBtn = document.querySelector('.login-btn');
            form.addEventListener('submit', function (e) 
            {
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            loginBtn.disabled = true;
            // Tambahkan waktu animasi (misal 1.5 detik) sebelum submit
            e.preventDefault();
            setTimeout(function () 
            {
                form.submit();
            }, 1500); // 1500 ms = 1.5 detik
            });
        });
    </script>
</body>
</html>