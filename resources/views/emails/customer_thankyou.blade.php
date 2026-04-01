<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; border-radius: 8px; padding: 30px; }
        h2 { color: #1a1a2e; }
        .info-row { margin: 8px 0; }
        .label { font-weight: bold; color: #555; }
        .thank-box { background: #fffbf0; border-left: 4px solid #f0c040; padding: 15px; border-radius: 4px; margin: 20px 0; }
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank You, {{ $booking->customer_name }}!</h2>

        <div class="thank-box">
            <p>We hope you had a wonderful experience with <strong>The Royal Seat</strong>. It was our pleasure to serve you.</p>
        </div>

        <p>Here is a summary of your completed trip:</p>

        <div class="info-row"><span class="label">Pickup:</span> {{ $booking->pickup_location }}</div>
        <div class="info-row"><span class="label">Drop-off:</span> {{ $booking->drop_off_location }}</div>
        <div class="info-row"><span class="label">Date:</span> {{ $booking->pickup_time->format('d M Y, h:i A') }}</div>
        <div class="info-row"><span class="label">Total Charged:</span> AED {{ number_format($booking->total_amount, 2) }}</div>

        <p style="margin-top:20px;">We look forward to welcoming you again. For any queries, feel free to reach out to us.</p>

        <div class="footer">The Royal Seat &mdash; Thank You</div>
    </div>
</body>
</html>
