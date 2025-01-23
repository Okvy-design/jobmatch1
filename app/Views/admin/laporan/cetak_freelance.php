<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Freelancer</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .print-btn { display: none; }
    </style>
</head>
<body>
    <div class="title">Laporan Freelancer</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Skills</th>
                <th>Portfolio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($freelancers as $freelancer): ?>
                <tr>
                    <td><?= esc($freelancer['id']); ?></td>
                    <td><?= esc($freelancer['username']); ?></td>
                    <td><?= esc($freelancer['email']); ?></td>
                    <td><?= esc($freelancer['tanggal_lahir']); ?></td>
                    <td><?= esc($freelancer['alamat']); ?></td>
                    <td><?= esc($freelancer['telepon']); ?></td>
                    <td><?= esc($freelancer['skills']); ?></td>
                    <td><a href="<?= esc($freelancer['portfolio']); ?>" target="_blank">View</a></td>
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
