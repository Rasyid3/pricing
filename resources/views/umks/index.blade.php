@include('layouts.app')
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
            display: fixed;
            justify-content: center;
            align-items: center;
            height: 100%;
            max-height: 500%;

        }

        .container {
            position: fixed;
            display:flex;
            align-items: center;
            left:10%;
            top:0%;
            height: 100%;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10%;
            z-index: 0;
            overflow-y: scroll;
            scrollbar-width: none;

        }
            .container::-webkit-scrollbar {
            display: none;
        }
        .font{
            font-family: monospace;
        }


        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
        }

        .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="font">
        <h1>UMK List</h1>
        <ul>
            @foreach ($umks as $umk)
            <li>
                <div>
                <a href="{{ route('umks.show', $umk) }}">{{ $umk->regency }} - Rp. {{ $umk->wage }} </a>
                </div>

                <div>
                <span>
                    <a href="{{ route('umks.edit', $umk) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('umks.destroy', $umk) }}" method="POST" style="display:inline;">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this UMK?')">Delete</button>
                    </form>
                </span>
                </div>
            </li>
            @endforeach
        </ul>

        <a href="{{ route('umks.create') }}" class="btn btn-primary">Add UMK</a>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
    </div>
    </div>
</body>

</html>
