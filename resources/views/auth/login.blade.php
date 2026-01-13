<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - COGLINE Admin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * 
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #FF6B35 0%, #E84855 30%, #DA627D 60%, #7B2CBF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-logo {
            max-width: 140px;   /* lebih proporsional */
            height: auto;
            display: block;
            margin: 0 auto 0.75rem;
        }

        .auth-subtitle {
            font-size: 0.85rem;
            font-weight: 600;
            color: #000000;     /* abu-abu profesional */
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #7B2CBF;
            box-shadow: 0 0 0 3px rgba(123, 44, 191, 0.1);
        }

        .login-logo {
            max-width: 200px;
            height: auto;
            margin: 0 auto 12px;
            transform: translateX(-14px); /* geser ke kiri */
        }


        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-group label {
            font-weight: 400;
            cursor: pointer;
            margin: 0;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            background: linear-gradient(135deg, #7B2CBF, #9D4EDD);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(123, 44, 191, 0.3);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
        }

        .auth-footer a {
            color: #7B2CBF;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            color: #9D4EDD;
        }

        .error-message {
            background: #fee2e2;
            color: #ef4444;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        @media (max-width: 480px) {
            .auth-container {
                padding: 2rem;
            }
        }

        

    </style>
</head>
<body>
    <div class="auth-container">

        <!-- LOGO -->
        <div class="auth-logo">
    <img src="{{ asset('img/logo-cogline.png') }}"
         alt="COGLINE Logo"
         class="login-logo">

    <div class="auth-subtitle">Admin Panel</div>
</div>


        @if ($errors->any())
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           required autofocus
                           placeholder="admin@cogline.id">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password"
                           class="form-control"
                           required
                           placeholder="••••••••">
                </div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="auth-footer">
            <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
        </div>

    </div>
</body>

</html>