<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfricGEM | AfricICl</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f2ef;
            display: flex; 
            justify-content: center;
            margin: 0;
            padding: 0;
            color: #333;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            height:100%;
        }
        .header {
          width:100%;
            height: 1.5rem;
            margin: 0 auto;
        }
        .header img {
          height: 100%;
          width:100%;
          transform: scale(70%);
          object-fit: contain
          
        }

        .content {
            padding: 2.5rem 0;
        }
        .content h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-transform: capitalize;
        }
         .content img {
            width: 100%;
            height: 15rem;
            margin: 20px 0;
            object-fit: cover;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            
            
        }

        .social-icons a {
            margin: 0 10px;
            color: darkgreen;
            text-decoration: none;
            font-size: 1.5rem;
        }
        .social-icons img {
            width:2rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
    
        <img src="https://pbs.twimg.com/media/GQivQsvWoAAbedU?format=png&name=small" alt="">
    </div>
    <div class="content">
        <h1 style="color: black;">
         {{ $message_head }}
        </h1>
        @if($image_url)
            <img src="{{ $image_url }}" alt="Image">
        @endif
        <p style="color: black;">
        {{ $message_body }}
        </p>
        <p style="color: black;"><strong>{{ $message_ending }}</strong></p>
    </div>
    <div class="footer">
        <p>Follow us on</p>
        <div class="social-icons">
           <a href="https://www.facebook.com/profile.php?id=61559466455355&mibextid=ZbWKwL" target="_blank">
              <img src="https://th.bing.com/th/id/R.5d6ea38a769498dfc19fe6389d14db39?rik=XWEQ%2f%2bl01nCbHw&pid=ImgRaw&r=0" alt="Facebook">
            </a>
            <a href="https://x.com/AfricGEM?t=oJiyQR-Lw2rde3TqyFC2sQ&s=08" target="_blank">
              <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?rs=1&pid=ImgDetMain" alt="X">
            </a>
            <a href="https://africtv-research.web.app/" target="_blank">
              <img src="https://www.logolynx.com/images/logolynx/8d/8d22fff92e7d5249d75a8f931a1618c6.png" alt="Research Website">
            </a>
        </div>
    </div>
</div></Body>
</html>