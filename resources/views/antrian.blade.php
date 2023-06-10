<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="{{ asset('css/antrian.css') }}" rel="stylesheet" type="text/css">

    <script>
        function validateForm() {
            var nama = document.forms["antrianForm"]["nama"].value;
            var idUser = document.forms["antrianForm"]["idUser"].value;
            var kategori = document.forms["antrianForm"]["kategori"].value;
            var poli = document.forms["antrianForm"]["poli"].value;
            var noHP = document.forms["antrianForm"]["noHP"].value;

            if (nama === '' || idUser === '' || kategori === '' || poli === '' || noHP === '') {
                alert("Lengkapi data terlebih dahulu");
                return false;
            }
        }
    </script>
</head>

<body>
<div class="image3">
        <img src="img/er.png" alt="image3">
    </div>
    <div class="contan">
    <h1>Isi Data Diri Anda</h1>
    
    <form name="antrianForm" method="post" action="{{ route('submit-form') }}" onsubmit="return validateForm()">
    @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NO KTP/BPJS</td>
                <td><input type="text" name="idUser"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" id="kategori">
                        <option value="bpjs">BPJS</option>
                        <option value="umum">Umum</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Poli</td>
                <td>
                    <select name="poli" id="poli">
                        <option value="umum">Poli Umum</option>
                        <option value="gigi">Poli Gigi</option>
                        <option value="jiwa">Poli Jiwa</option>
                        <option value="lab">Laboratorium</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="noHP"></td>
            </tr>

        </table>
        <input type="submit" value="DAFTAR">
    </form>
    </div>
    
    <div class="home">
        <a href="/">Home</a>
        <a href="/antrian">Antrian</a>
    </div>
    <div class="medclinic">Medclinic</div>

    <div class="image2">
    <img src="img/image-14.png" alt="image" width="100" height="189">
    </div>

        <div class="image">
        <img src="img/image 11.png" alt="image" width="704px" height="705px">
    </div>
    
    


</body>

</html>