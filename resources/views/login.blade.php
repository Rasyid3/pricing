<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            #header {
                position: fixed;
                top: 0;
                right: 0;
                width: 100%;
                background-color: #021C3C;
                padding: 15px 20px;
                z-index: 2;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            #header img {
                position: relative;
                height: 30px;
                width: auto;
                left: 1000px;
                margin-right: 100px;
            }

            #header a {
                text-decoration: none;
                color: #fff;
            }

            #header a:hover {
                color: transparent;
            }
            .container {

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background-color: #FFF;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                padding: 50px;
                clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 50% 100%, 0% 80%);

            }
            h1 {
                font-size: 2rem;
                margin-bottom: 30px;
            }
            form {
                display: fixed;
                flex-direction: column;
                align-items: center;
                width: 40%;
            }
            label {
                font-size: 1.2rem;
                margin-bottom: 10px;
                text-align: left;
                width: 100%;
            }
            input[type="text"], input[type="password"] {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                font-size: 1.2rem;
                width: 100%;
                box-sizing: border-box;
                margin-bottom: 20px;
            }
            input[type="submit"] {
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                font-size: 1.2rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            input[type="submit"]:hover {
                background-color: #3e8e41;
            }
            .footer {
                font-size: 0.8rem;
                margin-top: 30px;
                text-align: center;
            }
        </style>
    </head>
    <header id="header">
            <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
        </a>
    </header>

    <body>
    <div class="container">
    <h1>Login</h1>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login">
            </form>
        </div>
    </body>
    </html>
