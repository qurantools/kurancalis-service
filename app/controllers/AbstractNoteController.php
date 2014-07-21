&lt;?php

class AbstractNoteController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resourceObj = Note::all();
        return Response::json(array(
                'error' => false,
                'users' => $resourceObj->toArray()),
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
        
        $resourceObj = new Note;
        
        $resourceObj->username = Request::get('username');
        $resourceObj->email = Request::get('email');
        $resourceObj->password = Hash::make(Request::get('password'));
        $resourceObj->name = Request::get('name');

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.
 
        $resourceObj->save();
 
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
        $resourceObj = Note::where('id', $id)
                ->take(1)
                ->get();
     
        return Response::json(array(
            'error' => false,
            'users' => $resourceObj->toArray()),
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
        $resourceObj = Note::find( $id);
        
        if ( Request::get('username') )
        {
            $resourceObj->username = Request::get('username');
        }
        
        if ( Request::get('email') )
        {
            $resourceObj->email = Request::get('email');
        }
        
        if ( Request::get('name') )
        {
            $resourceObj->name = Request::get('name');
        }
        
        if ( Request::get('password') )
        {
            $resourceObj->password = Hash::make(Request::get('password'));
        }
        
        
        
        $resourceObj->save();
        
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
        //
    }


}
