<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingContorller extends Controller
{
    public function addon()
    { 
        return view('/Addon',[ 
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)
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
    public function index_i(Listing $listing)
    {
            return view('index_xd');
          
    }

      
    public function store(Request $request){
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
         $formFields['logo'] = $request->file('logo')->store('logo','s3');
        }
 
        if($request->hasFile('imgaddons1'))
        {
         $formFields['imgaddons1'] = $request->file('imgaddons1')->store('imgaddons','s3');
        }
 
        if($request->hasFile('imgaddons2'))
        {
         $formFields['imgaddons2'] = $request->file('imgaddons2')->store('imgaddons','s3');
        }
 
        if($request->hasFile('imgaddons3'))
        {
         $formFields['imgaddons3'] = $request->file('imgaddons3')->store('imgaddons','s3');
        }
 
        $formFields['user_id'] = auth()->id();
             Listing::create($formFields);
           return redirect('/Addon');
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
         $formFields['logo'] = $request->file('logo')->store('logo','s3');
        }
 
        if($request->hasFile('imgaddons1'))
        {
         $formFields['imgaddons1'] = $request->file('imgaddons1')->store('imgaddons','s3');
        }
 
        if($request->hasFile('imgaddons2'))
        {
         $formFields['imgaddons2'] = $request->file('imgaddons2')->store('imgaddons','s3');
        }
 
        if($request->hasFile('imgaddons3'))
        {
         $formFields['imgaddons3'] = $request->file('imgaddons3')->store('imgaddons','s3');
        }
            $listing->update($formFields);
           return  redirect('/Addon');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/Addon')->with('message','Sikeres törlés');

    }

    public function manage(){
        return view('manage',['listings' => auth()->user()->listings()->get()]);
    }
}
