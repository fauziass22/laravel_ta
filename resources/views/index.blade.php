<!DOCTYPE html>
<html>
<head>
    <title>Daftar Antrian</title>
</head>
<body>
    <h1>Daftar Antrian</h1>

    @if ($antrian && $antrian->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. Antrian</th>
                    <th>Nama</th>
         
                    <th>Kategori</th>
                    <th>Poli</th>
           
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1 @endphp
                @foreach ($antrian as $data)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $data->noAntrian }}</td>
                        <td>{{ $data->nama }}</td>
                
                        <td>{{ $data->kategori }}</td>
                        <td>{{ $data->poli }}</td>
                      
                        <td>{{$data->status}}</td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data antrian.</p>
    @endif

    <a href="/antrian">Kembali</a>
</body>
</html>
