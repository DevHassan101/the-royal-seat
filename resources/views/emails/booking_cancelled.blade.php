<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; border-radius: 8px; padding: 30px; }
        h2 { color: #c0392b; }
        .info-row { margin: 8px 0; }
        .label { font-weight: bold; color: #555; }
        .cancel-box { background: #fff5f5; border-left: 4px solid #c0392b; padding: 15px; border-radius: 4px; margin: 20px 0; }
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Cancelled</h2>

        <div class="cancel-box">
            <p>We regret to inform you that the following booking has been <strong>cancelled</strong> by the admin.</p>
        </div>

        <div class="info-row"><span class="label">Customer:</span> {{ $booking->customer_name }}</div>
        <div class="info-row"><span class="label">Pickup Time:</span> {{ $booking->pickup_time->format('d M Y, h:i A') }}</div>
        <div class="info-row"><span class="label">Pickup Location:</span> {{ $booking->pickup_location }}</div>
        <div class="info-row"><span class="label">Drop-off Location:</span> {{ $booking->drop_off_location }}</div>
        <div class="info-row"><span class="label">Trip Type:</span> {{ $booking->trip_type }}</div>

        <p style="margin-top:20px;">If you have any questions, please contact us directly.</p>

        <div class="footer">The Royal Seat &mdash; Booking Cancelled</div>
    </div>
</body>
</html>
