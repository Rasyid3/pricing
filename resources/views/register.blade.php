<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        #header {
            top: 0;
            left: 0;
            width: 100%;
            height: 5%;
            background-color: #021C3C;
            padding: 20px 0;
            transition: background-color 0.3s ease;
        }

        #form-container {
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: column;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>

<header id="header" class="fixed-top header-transparent header-scrolled">
     <a href="https://garudapratama.com/">
     <img src="https://garudapratama.com/assets/images/gdps_white_logo.png"
        alt=""
        height="100%"
        top = "10%"
        class="img-fluid"></a>
<body>


<script>

</script>

<div id="form-container">
    <h2>Registration Form</h2>
    <form method="POST" action="{{ url('register') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required />
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required />
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required />
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required />
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
<div>
        <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
    </div>


</div>

</body>
</html>
