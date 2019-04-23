<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\flash;
use App\Http\Requests\BannerRequest;
use App\Photo;
use Illuminate\Http\Request;





class BannersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $countries=\App\Http\Utilities\Country::all();
        return view('banners.create',compact('countries'));//convention

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {



        Banner::create($request->all());

        flash()->success('Title','your banner has been created.!');


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rootPage()
    {
        return view('pages.home');
    }


    public function show($zip,$street)
    {

        auth()->logout();
      $banner=Banner::locatedAt($zip,$street);
//dd($banner);
      return view('banners.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function addPhotos($zip,$street,Request $request)
    {

        $this->validate($request,[

           'photo'  => 'required|mimes:jpeg,jpg,png'

        ]);




        $photo = Photo::fromForm($request->file('photo'));

        $banner=Banner::locatedAt($zip,$street)->addPhoto($photo);


        return 'Done';


//--------------------Refactoring Code---------------------------------------
//        $file = $request->file('photo');
//
//        $name = time() .$file->getClientOriginalName();
//
//        $file->move('banners/photos',$name);
//
//        $banner=Banner::locatedAt($zip,$street);
//
//        $banner->photos()->create(['path'=>"/banners/photos/{$name}"]);
//
//        return 'Done';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
