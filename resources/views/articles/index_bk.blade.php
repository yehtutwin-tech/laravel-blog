<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article List</title>
</head>
<body>
    <h1>Article List - {{ $foo }}</h1>
    <ul>
        @foreach ($articles as $article)
            <li>{{ $article['title'] }}</li>
        @endforeach
    </ul>
</body>
</html>

{{-- @ => php statement --}}
{{-- {{}} => echo / output --}}
