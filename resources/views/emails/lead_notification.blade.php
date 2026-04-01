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
        .footer { margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Lead Received!</h2>
        <p>A new booking inquiry has been submitted. Please review the details below:</p>

        <div class="info-row"><span class="label">Customer Name:</span> {{ $lead->name }}</div>
        <div class="info-row"><span class="label">Email:</span> {{ $lead->email ?? 'N/A' }}</div>
        <div class="info-row"><span class="label">Booking Date:</span> {{ $lead->booking_date ? $lead->booking_date->format('d M Y') : 'N/A' }}</div>
        <div class="info-row"><span class="label">Status:</span> {{ ucfirst($lead->status ?? 'pending') }}</div>

        <p style="margin-top:20px;">Please log in to the admin panel to manage this lead.</p>

        <div class="footer">The Royal Seat &mdash; Admin Notification</div>
    </div>
</body>
</html>
