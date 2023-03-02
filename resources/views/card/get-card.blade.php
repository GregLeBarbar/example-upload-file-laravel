<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Afficher une carte</title>

</head>

<body>
    <h1>Voici la carte {{ $card->imageName }} !</h1>
    <img src="{{ URL::asset('/storage/images/' . $filename) }}" />
</body>

</html>