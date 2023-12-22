<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .digital-clock {
            font-size: 3em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="digital-clock" id="digitalClock"></div>

    <script>
        function updateDigitalClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const digitalClockElement = document.getElementById('digitalClock');
            digitalClockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateDigitalClock, 1000);
        updateDigitalClock();
    </script>
</body>
</html>
