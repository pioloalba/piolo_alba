<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/public/css/auth.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #ffe0ec 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background: rgba(255,255,255,0.94);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 420px;
            width: 100%;
            text-align: center;
            border: 2px solid #ffe0ec;
        }
        .register-container h1 {
            margin-bottom: 1.5rem;
            font-size: 2.1rem;
            color: #7c3aed;
        }
        .register-container p {
            color: #6b7280;
            margin-bottom: 2.2rem;
        }
        .register-container .btn {
            display: inline-block;
            margin: 0.5rem 0.5rem 0 0.5rem;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            border: none;
            border-radius: 6px;
            background: #a5b4fc;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }
        .register-container .btn-secondary {
            background: #fbcfe8;
            color: #7c3aed;
        }
        .register-container .btn:hover {
            background: #818cf8;
        }
        .register-container .btn-secondary:hover {
            background: #f472b6;
            color: #fff;
        }
        .error {
            color: #b00020;
            background: #ffeaea;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
        }
        .register-form label {
            color: #7c3aed;
            font-weight: 500;
        }
        .register-form input {
            border: 1px solid #a5b4fc;
            border-radius: 6px;
            padding: 0.5rem;
            margin-bottom: 1rem;
            width: 100%;
        }
        .register-form input:focus {
            border-color: #7c3aed;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Create an Account</h1>
        <p>Register to access the Student Management System.</p>
        <?php if (isset($error) && !empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form class="register-form" method="POST" action="/register">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit" class="btn">Register</button>
        </form>
        <div style="margin-top: 1.2rem;">
            <a href="/login" class="btn btn-secondary">Back to Login</a>
        </div>
    </div>
</body>
</html>