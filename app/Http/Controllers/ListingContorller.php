<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingContorller extends Controller
{
    public function addon()
    { 
        return view('/Addon',[ 
            
            'listings' => Listing::where('status', true)->latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }
    
    // Single Listing
    public function show(Listing $listing)
    {
            return view('Addon_listing',[
                'listing' => $listing
            ]);
    }

    public function create(Listing $listing)
    {
            return view('Addon_create');
          
    }
    public function index(Listing $listing)
    {
            return view('index');
          
    }

    public function store(Request $request){
        $formFields = $request->validate([
         'title' => 'required',
         'tags' => 'required',
         'import'=>'required',
         'description'=>'nullable|string|max:255',
         'logo'=>'image|required',
         'imgaddons.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->hasFile('logo'))
        {
         $formFields['logo'] = $request->file('logo')->store('logo','public_uploads');
        }
 
        if ($request->hasFile('imgaddons')) {
            $imgaddons = [];
            foreach ($request->file('imgaddons') as $imgaddon) {
                $imgaddons[] = $imgaddon->store('imgaddons', 'public_uploads');
            }
            $formFields['imgaddons'] = json_encode($imgaddons);
        }
        $formFields['status'] = false;

        $formFields['user_id'] = auth()->id();
        
        
            // Store the listing in the database
            $listing = Listing::create($formFields);

            return redirect("/Addon")->with(['listing' => $listing]);
   
    }

    public function showApproved()
    {
        $listings = Listing::where('status', false)->paginate(10);

        return view('approved', ['listings' => $listings]);
        
    }

    public function approved(Listing $listing, Request $request)
    {
        $listing->status = true;
    $listing->save();

    return redirect('/approved')->with('status', 'Listing approved successfully.');
    }
    public function deny(Listing $listing)
{
    $listing->delete();
    return redirect('/approved')->with('status', 'Listing denied successfully.');
}
    public function edit(Listing $listing)
    {

        return view('edit', ['listing'=>$listing]);

    }
    //update
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
         'title' => 'required',
         'tags' => 'required',
         'import'=>'required',
         'description'=>'nullable|string|max:255',
         'logo'=>'image|required',
         'imgaddons1'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         'imgaddons2'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         'imgaddons3'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if($request->hasFile('logo'))
        {
         $formFields['logo'] = $request->file('logo')->store('logo','public_uploads');
        }
 
        if($request->hasFile('imgaddons1'))
        {
         $formFields['imgaddons1'] = $request->file('imgaddons1')->store('imgaddons','public_uploads');
        }
 
        if($request->hasFile('imgaddons2'))
        {
         $formFields['imgaddons2'] = $request->file('imgaddons2')->store('imgaddons','public_uploads');
        }
 
        if($request->hasFile('imgaddons3'))
        {
         $formFields['imgaddons3'] = $request->file('imgaddons3')->store('imgaddons','public_uploads');
        }
            $listing->update($formFields);
           return  redirect('/Addon');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/Addon/manage')->with('message','Sikeres törlés');

    }

    public function manage(){
        return view('manage',['listings' => auth()->user()->listings()->get()]);
    }
}
