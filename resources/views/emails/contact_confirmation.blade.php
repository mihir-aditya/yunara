<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Confirmation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background-color: #f9f8f6;
            color: #2c2a25;
            margin: 0;
            padding: 40px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 50px 40px;
            border: 1px solid #eaeaea;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header img {
            max-width: 120px;
            height: auto;
        }
        .header h1 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-weight: 300;
            font-size: 26px;
            margin-top: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #1a1a1a;
        }
        .content {
            line-height: 1.8;
            font-size: 15px;
            font-weight: 300;
            color: #444;
        }
        .content h2 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 22px;
            font-weight: 400;
            color: #1a1a1a;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 11px;
            color: #999;
            border-top: 1px solid #f0f0f0;
            padding-top: 30px;
            letter-spacing: 1px;
        }
        .accent {
            display: inline-block;
            width: 40px;
            height: 1px;
            background-color: #d4af37;
            margin: 10px 0;
        }
        @media only screen and (max-width: 600px) {
            body { padding: 20px 0; }
            .container { max-width: 100%; padding: 32px 22px; border-left: none; border-right: none; }
            .header h1 { font-size: 21px; letter-spacing: 2px; }
            .content h2 { font-size: 19px; }
            .content { font-size: 14px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Absolute URL to the logo -->
            <img src="{{ config('app.url') }}/assets/logo.png" alt="Yunara Productions">
            <br>
            <span class="accent"></span>
            <h1>Yunara Productions</h1>
        </div>
        <div class="content">
            <h2>Dear {{ $data['name'] }},</h2>
            <p>Thank you for reaching out to Yunara Productions. We have successfully received your inquiry regarding a <strong>{{ $data['type'] }}</strong>.</p>
            <p>Our concierge team is currently reviewing your vision and will be in touch with you shortly to discuss how we can bring your luxury event to life.</p>
            <br>
            <p>With warm regards,</p>
            <p><strong>The Yunara Team</strong><br>
            <em>Omotenashi in Every Detail</em></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Yunara Productions. All rights reserved.<br>
            Miami, Florida
        </div>
    </div>
</body>
</html>