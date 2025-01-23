<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Perusahaan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="title">Laporan Data Perusahaan</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Tanggal Berdiri</th>
                <th>Telepon</th>
                <th>Bank</th>
                <th>Rekening</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><?= esc($company['id']); ?></td>
                    <td><?= esc($company['nama_perusahaan']); ?></td>
                    <td><?= esc($company['alamat']); ?></td>
                    <td><?= esc($company['tanggal_berdiri']); ?></td>
                    <td><?= esc($company['telepon']); ?></td>
                    <td><?= esc($company['bank']); ?></td>
                    <td><?= esc($company['rekening']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
