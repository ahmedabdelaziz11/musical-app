<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Http\Requests\ArtistRequest;
use App\Http\Resources\ArtistResource;
use Symfony\Component\HttpFoundation\Response;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = null)
    {
        $artist = Artist::when($name,function($q,$name){
            $q->where('name','like','%'.$name.'%');
        })->paginate(10);

        return $this->apiResponse(
            ArtistResource::collection($artist)->response()->getData(true),
            'ok',
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        try{
            $artist = Artist::create([
                'name' => $request->name,
                'about' => $request->about,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the artist not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new ArtistResource($artist),'artist saved',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);

        if($artist)
        {
            return $this->apiResponse(new ArtistResource($artist),'ok',Response::HTTP_OK);
        }
        
        return $this->apiResponse(null,'this artist not found',Response::HTTP_BAD_REQUEST);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, $id)
    {
        $artist = Artist::find($id);

        if($artist == null)
        {
            return $this->apiResponse(null,'this artist not found',Response::HTTP_BAD_REQUEST);
        }

        try{
            $artist->update([
                'name' => $request->name,
                'about' => $request->about,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the artist not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new artistResource($artist),'artist saved',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);

        if($artist == null)
        {
            return $this->apiResponse(null,'this artist not found',Response::HTTP_BAD_REQUEST);
        }

        $artist->delete();

        return $this->apiResponse(null,'the artist deleted',Response::HTTP_OK);
    }
}
