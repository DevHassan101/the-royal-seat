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
        .highlight { background: #f0f7ff; padding: 15px; border-radius: 6px; margin: 20px 0; }
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Confirmation</h2>
        <p>Your booking has been confirmed. Here are the trip details:</p>

        <div class="highlight">
            <div class="info-row"><span class="label">Customer:</span> {{ $booking->customer_name }}</div>
            <div class="info-row"><span class="label">Pickup Time:</span> {{ $booking->pickup_time->format('d M Y, h:i A') }}</div>
            <div class="info-row"><span class="label">Pickup Location:</span> {{ $booking->pickup_location }}</div>
            <div class="info-row"><span class="label">Drop-off Location:</span> {{ $booking->drop_off_location }}</div>
            <div class="info-row"><span class="label">Trip Type:</span> {{ $booking->trip_type }}</div>
            <div class="info-row"><span class="label">Payment Mode:</span> {{ $booking->payment_mode }}</div>
            <div class="info-row"><span class="label">Total Amount:</span> AED {{ number_format($booking->total_amount, 2) }}</div>
        </div>

        <p>Thank you for choosing The Royal Seat. We look forward to serving you.</p>

        <div class="footer">The Royal Seat &mdash; Booking Confirmation</div>
    </div>
</body>
</html>
