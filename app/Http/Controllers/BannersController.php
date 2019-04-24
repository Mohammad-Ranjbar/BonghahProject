<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\flash;
use App\Http\Requests\BannerRequest;
use App\Photo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class BannersController extends Controller
{


    public function __construct()
    {
//        $this->middleware('auth',['except'=>['show']]);
    }


    public function index()
    {
        //
    }


    public function create()
    {


        $countries=\App\Http\Utilities\Country::all();
        return view('banners.create',compact('countries'));//convention

    }

    public function store(BannerRequest $request)
    {



        Banner::create($request->all());

        flash()->success('Title','your banner has been created.!');


        return back();

    }


    public function rootPage()
    {
        return view('pages.home');
    }


    public function show($zip,$street)
    {
      $banner=Banner::locatedAt($zip,$street);

      return view('banners.show',compact('banner'));
    }



    public function edit($id)
    {
        //
    }

    public function addPhotos($zip,$street,Request $request)
    {

        $photo = $this->makePhoto($request->file('photo'));

        Banner::locatedAt($zip,$street)->addPhoto($photo);

        return 'done';

    }



    protected function makePhoto(UploadedFile $file)
    {
//dd($file);
        return   Photo::named($file->getClientOriginalName())->move($file);
//        dd($file);

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
