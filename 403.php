<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden Area</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #4e73df;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            font-size: 120px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        p {
            font-size: 24px;
            margin-top: 0;
        }
        .figures {
            font-size: 48px;
            margin-top: 40px;
        }
        .runner {
            display: inline-block;
            transform: scaleX(-1);
            animation: run 2s infinite linear;
        }
        @keyframes run {
            0% { transform: translateX(50px) scaleX(-1); }
            100% { transform: translateX(-50px) scaleX(-1); }
        }
        .fade-out {
            animation: fadeOut 2s forwards;
        }
        @keyframes fadeOut {
            to { opacity: 0; }
        }
        .loader-container {
            display: none;
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .redirect-text {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container" id="errorContent">
        <h1>403</h1>
        <p>This is a forbidden area.</p>
    </div>
    <div class="loader-container" id="loaderContainer">
        <div class="loader" id="loadingSpinner"></div>
        <p class="redirect-text">Sending you back home</p>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('errorContent').classList.add('fade-out');
            setTimeout(() => {
                document.getElementById('errorContent').style.display = 'none';
                document.getElementById('loaderContainer').style.display = 'block';
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 2000);
            }, 2000);
        }, 3000);
    </script>
</body>
</html>