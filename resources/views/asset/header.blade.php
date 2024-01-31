<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        #navbar {
            position: fixed;
            top: "10%";
            left: "50%";
            width: auto;
            background-color: transparent;
            padding: 15px;
            color: #fff;
            z-index: 3;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #openNavButton {
            background: none;
            border: none;
            cursor: pointer;
            color: whitesmoke;
        }

        .nav-open {
            margin-right: 1000px;
        }

        #header {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            background-color: #0c296b;
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
    </style>
</head>
<body>
@if(isset($user))
                <p>Welcome, {{ $user->name }}</p>
            @endif

    <div id="navbar">
        <button class="NavButtons_menu_3aYXU Button_button3-u4P Button_circle_2Tpx-" type="button" id="openNavButton">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="1em"
                height="1em"
                fill="currentColor"
                viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <line x1="40" y1="128" x2="216" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line>
                <line x1="40" y1="64" x2="216" y2="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line>
                <line x1="40" y1="192" x2="216" y2="192" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line>
            </svg>
        </button>
    </div>

    <header id="header">
        <a href="{{ route('dashboard') }}">
            <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
        </a>
    </header>

</body>
</html>
