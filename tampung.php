<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampung Data</title>
</head>

<body>
    <div class="div">
        <p>Data Yang diinputkan dari Form Berikut ini</p>
        <ul>
            <li>Nama : <?= $_POST['name'] ?></li>
            <li>NIK : <?= $_POST['nik'] ?></li>
            <li>Kecamatan : <?= $_POST['district'] ?></li>
            <li>Kelurahan : <?= $_POST['villages'] ?></li>
            <li>Alamat : <?= $_POST['address'] ?></li>
            <li>Kode Pos : <?= $_POST['postal_code'] ?></li>
            <li>No.Telepon : <?= $_POST['phone'] ?></li>
            <li>Lahir : <?= $_POST['birthDay'] ?></li>
            <li>Nama Posyandu : <?= $_POST['posyandu_name'] ?></li>
            <li>Kecamatan Posyandu : <?= $_POST['posyandu_district'] ?></li>
            <li>Kelurahan Posyandu : <?= $_POST['posyandu_village'] ?></li>
            <li>Alamat Posyandu : <?= $_POST['posyandu_address'] ?></li>
        </ul>
    </div>
</body>

</html>