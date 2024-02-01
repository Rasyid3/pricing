@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body{

    }

    .container{
        position: fixed;
        align-items: center;
        left:10%;
        top:0%;
        height: 100%;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 5%;
        z-index: 0;
        overflow-y: scroll;
        scrollbar-width: none;
    }

    .container::-webkit-scrollbar{
        display:none;
    }

    .font{
        font-family:monospace;
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
    .btn-container {
            display: flex;
            margin-top: 20px;
        }

    .btn {
            margin: 0 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="font">
    <h1>BPJS List</h1>

    <ul>
        @foreach ($bpjsItems as $item)
            <li>
                <div>
                <a href="{{ route('bpjsp.show', $item) }}">{{ $item->nama_bpjs }} - {{ $item->nominal_persentase * 100}}%</a>
                </div>
                <span>
                    <div>
                    <a href="{{ route('bpjsp.edit', $item) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bpjsp.delete', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                    </form>
                    <div>
                </span>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('bpjsp.create') }}" class="btn btn-primary">Add BPJS</a>
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
    </div>
    </div>
</body>
</html>
