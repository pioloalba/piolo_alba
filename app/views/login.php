<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Login</title>
    <link rel="stylesheet" href="/public/css/auth.css">
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/002/058/343/large_2x/abstract-technology-pixel-background-design-free-vector.jpg');
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
            background: rgba(255,255,255,0.95);
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .landing-container h1 {
            margin-bottom: 1.5rem;
            font-size: 2.2rem;
            color: #222;
        }
        .landing-container p {
            color: #444;
            margin-bottom: 2.2rem;
        }
        .landing-container .btn {
            display: inline-block;
            margin: 0.5rem 0.5rem 0 0.5rem;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }
        .landing-container .btn-secondary {
            background: #6c757d;
        }
        .landing-container .btn:hover {
            background: #0056b3;
        }
        .landing-container .btn-secondary:hover {
            background: #495057;
        }
        .error {
            color: #b00020;
            background: #ffeaea;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
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