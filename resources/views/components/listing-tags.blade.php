@props(['tagsCsv'])
@php
    $tags=explode(',', $tagsCsv);

@endphp
@foreach($tags as $tag)
<h5 class="card-tags">
    <a href="/Addon/?tag={{$tag}}"><em>{{$tag}}</em> </a>

</h5>
@endforeach