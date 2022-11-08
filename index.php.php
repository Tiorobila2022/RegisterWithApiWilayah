<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $nik = $_POST['nik'];
    $district = $_POST['district'];
    $village = $_POST['village'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $birthDay = $_POST['birthDay'];
    $posyandu_name = $_POST['posyandu_name'];
    $posyandu_district = $_POST['posyandu_district'];
    $posyandu_village = $_POST['posyandu_village'];
    $posyandu_address = $_POST['posyandu_address'];

    $data = array(
        'name' => $name,
        'nik' => $nik,
        'district' => $district,
        'village' => $village,
        'address' => $address,
        'postal_code' => $postal_code,
        'phone' => $phone,
        'birthDay' => $birthDay,
        'posyandu_name' => $posyandu_name,
        'posyandu_district' => $posyandu_district,
        'posyandu_village' => $posyandu_village,
        'posyandu_address' => $posyandu_address,
    );

    $payload = json_encode($data);

    $ch = curl_init('http://103.116.168.146/api/registrasi-kader');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    // Set HTTP Header for POST request
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        )
    );

    // Submit the POST request
    $result = curl_exec($ch);

    // Close cURL session handle
    curl_close($ch);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Kader Posyandu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white text-center pt-3 pb-3 "><b>Data Kader</b></div>
            <div class="card-body">
                <form class="form-container" action method="POST">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap anda" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor NIK Sesuai KTP" required>
                    </div>
                    <div class="form-group">
                        <label for="district">Kecamatan</label>
                        <!--  <input type="text" class="form-control" id="district" name="district" required> -->
                        <select class="form-select" id="district" name="district" aria-label="Default select example">
                            <option selected>Pilih Kecamatan Anda</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="village">Kelurahan/Desa</label>
                        <!-- <input type="text" class="form-control" id="village" name="village" required> -->
                        <select class="form-select" id="village" name="village" aria-label="Default select example">
                            <option selected>Pilih Kelurahan/Desa Anda</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" placeholder="Masukkan Alamat anda" id="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Kode POS</label>
                        <input type="number" class="form-control" id="postal_code" placeholder="Masukkan Kode POS anda" name="postal_code" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">No.Telpon</label>
                        <input type="number" class="form-control" id="phone" placeholder="Masukkan Nomor Telepon Aktif anda" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="birthDay">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birthDay" name="birthDay" required>
                    </div>
                    <div class="form-group">
                        <label for="posyandu_name">Nama Posyandu</label>
                        <input type="text" class="form-control" id="posyandu_name" placeholder="Masukkan Nama Posyandu anda" name="posyandu_name" required>
                    </div>
                    <div class="form-group">
                        <label for="posyandu_district">Kecamatan Posyandu</label>
                        <!-- <input type="text" class="form-control" id="posyandu_district" placeholder="Masukkan Kecamatan Posyandu Anda name=" posyandu_district" required> -->
                        <select class="form-select" id="posyandu_district" name="posyandu_district" aria-label="Default select example">
                            <option selected>Pilih Kecamatan Anda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="posyandu_village">Kelurahan/Desa Posyandu</label>
                        <!-- <input type="text" class="form-control" id="posyandu_village" placeholder="Masukkan Nama Posyandu anda" name="posyandu_village" required> -->
                        <select class="form-select" id="posyandu_village" name="posyandu_village" aria-label="Default select example">
                            <option selected>Pilih Kelurahan Anda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="posyandu_address">Alamat Posyandu</label>
                        <textarea class="form-control" name="posyandu_address" placeholder="Masukkan Alamat Posyandu anda" id="posyandu_address" required></textarea>
                    </div>

                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Dropdown Wilayah Kader -->
    <script>
        fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/1275.json`)
            .then(response => response.json())
            .then(districts => {
                var data = districts;
                var tampung = '<option>Pilih Kecamatan Anda</option>';
                data.forEach(element => {
                    tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('district').innerHTML = tampung;
            });
    </script>
    <script>
        const selectKec = document.getElementById('district');
        selectKec.addEventListener('change', (e) => {
            console.log(e.target.value);
            var district = e.target.options[e.target.selectedIndex].dataset.reg;
            console.log(district);
            fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${district}.json`)
                .then(response => response.json())
                .then(villages => {
                    var data = villages;
                    var tampung = '<option>Pilih Kelurahan Anda</option>';
                    document.getElementById('village').innerHTML = '<option>Pilih Kelurahan Anda</option>';
                    data.forEach(element => {
                        tampung += `<option value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById('village').innerHTML = tampung;
                });
        });

        const selectKel = document.getElementById('village');
        selectKel.addEventListener('change', (e) => {
            console.log(e.target.value);
            // var villages = e.target.options[e.target.selectedIndex].dataset.reg;
            // console.log(villages);
            // fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${villages}.json`)
            //     .then(response => response.json())
            //     .then(villages => {
            //         var data = villages;
            //         var tampung = '<option>Pilih Kecamatan Anda</option>';
            //         data.forEach(element => {
            //             tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
            //         });
            //         document.getElementById('villages').innerHTML = tampung;
            //     });
        });
    </script>

    <!-- Dropdown Wilayah Posyandu -->
    <script>
        fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/1275.json`)
            .then(response => response.json())
            .then(districts => {
                var data = districts;
                var tampung = '<option>Pilih Kecamatan Anda</option>';
                data.forEach(element => {
                    tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('posyandu_district').innerHTML = tampung;
            });
    </script>
    <script>
        const selectKecPos = document.getElementById('posyandu_district');
        selectKecPos.addEventListener('change', (e) => {
            console.log(e.target.value);
            var posyandu_district = e.target.options[e.target.selectedIndex].dataset.reg;
            console.log(posyandu_district);
            fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${posyandu_district}.json`)
                .then(response => response.json())
                .then(posyandu_villages => {
                    var data = posyandu_villages;
                    var tampung = '<option>Pilih Kecamatan Anda</option>';
                    data.forEach(element => {
                        tampung += `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById('posyandu_village').innerHTML = tampung;
                });
        });

        const selectKelPos = document.getElementById('posyandu_village');
        selectKelPos.addEventListener('change', (e) => {
            console.log(e.target.value);
            // var posyandu_village = e.target.options[e.target.selectedIndex].dataset.vill;
            // console.log(posyandu_village);
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>