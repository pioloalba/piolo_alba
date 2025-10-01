<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Login</title>
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
        .landing-container {
            background: rgba(255,255,255,0.92);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
            border: 2px solid #ffe0ec;
        }
        .landing-container h1 {
            margin-bottom: 1.5rem;
            font-size: 2.2rem;
            color: #7c3aed;
        }
        .landing-container p {
            color: #6b7280;
            margin-bottom: 2.2rem;
        }
        .landing-container .btn {
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
        .landing-container .btn-secondary {
            background: #fbcfe8;
            color: #7c3aed;
        }
        .landing-container .btn:hover {
            background: #818cf8;
        }
        .landing-container .btn-secondary:hover {
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
        #login-form label {
            color: #7c3aed;
            font-weight: 500;
        }
        #login-form input {
            border: 1px solid #a5b4fc;
            border-radius: 6px;
            padding: 0.5rem;
            margin-bottom: 1rem;
            width: 100%;
        }
        #login-form input:focus {
            border-color: #7c3aed;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1>Welcome to Student Management System</h1>
        <p>Manage your students efficiently and securely.<br>Login to continue or register for a new account.</p>
        <?php if (isset($error) && !empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div style="margin-bottom: 1.5rem;">
            <a href="#login-form" class="btn" onclick="document.getElementById('login-form').style.display='block';this.style.display='none';return false;">Login</a>
            <a href="/register" class="btn btn-secondary">Register</a>
        </div>
        <form id="login-form" method="POST" action="/login" style="display:none; margin-top:1.5rem;">
            <div style="margin-bottom: 1rem; text-align:left;">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required style="width:100%;padding:0.5rem;margin-top:0.3rem;">
            </div>
            <div style="margin-bottom: 1.2rem; text-align:left;">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required style="width:100%;padding:0.5rem;margin-top:0.3rem;">
            </div>
            <button type="submit" class="btn" style="width:100%;">Login</button>
        </form>
    </div>
</body>
</html>