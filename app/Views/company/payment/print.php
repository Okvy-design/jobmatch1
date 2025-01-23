<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Invoice</h1>
    <p>Date: <?= date('Y-m-d'); ?></p>
    <table>
        <tr>
            <th>Project Title</th>
            <td><?= $job['title']; ?></td>
        </tr>
        <tr>
            <th>Company</th>
            <td><?= $job['nama_perusahaan']; ?></td> <!-- Diperbaiki -->
        </tr>
        <tr>
            <th>Freelancer Name</th>
            <td><?= $applicant['freelancer_name']; ?></td>
        </tr>
        <tr>
            <th>Freelancer Email</th>
            <td><?= $applicant['freelancer_email']; ?></td>
        </tr>
        <tr>
            <th>Budget</th>
            <td><?= $job['budget']; ?></td>
        </tr>
        <tr>
            <th>Deadline</th>
            <td><?= $job['deadline']; ?></td>
        </tr>
        <tr>
            <th>Proposal</th>
            <td><?= $applicant['proposal']; ?></td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td><?= $transaction['metode_bayar']; ?></td>
        </tr>
    </table>
</body>
</html>
