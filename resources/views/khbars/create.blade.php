<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/khbars/ajouter') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="subject_id" placeholder="subject_id">
        <input type="text" name="topic_id" placeholder="subject_id">
        <input type="text" name="longitude" placeholder="longitude">
        <input type="text" name="latitude" placeholder="latitude">

        <input type="submit" value="click here">
    </form>
</body>
</html>