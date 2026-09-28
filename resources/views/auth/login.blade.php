<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | PortfolioCMS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.14), transparent 35%),
                radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.08), transparent 35%),
                #080d18;
            color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
        }

        .brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .brand h1 {
            font-size: 27px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.7px;
        }

        .brand h1 span {
            color: #3b82f6;
        }

        .brand p {
            color: #64748b;
            font-size: 13px;
            margin-top: 7px;
        }

        .login-card {
            background: rgba(15, 23, 42, 0.96);
            border: 1px solid #1e293b;
            border-radius: 15px;
            padding: 32px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
        }

        .login-header {
            margin-bottom: 27px;
        }

        .login-header h2 {
            font-size: 21px;
            color: #f8fafc;
            margin-bottom: 7px;
        }

        .login-header p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.10);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #fca5a5;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            color: #cbd5e1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper span {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            height: 46px;
            padding: 0 14px 0 39px;
            background: #0b1120;
            border: 1px solid #263244;
            border-radius: 8px;
            color: #f8fafc;
            outline: none;
            font-family: inherit;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .form-control::placeholder {
            color: #475569;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            display: block;
            color: #fca5a5;
            font-size: 11px;
            margin-top: 6px;
        }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 23px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            font-size: 12px;
        }

        .remember input {
            width: 14px;
            height: 14px;
            accent-color: #2563eb;
        }

        .forgot {
            color: #60a5fa;
            font-size: 12px;
        }

        .forgot:hover {
            color: #93c5fd;
        }

        .login-btn {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .login-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            color: #475569;
            font-size: 11px;
        }

        @media (max-width: 500px) {

            body {
                padding: 18px;
            }

            .login-card {
                padding: 25px 20px;
            }

            .login-options {
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- BRAND -->

        <div class="brand">

            <h1>
                Portfolio<span>CMS</span>
            </h1>

            <p>
                Administration Panel
            </p>

        </div>


        <!-- LOGIN CARD -->

        <div class="login-card">

            <div class="login-header">

                <h2>Welcome back</h2>

                <p>
                    Sign in to manage your portfolio website.
                </p>

            </div>


            <!-- SESSION ERROR -->

            @if(session('error'))

                <div class="alert alert-error">
                    {{ session('error') }}
                </div>

            @endif


            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="alert alert-error">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <span>✉</span>

                        <input
                            id="email"
                            type="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@example.com"
                            required
                            autofocus
                        >

                    </div>


                    @if($errors->has('email'))

                        <span class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </span>

                    @endif

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span>●</span>

                        <input
                            id="password"
                            type="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            name="password"
                            placeholder="Enter your password"
                            required
                        >

                    </div>


                    @if($errors->has('password'))

                        <span class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </span>

                    @endif

                </div>


                <!-- OPTIONS -->

                <div class="login-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        Remember me

                    </label>


                    @if(Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-btn"
                >
                    Sign In
                </button>

            </form>

        </div>


        <div class="login-footer">
            © {{ date('Y') }} PortfolioCMS. Admin access only.
        </div>

    </div>

</body>

</html>