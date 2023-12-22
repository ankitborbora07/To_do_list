
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Click the button below to confirm your task</h1>
        <div class="task-info">
            <p><strong>Task Name:</strong> {{ $task->name }}</p>
            <p><strong>Task Description:</strong> {{ $task->text }}</p>
            <p><strong>Date:</strong> {{ $task->date }}</p>
            
        </div>
        <div class="button-container">
            <a href="{{ route('confirm.task', ['taskId' => $task->id]) }}" class="btn btn-primary">Confirm Task</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>

</html>