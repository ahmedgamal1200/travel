<!DOCTYPE html>
<html>
<head>
    <title>Booking</title>
</head>
<body>
    <h1>I want to booking </h1>

    <ul>
    <p><strong>My Name:</strong> {{ $data['first_name']}} {{$data['last_name']}}</p>
    <p><strong>email:</strong> {{ $data['email'] }}</p>
    <p><strong>adults :</strong> {{ $data['adults_count'] }}</p>
    </ul>
</body>
</html>