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

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 5%;
            left: 0;
            background-color: #0c296b;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            object-fit: fill;
        }

        .sidenav a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            cursor: pointer;
        }

        #main {
            transition: margin-left 0.5s;
            padding: 20px;
            z-index: 2;
        }

        @media screen and (max-height: 450px) {
            .sidenav { padding-top: 15px;
            height: 150%;
            width: 0;
            position: flex;
            z-index: 1;
            top: 5%;
            left: 0;
            background-color: #0c296b;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }}
            .sidenav a {
            font-size: 16px; }
        .font{
            font-family:  monospace;
        }
        .sidenav-footer{
            position:absolute;
            color:#818181;
            bottom:0%;
        }

    </style>
</head>
<body>

    <nav class="sidenav shadow-right sidenav-light">
        <div id="mySidenav" class="sidenav">
            <div class="font">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="{{ route('umks.index') }}">UMK</a>
            <a href="{{ route('persons.index') }}">Persons</a>
            <a href="{{ route('jobs.index') }}">Jobs</a>
            <a href="{{ route('sub_jobs.index') }}">Sub Jobs</a>
            <a href="{{ route('perlengkapan.index') }}">Perlengkapan</a>
            <a href="{{ route('bpjsp.index') }}">BPJS</a>
            <a href="{{ route('benefit.index') }}">Benefit</a>
</div>
        </div>
    </nav>


    <div id="main">

</div>

    <script>
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

</body>
</html>
