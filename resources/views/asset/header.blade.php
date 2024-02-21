<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>

        .background{
            background-color: #021C3C;
        }

        /* .stick{
            position: sticky;
            top:0;
        } */
    </style>
</head>
<body>
<div class="navbar fixed-top  background ">
    <div class="navabar">
    <button class="navbar-toggler-icon"
            type="button" id="openNavButton">
        </button>
        </div>

        <div class="navbar-brand me-auto">
            <a href="{{ route('dashboard') }}">
                <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" height="30">
            </a>
        </div>

        <div class="ml-auto">
        <form action="/logout" method="post">
                            @csrf
                            <button type="logout" class="btn btn-outline-light btn-sm ">
                                <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-white-75 small">Logout</div>
                        </div>
                    </div>
                </div>
                            </button>
                        </form>
                    </div>
    </div>

<header>
</header>

</body>
</html>




