<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sermon;
use App\Category;
use App\Service;
use Carbon\Carbon;
use Storage;
use File;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;



class SermonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSermonsPage()
    {
        return view('sermons.allsermons');
    }

    public function category()
    {
        return view('sermons.allcategories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $service = Service::all();
        return view('sermons.newSermon', compact('categories', 'service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|string|max:50',
            'preacher' => 'required|string|max:30',
            'service' => 'required',
            'category' => 'required',
            'year' => 'regex:"^\d{4}$"',
            'datepreached' => 'required',
        /* 'sermonFile' => 'required|mimetypes:mp3,wav',*/
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $sermons = $validator-> messages();
            return redirect()->route('sermoncreate_path')->withErrors($validator)->withInput();           
        }
        else
            {
                $sermon = new Sermon;
                $sermon -> title = Input::get('title');
                $sermon -> preacher = Input::get('preacher');          
                $sermon -> service_id = Input::get('service_id');
                $sermon -> category_id = Input::get('category_id');                
                $sermon -> datepreached = Input::get('datepreached');
                $sermon -> month = Input::get('month');
                $sermon -> year = Input::get('year');
                $sermon -> status = Input::get('status');
                
                if(Input::hasFile('sermonFile'))
                {
                    $file = Input::file('sermonFile');
                    $file -> move(public_path('uploads').'/', $file->getClientOriginalName());
                    $sermon-> sermonFileName = $file -> getClientOriginalName();
                    $sermon-> size = $file -> getClientsize();
                    $sermon-> type = $file -> getClientMimeType();
                    $sermon-> save();

                    Session::flash('sermon_save', 'Sermon Saved Successfully.');                
                    return redirect()->route('sermoncreate_path');
                }                                  
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Sermon $sermon)
    {
        /* $sermon = Sermon::whereSlug($slug)->first();*/
        $sermon->delete();
    }
}
