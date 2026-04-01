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
        .badge { display: inline-block; background: #28a745; color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 13px; }
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Completed <span class="badge">Complete</span></h2>
        <p>A booking has been marked as completed by the driver. Details below:</p>

        <div class="info-row"><span class="label">Customer:</span> {{ $booking->customer_name }}</div>
        <div class="info-row"><span class="label">Pickup Time:</span> {{ $booking->pickup_time->format('d M Y, h:i A') }}</div>
        <div class="info-row"><span class="label">Pickup Location:</span> {{ $booking->pickup_location }}</div>
        <div class="info-row"><span class="label">Drop-off Location:</span> {{ $booking->drop_off_location }}</div>
        <div class="info-row"><span class="label">Trip Type:</span> {{ $booking->trip_type }}</div>
        <div class="info-row"><span class="label">Total Amount:</span> AED {{ number_format($booking->total_amount, 2) }}</div>
        @if($booking->driver)
        <div class="info-row"><span class="label">Driver:</span> {{ $booking->driver->name }}</div>
        @endif

        <div class="footer">The Royal Seat &mdash; Admin Notification</div>
    </div>
</body>
</html>
