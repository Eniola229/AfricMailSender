<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfricGEM</title>
    <style>
        /* Bootstrap styles for email */
        .container {
            width: 100%;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }
        .header, .footer {
            background-color: darkgreen;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .text-center {
            text-align: center;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
            display: inline-block;
        }
        .header-image {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
           <img src="{{ $attachments }}" alt="AfricTv" class="header-image">
        </div>
        <div class="content">
            <h2>{{ $message_head }}</h2>
            <p>{{ $message_body }}</p><!-- 
            <p class="text-center mt-3">
                <a href="#" class="btn-primary">Verify Email</a>
            </p> -->
            <p>{{ $message_ending }}</p>
            <p>Best regards,<br> Omobolanle Fashakin <br> AfricICL | AfricTv </p>
        </div>
        <div class="footer">
            <p>&copy; 2024 AfricInfo. All rights reserved.</p>
            <div class="social-icons">
                <p>Follow us:</p>
                <a href="https://x.com/TvAfric47294">
                    <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?rs=1&pid=ImgDetMain" alt="X (Twitter)">
                </a>
                <a href="https://www.facebook.com/profile.php?id=61559466455355&mibextid=ZbWKwL">
                    <img src="https://th.bing.com/th/id/OIP.sLFgKczZ7c771m9TOYCyCwHaFL?rs=1&pid=ImgDetMain" alt="Facebook">
                </a>
                <a href="https://africtv-research.web.app/">
                    <img src="https://th.bing.com/th/id/R.a9147d6d14703c6cfaffc7703d3e30b1?rik=qvnWPrUgPhtZuA&pid=ImgRaw&r=0" alt="Afric Research Website Website">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
