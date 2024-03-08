<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .ticket {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .ticket h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>{{ $title }}</h2>
        <p>category: {{ $category }}</p>
        <p>Date: {{ $start_date }}</p>
        <p>Adress: {{ $adress }}</p>
        <p>Ticket Id: {{ $id }}</p>
        <!-- Add more content as needed -->
    </div>
</body>
</html>