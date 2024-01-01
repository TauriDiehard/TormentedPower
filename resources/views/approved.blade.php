<!DOCTYPE html>
<html lang="HU">
<head>
<style>
.container {

    border: 3px solid black;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.container h3 {
    font-size: 18px;
    color: #888;
    margin-bottom: 10px;
}

.container p {
    margin-bottom: 10px;
}

.image-container {
    margin-bottom: 10px;
}

img {
    width: 200px;
    height: 170px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.button-container {
    margin-top: 10px;
    display: flex;
    justify-content: center;
}

button {

    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.pagination-links {
    margin-top: 20px;
}
#xd{
    border: 3px solid red;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

<h1>Pending Listings</h1>
<button > <a href="{{asset('/Addon')}}" class="btn btn- primary"> <-Vissza </a> </button>
@foreach($listings as $listing)
    <div id="xd">
        <h2>{{ $listing->title }}</h2>
        <h3>{{$listing->user->name}}<h3>
        <p>{{ $listing->description }}</p>
            @if ($listing->logo)
                <img id="heal-elvui" class="img-fluid" src="{{ asset('storage/'.$listing->logo) }}" onerror="this.style.display='none'">
            @endif
            <br>

            @if (!empty($listing->imgaddons))
            @foreach (json_decode($listing->imgaddons) as $imgaddon)
    <img id="heal-elvui" class="img-fluid" src="{{ asset('storage/'.$imgaddon) }}" onerror="this.style.display='none'">
@endforeach
            @endif

            @if ($listing->logo || count($listing->imgaddons) === 0)
                <img id="heal-elvui" class="img-fluid" style="display:none;">
            @endif

                <form method="POST" action="{{ route('listing.approved', ['listing' => $listing]) }}">
                @csrf
                <button type="submit" name="status" value="true">Approve</button>
                </form>
                <form method="POST" action="{{ route('listing.deny', ['listing' => $listing]) }}">
                @csrf
                <button type="submit" name="status" value="false">Deny</button>
                </form>
    </div>
@endforeach

{{ $listings->links() }}
</div>
</body>
</html>
