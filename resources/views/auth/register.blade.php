
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskManager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #000428, #004e92);
        }

        .wrapper {
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.5);
        }

        .wrapper .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #000428;
            text-transform: uppercase;
        }

        .wrapper form .field {
            height: 50px;
            width: 100%;
            position: relative;
            margin: 25px 0;
        }

        .wrapper form .field input {
            height: 100%;
            width: 100%;
            border: none;
            background: #f5f5f5;
            border-radius: 30px;
            outline: none;
            padding: 0 15px;
            font-size: 18px;
            font-weight: 400;
            color: #333;
            transition: all 0.3s ease;
        }

        .wrapper form .field input:focus {
            background: #e0e0e0;
        }

        .wrapper form .field input::placeholder {
            color: #999;
            font-size: 18px;
            font-weight: 300;
        }

        .wrapper form .field label {
            position: absolute;
            top: 50%;
            left: 15px;
            color: #999;
            transform: translateY(-50%);
            font-size: 18px;
            font-weight: 400;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .wrapper form .field input:focus~label,
        .wrapper form .field input:valid~label {
            top: 0%;
            font-size: 14px;
            color: #000428;
        }

        .wrapper .content .pass-link {
            margin-top: 15px;
        }

        .wrapper .content .pass-link a {
            color: #000428;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .wrapper .content .pass-link a:hover {
            text-decoration: underline;
        }

        .wrapper form .field .submit-btn {
            height: 50px;
            width: 100%;
            border: none;
            background: #000428;
            border-radius: 25px;
            outline: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .wrapper form .field .submit-btn:hover {
            background: #004e92;
        }

        .wrapper .signup-link {
            margin-top: 15px;
            font-size: 16px;
            color: #333;
        }

        .wrapper .signup-link a {
            color: #000428;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .wrapper .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="/echrif.rayan/register">
            @csrf
            <div class="title">Créer un compte</div>
            <div class="field">
                <input type="text" name="name" required>
                <label>Nom</label>
            </div>
            <div class="field">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Mot de Passe</label>
            </div>
            <div class="field">
                <input type="password" name="password_confirmation" required>
                <label>Retapez le Mot de Passe</label>
            </div>
            <div class="field">
                <button type="submit" class="submit-btn">Créer un compte</button>
            </div>
        </form>
        <div class="signup-link">
            Vous avez déjà un compte? <a href="{{ route('login') }}">Connectez-vous</a>
        </div>
    </div>
</body>
</html>


<hr>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

@include('components.footer')