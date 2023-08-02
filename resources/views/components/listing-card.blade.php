@props(['listing'])
<!DOCTYPE html>
<html lang="HU">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/index/style_i.css">
        <style>

#gomb:hover {
  background-color: #99FF66;
}


        </style>
</head>


<div class="card">
    <div id="head" class="card-header">
      <img id="heal-elvui" class="img-fluid" src="{{ $listing->logo ? asset('storage/'. $listing->logo ) : '' }}" align="right" >
      <h2><b>{{$listing->title}}</b></h2></div>
    <div class="card-body">
        <x-listing-tags :tagsCsv="$listing->tags" />
      <p class="card-text"><b>leírás:</b> <br>{{$listing->description}}</p>
      <a id="gomb" href="/Addon/{{$listing['id']}}" style="color:white;border:solid 2px green;width: 25%;height: 35px; text-align:middle;font-size:15px; " class="btn btn- primary"><b>Tovább</b></a>
    </div>
  </div> 

 </html>