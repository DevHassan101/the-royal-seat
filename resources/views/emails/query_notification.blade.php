<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f4; 
            margin: 0; 
            padding: 20px; 
        }
        .container { 
            max-width: 600px; 
            margin: auto; 
            background: #fff; 
            border-radius: 8px; 
            padding: 30px; 
        }
        h2 { 
            color: #1a1a2e; 
            margin-bottom: 10px;
        }
        p { 
            color: #444; 
            line-height: 1.5;
        }
        .info-row { 
            margin: 10px 0; 
        }
        .label { 
            font-weight: bold; 
            color: #555; 
        }
        .highlight {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }
        .footer { 
            margin-top: 30px; 
            font-size: 12px; 
            color: #999; 
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Customer Inquiry</h2>
        <p>
            A new customer has submitted an inquiry through your website. 
            Please review the details below and respond promptly.
        </p>

        <div class="highlight">
            <div class="info-row">
                <span class="label">Name:</span> {{ $query->name }}
            </div>
            <div class="info-row">
                <span class="label">Email:</span> {{ $query->email ?? 'N/A' }}
            </div>
            <div class="info-row">
                <span class="label">Phone:</span> {{ $query->phone ?? 'N/A' }}
            </div>
            <div class="info-row">
                <span class="label">Subject:</span> {{ $query->subject ?? 'N/A' }}
            </div>
            <div class="info-row">
                <span class="label">Message:</span><br>
                {{ $query->message ?? 'N/A' }}
            </div>
        </div>

        <div class="footer">
            This is an automated notification from <strong>The Royal Seat</strong> system.
        </div>
    </div>
</body>
</html>
