<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
</head>
<body>
    <h1>List of Authors</h1>

    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->name }} - {{ $author->email }}</li>
        @endforeach
    </ul>
</body>
</html>
