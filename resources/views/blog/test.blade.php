<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@foreach($posts as $post)
     <!-- {{$post->image}}; -->
     
     {{$post->image_url}}     
    <br>
@endforeach

<?php
use GrahamCampbell\Markdown\Facades\Markdown;
echo Markdown::convertToHtml(e($post->body)); ?>
<!-- <?php 
    phpinfo(); 
?> -->
    
</body>
</html>


