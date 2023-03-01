<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marian Hotel</title>
</head>
<body>
    <h3 class=" text-center text-success">Booking Successs! </h3>
    <h4>Thanks You for Booking in Our Hotel (ကျေးဇူးတင်ပါသည် ရှင့်)</h4>
    <p>Check in date  - {{ $booking->check_in }} </p>
    <p>Check out date - {{ $booking->check_out }} </p>
    <p> People (Adult) - {{ $booking->number_of_guest }} </p>
    <p> People (Child) - {{ $booking->number_of_child }} </p>
    @if ($booking->room_type_id !== null)
        <p>Room Name - {{ $booking->room_type->name }}</p>
        <p>Price Per Night - {{ $booking->room_type->price_per_night }} $</p>
    @endif
    <div>Your Regards,</div>
    <div>Marian Hotel</div>
</body>
</html>
