<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .ticket {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .ticket h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .ticket p {
            margin-bottom: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>{{ $title }}</h2>
        <p>Category: {{ $category }}</p>
        <p>Date: {{ $start_date }}</p>
        <p>Address: {{ $adress }}</p>
        <p>Ticket ID: {{ $id }}</p>
        <!-- Add more content as needed -->
    </div>
</body>
</html>