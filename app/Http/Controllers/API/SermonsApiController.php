<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sermon;
use App\Category;
use App\Service;
use App\Sermonrequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use DB;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;



class SermonsApiController extends Controller
{
    
    public function allSermonsPaginated ()
    {
        return Sermon::latest('created_at')->paginate(20);
    }

    public function allSermonsData()
    {
        return Sermon::all();
    }

    public function sermonEdit($slug)
    {
        $sermon = Sermon::whereSlug($slug)->first();
        return $sermon;
    }

    public function sermonEditSave(Request $request, $slug) 
    {
        $rules = array(
            'title' => 'required|string|max:50',
            'preacher' => 'required|string|max:35',
            'service_id' => 'required',
            'category_id' => 'required',
            'year' => 'regex:"^\d{4}$"',
            'datepreached' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $error = $validator->errors()->getMessages();
            return response($error, 422);
        }
        else
            {
                $sermon = Sermon::whereSlug($slug)->first();
                $sermon -> title = $request-> title;
                $sermon -> preacher = $request-> preacher;
                $sermon -> service_id = $request-> service_id;
                $sermon -> category_id = $request-> category_id;                
                $sermon -> datepreached = $request-> datepreached;
                $sermon -> month = $request-> month;
                $sermon -> year = $request-> year;
                $sermon -> status = $request-> status;
                $sermon -> save();                                  
            }
    }

    public function oneSermonCategory($slug)
    {
        $sermon = Sermon::whereSlug($slug)->first();
        return $sermon->category;
    }

    public function oneSermonService($slug)
    {
        $sermon = Sermon::whereSlug($slug)->first();
        return $sermon->service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
