@props(['listing'])

<div class="card">
    <div id="head" class="card-header">
      <img id="heal-elvui" class="img-fluid" src="{{Storage::disk('s3')->temporaryUrl($listing->logo, '+2 minutes')}}" align="right" >
      <h2><b>{{$listing->title}}</b></h2></div>
    <div class="card-body">
        <x-listing-tags :tagsCsv="$listing->tags" />
      <p class="card-text"><b>leírás:</b> <br>{{$listing->description}}</p>
      <a href="/Addon/{{$listing['id']}}" class="btn btn- primary">Tovább>></a>
    </div>
  </div> 