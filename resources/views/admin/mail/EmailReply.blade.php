<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $subject }}</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      background-color: #f4f4f7;
      color: #333333;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }
    .wrapper {
      max-width: 600px;
      margin: 30px auto;
      background: #ffffff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
    }
    .header {
      background: #111217;
      padding: 30px 40px;
      text-align: center;
      border-bottom: 2px solid #f19500;
    }
    .header h1 {
      color: #ffffff;
      margin: 0;
      font-size: 20px;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .content {
      padding: 35px 40px;
    }
    .greeting {
      font-size: 16px;
      font-weight: 600;
      color: #171717;
      margin-bottom: 20px;
    }
    .message-box {
      background: #f8fafc;
      border-left: 4px solid #406422;
      padding: 16px 20px;
      border-radius: 0 10px 10px 0;
      margin: 20px 0;
      color: #2d3748;
      font-size: 15px;
      white-space: pre-line;
    }
    .footer {
      background: #fafafa;
      padding: 24px 40px;
      text-align: center;
      font-size: 12px;
      color: #718096;
      border-top: 1px solid #edf2f7;
    }
    .footer strong {
      color: #4a5568;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <h1>Solo International Performing Arts (SIPA)</h1>
    </div>
    
    <div class="content">
      <div class="greeting">
        Yth. {{ $name }},
      </div>
      
      <p style="color: #4a5568; font-size: 14px; margin-bottom: 15px;">
        Terima kasih telah menghubungi kami. Berikut adalah tanggapan resmi dari tim SIPA Festival terkait pertanyaan/aduan Anda:
      </p>

      <div class="message-box">
        {{ $body }}
      </div>

      <p style="color: #718096; font-size: 13px; margin-top: 25px;">
        Jika Anda memiliki pertanyaan lebih lanjut, Anda dapat membalas email ini secara langsung atau menghubungi kami melalui situs resmi SIPA Festival.
      </p>
    </div>

    <div class="footer">
      <p style="margin: 0 0 6px 0;"><strong>Tim Humas & Layanan Informasi SIPA Festival</strong></p>
      <p style="margin: 0;">Solo International Performing Arts • Surakarta, Indonesia</p>
      <p style="margin: 6px 0 0 0; color: #a0aec0;">&copy; {{ date('Y') }} SIPA Festival. All rights reserved.</p>
    </div>
  </div>
</body>
</html>