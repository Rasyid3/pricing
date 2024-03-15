<!DOCTYPE html>
<html lang="en">
@include('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>

    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="font-monospace">
            <div class="text-center">
                <h1>Job Title List</h1>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th data-field="subjob">Job Title</th>
                            <th data-field="AddWage">Additional Wage</th>
                            <th data-field="T.jab">Tunjangan Jabatan</th>
                            <th data-field="T.Kom">Tunjangan Komunikasi</th>
                            <th data-field="T.trans">Tunjangan Transportasi</th>
                            <th data-field="T.mkn">Tunjangan Makan</th>
                            <th data-field="T.lemb">Tunjangan Lembur</th>
                            <th data-field="T.shift">Tunjangan Shift</th>
                            <th> Action </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subJobs as $subJob)
                        <tr>
                            <td> {{$subJob->subtitle}} </td>
                            <td> <span class="wage"> {{ $subJob->additional_wage }} </span></td>
                            <td> <span class="tunjangan-jabatan"> {{ $subJob->tunjangan_jabatan }} </span></td>
                            <td> <span class="tunjangan-komunikasi"> {{ $subJob->tunjangan_komunikasi }} </span></td>
                            <td> <span class="tunjangan-transportasi"> {{ $subJob->tunjangan_transportasi }} </span></td>
                            <td> <span class="tunjangan-makan"> {{ $subJob->tunjangan_makan }} </span></td>
                            <td> <span class="tunjangan-lembur"> {{ $subJob->tunjangan_lembur }} </span></td>
                            <td> <span class="tunjangan-shift"> {{ $subJob->tunjangan_shift }} </span></td>
                            <td>
                                <a href="{{route('sub_jobs.show', $subJob)}}" class="btn btn-info">View</a>
                                <a href="{{route('sub_jobs.edit', $subJob)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('sub_jobs.destroy', $subJob)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="btn-container">
                    <a href="{{ route('sub_jobs.create') }}" class="btn btn-primary">Create</a>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatCurrency(amount) {
            var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return 'Rp' + formattedAmount;
        }

        var wageElements = document.querySelectorAll('.wage');
        var tunjanganJabatanElements = document.querySelectorAll('.tunjangan-jabatan');
        var tunjanganKomunikasiElements = document.querySelectorAll('.tunjangan-komunikasi');
        var tunjanganTransportasiElements = document.querySelectorAll('.tunjangan-transportasi');
        var tunjanganMakanElements = document.querySelectorAll('.tunjangan-makan');
        var tunjanganLemburElements = document.querySelectorAll('.tunjangan-lembur');
        var tunjanganShiftElements = document.querySelectorAll('.tunjangan-shift');


        wageElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganJabatanElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganKomunikasiElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganTransportasiElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganMakanElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganLemburElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
        tunjanganShiftElements.forEach(function(element) {
            element.textContent = formatCurrency(element.textContent);
        });
    </script>
</body>

</html>
