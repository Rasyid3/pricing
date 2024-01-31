<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.app')
    <style>
        head {
            height: 100%;
            width: 100%
        }
        body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            z-index: -3;
        }

        .container {
            display: fixed;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 50px;
            z-index: 0;
        }



        .card {
            position:"fixed";
            background-color: #959fa6;
            height: 18%;
            width: 25%;
            transition: transform 0.3s ease;
            overflow: hidden;
            z-index: 1;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            width:100%
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .label{
            position: relative;
            font-family:'Courier New', Courier, monospace;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        /* .nametag{
            position:"fixed";
            display:"flex";
            width:100%;
            height:50%;
            clip-path: polygon(50% 0%, 100% 0, 100% 35%, 66% 63%, 48% 76%, 33% 63%, 0% 35%, 0 0);
            background-color:black;

        } */



    </style>
</head>
<body>




        @if(auth()->check())
        <div class="container">
            <!-- <div class="nametag"> Halo User</div> -->
            <div class="card">
                <a href="{{ route('security_pricing') }}" style="text-decoration: none; color: inherit;">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
            <div class="me-3">
            <div class="label">Security Pricing</div>
                     </div>
                                <i class="feather-xl text-white-50" data-feather="lock"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@else
    <p>Please log in to access the dashboard.</p>

@endif
    </div>


</body>

</html>
