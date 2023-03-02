<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter une carte</title>

</head>

<body>
    <h1>Ajouter une carte</h1>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


    <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('add.card') }}">
        @csrf <!-- {{ csrf_field() }} -->

        <input type="file" name="image" placeholder="Choisir une image" id="image">

        @error('image')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary" id="submit">Enregistrer</button>
    </form>

    <hr>

    <table>
        <tr>
            <th>Nom de l'image</th>
            <th>Action</th>
        </tr>
        @foreach($cards as $card)
        <tr>
            <td>{{ $card->imageName }}</td>
            <td><a href="{{ route('get.card', ['cardId' => $card->id]) }}">Voir l'image</a></td>
        </tr>
        @endforeach
    </table>


</body>

</html>