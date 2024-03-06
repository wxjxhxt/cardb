<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Result</title>
    <style>
        body {
            text-align: center;
            padding: 50px;
            background: linear-gradient(to right , #314755 , #26a0da);
        }

        #payment-done {
            font-size: 50px;
            color: white;
            font-weight: bold;
        }
        button {
            font-size: 25px;
            align-self: center;
            margin-top: 25px;
            border-radius: 15px;
            background-color: transparent;
            padding: 15px;
            box-shadow: 5px 5px 15px rgb(115, 225, 225);
        }
    </style>
</head>
<body>
    <div id="payment-done">THANK YOU FOR USING OUR WEBSITE YOU ORDER HAS BEEN PLACED <BR>Payment done!</div>
    <img style="margin-top: 90px;" src="done.jpg">
    <div>
        <button onclick="goToHome()">Back to Home</button>
    </div>

    <script>
        function goToHome() {
            window.location.href = 'home.html';
        }
    </script>
</body>
</html>
