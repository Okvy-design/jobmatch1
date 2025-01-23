<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="title">Laporan Data Transaksi</div>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Project</th>
                <th>Company</th>
                <th>Email Freelance</th>
                <th>Tanggal Transaksi</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Pengirim</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= esc($transaction['kd_transaksi']); ?></td>
                    <td><?= esc($transaction['project_name']); ?></td>
                    <td><?= esc($transaction['company_name']); ?></td>
                    <td><?= esc($transaction['freelancer_email']); ?></td>
                    <td><?= esc($transaction['tanggal']); ?></td>
                    <td><?= number_format($transaction['budget'], 2, ',', '.'); ?></td>
                    <td><?= esc($transaction['status']); ?></td>
                    <td><?= esc($transaction['rekening_pengirim']); ?></td> <!-- Menampilkan rekening pengirim -->
                    <td><?= esc($transaction['rekening_penerima']); ?></td> <!-- Menampilkan rekening penerima -->
                                            
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
