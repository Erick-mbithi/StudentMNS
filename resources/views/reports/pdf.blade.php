
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ushindi College Reports</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2, h3 {
            text-align: center;
        }

        .summary {
            margin: 20px 0;
            padding: 10px;
            background: #f2f2f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 7px;
            text-align: left;
        }

        th {
            background: #eaeaea;
        }
    </style>
</head>

<body>

    <h2>USHINDI COLLEGE</h2>
    <h3>Financial & Payment Report</h3>

    <p>Generated: {{ now()->format('d M Y, H:i') }}</p>

    <div class="summary">
        <p>
            <strong>Total Collected:</strong>
            KSh {{ number_format($totalCollected, 2) }}
        </p>

        <p>
            <strong>Pending Payments:</strong>
            KSh {{ number_format($totalPending, 2) }}
        </p>
    </div>

    <h3>Payment Transactions</h3>

    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Reference</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>
                        {{ $payment->student->first_name ?? '' }}
                        {{ $payment->student->last_name ?? '' }}
                    </td>

                    <td>KSh {{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->transaction_reference ?? 'N/A' }}</td>
                    <td>{{ $payment->payment_date?->format('d M Y') ?? 'N/A' }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No payment records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
