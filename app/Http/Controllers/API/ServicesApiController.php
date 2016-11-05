<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Service;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;



class ServicesApiController extends Controller
{
    

    public function allServicesPaginated()
    {
        return Service::latest('created_at')->paginate(20);
    }

    public function allServicesData()
    {
        return Service::all();
    }

    public function serviceSermonsData(Service $service)
    {
        return $service->sermons;

    }

    public function newServiceData(Request $request)
    {
        $rules = array(
            'name' => 'required|max:24|unique:services',
            'info' => 'max:75',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return response($validator->errors()->getMessages(), 422);
        }
        else
            {
                $service = new Service;
                $service -> name = Input::get('name');
                $service -> info = Input::get('info');
                $service-> save();
            }
            return response(201);

    }

    public function serviceEditSave(Request $request, $slug)
    {
        $rules = array(
            'name' => 'required|string|max:75',
            'info' => 'string|max:300',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $error = $validator->errors()->getMessages();
            return response($error, 422);
        }
        else
            {
                $service = Service::whereSlug($slug)->first();
                $service -> name = $request-> name;
                $service -> info = $request-> info;
                $service -> save();                                  
            }
    }

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
    public function destroy(Service $service)
    {
        $service->delete();
    }
}
