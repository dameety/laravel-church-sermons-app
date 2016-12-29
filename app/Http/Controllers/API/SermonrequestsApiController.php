<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sermonrequest;
use Response;
use Validator;
use Redirect;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;




class SermonrequestsApiController extends Controller
{
    
    public function saveSermonRequest(Request $request)
    {
        $rules = array(
            'sermontitle' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $error = $validator->errors()->getMessages();
            return response($error, 422);
        }
        else
            {
                $sermonrequest = new Sermonrequest;
                $sermonrequest -> sermontitle = $request-> sermontitle;
                $sermonrequest -> preacher = $request-> preacher;
                $sermonrequest -> moreinfo = $request-> moreinfo;
                $sermonrequest-> save();
                return response(200);
            }
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function destroy($id)
    {
        //
    }
}
