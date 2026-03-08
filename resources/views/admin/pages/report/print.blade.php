<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @php
            $reportTitles = [
                'revenue' => 'Revenue Report',
                'expense' => 'Expense Report',
                'booking' => 'Booking Report',
                'driver_performance' => 'Driver Performance Report',
                'profit_loss' => 'Profit & Loss Report',
            ];
        @endphp
        {{ $reportTitles[$report_type] ?? 'Report' }} - The Royal Seat
    </title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; font-size: 12px; padding: 20px; }
        .header { text-align: center; border-bottom: 3px solid #c9982b; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { font-size: 22px; color: #c9982b; margin-bottom: 4px; }
        .header h2 { font-size: 16px; color: #555; font-weight: 500; }
        .header p { font-size: 11px; color: #888; margin-top: 6px; }
        .filters { background: #f9f9f9; border: 1px solid #e5e5e5; border-radius: 6px; padding: 10px 15px; margin-bottom: 20px; font-size: 11px; }
        .filters span { margin-right: 20px; color: #666; }
        .filters strong { color: #333; }
        .summary { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
        .summary-card { flex: 1; min-width: 140px; background: #f9f9f9; border: 1px solid #e5e5e5; border-radius: 6px; padding: 10px 14px; }
        .summary-card .label { font-size: 10px; color: #888; text-transform: uppercase; font-weight: 600; }
        .summary-card .value { font-size: 15px; font-weight: 700; color: #333; margin-top: 2px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: #c9982b; color: white; padding: 8px 10px; text-align: left; font-size: 11px; font-weight: 600; }
        td { padding: 7px 10px; border-bottom: 1px solid #eee; font-size: 11px; }
        tr:nth-child(even) { background: #fafafa; }
        tr:hover { background: #fff8e6; }
        .footer { text-align: center; margin-top: 30px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 10px; color: #999; }
        .no-print { margin-bottom: 20px; text-align: center; }
        .no-print button { background: #c9982b; color: white; border: none; padding: 10px 30px; font-size: 14px; border-radius: 6px; cursor: pointer; margin: 0 5px; }
        .no-print button:hover { background: #a67d23; }
        .no-print button.secondary { background: #6b7280; }
        .no-print button.secondary:hover { background: #4b5563; }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()">Print / Save as PDF</button>
        <button class="secondary" onclick="window.close()">Close</button>
    </div>

    <div class="header">
        <h1>The Royal Seat</h1>
        <h2>{{ $reportTitles[$report_type] ?? 'Report' }}</h2>
        <p>Generated on {{ now()->format('d M Y, h:i A') }}</p>
    </div>

    @if(!empty($filters) && array_filter($filters))
        <div class="filters">
            <strong>Filters:</strong>
            @if(!empty($filters['date_from']))
                <span>From: <strong>{{ \Carbon\Carbon::parse($filters['date_from'])->format('d M Y') }}</strong></span>
            @endif
            @if(!empty($filters['date_to']))
                <span>To: <strong>{{ \Carbon\Carbon::parse($filters['date_to'])->format('d M Y') }}</strong></span>
            @endif
            @if(!empty($filters['driver_id']))
                <span>Driver: <strong>{{ \App\Models\User::find($filters['driver_id'])->name ?? 'N/A' }}</strong></span>
            @endif
            @if(!empty($filters['vehicle_id']))
                <span>Vehicle: <strong>{{ \App\Models\Vehicle::find($filters['vehicle_id'])->name ?? 'N/A' }}</strong></span>
            @endif
            @if(!empty($filters['category']))
                <span>Category: <strong>{{ ucfirst($filters['category']) }}</strong></span>
            @endif
            @if(!empty($filters['trip_type']))
                <span>Trip Type: <strong>{{ $filters['trip_type'] }}</strong></span>
            @endif
            @if(!empty($filters['payment_mode']))
                <span>Payment: <strong>{{ $filters['payment_mode'] }}</strong></span>
            @endif
        </div>
    @endif

    @if(!empty($summary))
        <div class="summary">
            @foreach($summary as $label => $value)
                <div class="summary-card">
                    <div class="label">{{ $label }}</div>
                    <div class="value">{{ $value }}</div>
                </div>
            @endforeach
        </div>
    @endif

    @if(isset($rows) && $rows->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    @foreach($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $i => $row)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        @foreach($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align:center; padding:30px; color:#999;">No data found for the selected filters.</p>
    @endif

    <div class="footer">
        <p>The Royal Seat &mdash; Confidential Report &mdash; {{ now()->format('Y') }}</p>
    </div>
</body>
</html>
