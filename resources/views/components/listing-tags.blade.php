@props(['tagsCsv'])
<!DOCTYPE html>
<html lang="HU">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{asset('css/index/style_i.css')}}">
    </head>

@php
    $tags=explode(',', $tagsCsv);

@endphp
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
@foreach($tags as $tag)
<h5 class="card-tags">
    <a href="/Addon/?tag={{$tag}}" style="color:white;"><em>'{{$tag}}'</em> </a>
</h5>
@endforeach
</html>