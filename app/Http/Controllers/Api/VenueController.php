<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Http\Requests\VenueRequest;
use App\Http\Resources\VenueResource;
use App\Http\Traits\Api\ApiResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class VenueController extends Controller
{
    use ApiResponseTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = null)
    {
        $venues = Venue::when($name,function($q,$name){
            $q->where('name','like','%'.$name.'%');
        })->paginate(10);

        return $this->apiResponse(
            VenueResource::collection($venues)->response()->getData(true),
            'ok',
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VenueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VenueRequest $request)
    {     
        try{
            $venue = Venue::create([
                'name' => $request->name,
                'address' => $request->address,
                'about' => $request->about,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the venue not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new VenueResource($venue),'venue saved',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = Venue::find($id);

        if($venue)
        {
            return $this->apiResponse(new VenueResource($venue),'ok',Response::HTTP_OK);
        }
        
        return $this->apiResponse(null,'this venue not found',Response::HTTP_BAD_REQUEST);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VenueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(VenueRequest $request, $id)
    {
        $venue = Venue::find($id);

        if($venue == null)
        {
            return $this->apiResponse(null,'this venue not found',Response::HTTP_BAD_REQUEST);
        }

        try{
            $venue->update([
                'name' => $request->name,
                'address' => $request->address,
                'about' => $request->about,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the venue not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new VenueResource($venue),'venue saved',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::find($id);

        if($venue == null)
        {
            return $this->apiResponse(null,'this venue not found',Response::HTTP_BAD_REQUEST);
        }

        $venue->delete();

        return $this->apiResponse(null,'the venue deleted',Response::HTTP_OK);
    }
}
