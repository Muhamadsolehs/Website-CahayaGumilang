<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .total-row {
            font-weight: bold;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Laporan Keuangan</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanKeuangan as $data)
                <tr>
                    <td>{{ $data['tanggal'] }}</td>
                    <td>{{ $data['keterangan'] }}</td>
                    <td class="text-right">{{ $data['debit'] ? number_format($data['debit'], 2) : '-' }}</td>
                    <td class="text-right">{{ $data['kredit'] ? number_format($data['kredit'], 2) : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2">Total</td>
                <td class="text-right">{{ number_format($totalDebit, 2) }}</td>
                <td class="text-right">{{ number_format($totalKredit, 2) }}</td>
            </tr>
            <tr class="total-row">
                <td colspan="3">Saldo Akhir</td>
                <td class="text-right">{{ number_format($saldoAkhir, 2) }}</td>
            </tr>
        </tfoot>
    </table>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>
</html>
