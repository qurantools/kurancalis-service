<?php

class AbstractProfileController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resourceObj = Profile::all();
        return Response::json(array(
                'error' => false,
                'profile_list' => $resourceObj->toArray()),
                200
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        
        $resourceObj = new Profile;
        
        /*
        $resourceObj->username = Request::get('username');
        $resourceObj->email = Request::get('email');
        $resourceObj->password = Hash::make(Request::get('password'));
        $resourceObj->name = Request::get('name');
        */
        
        $validator = Validator::make($data = Input::all(), Profile::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $resourceObj->create($data);
 
        return Response::json(
        array(
                'error' => false
        ),
            200
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Make sure current user owns the requested resource
        $resourceObj = Profile::where('id', $id)
                ->take(1)
                ->get();
     
        return Response::json(array(
            'error' => false,
            'profile_list' => $resourceObj->toArray()),
            200
        );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $resourceObj = Profile::findOrFail($id);
        
       /* if ( Request::get('username') )
        {
            $resourceObj->username = Request::get('username');
        }
        */        
        
        $validator = Validator::make($data = Input::all(), Profile::$rules);

        if ($validator->fails())
        {
                return Redirect::back()->withErrors($validator)->withInput();
        }

        $resourceObj->update($data);

        return Response::json(array(
                'error' => false,
                'message' => 'user updated'),
                200
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Profile::destroy($id);
        return Response::json(array(
                'error' => false,
                'message' => 'Profile deleted'),
                200
        );
    }


}
