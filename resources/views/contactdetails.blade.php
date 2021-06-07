<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We've received a message</title>
</head>

<body>
    <div>
        <h2>These are the details:</h2>
        <div>
            <h4>Name: {{ $contact['name'] }}</h4>
            <h4>Email: {{ $contact['email'] }}</h4>
            <h4>Message: {{ $contact['message'] }}</h4>
        </div>
    </div>
</body>

</html>
