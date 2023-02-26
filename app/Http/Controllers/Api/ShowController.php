<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Http\Requests\ShowRequest;
use App\Http\Resources\ShowResource;
use App\Http\Traits\Api\ApiResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($title = null)
    {
        $shows = Show::with(['artist','venue'])->when($title,function($q,$title){
            $q->where('title','like','%'.$title.'%');
        })->paginate(10);

        return $this->apiResponse(
            ShowResource::collection($shows)->response()->getData(true),
            'ok',
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ShowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShowRequest $request)
    {
        try{
            $show = Show::create([
                'title' => $request->title,
                'date' => $request->date,
                'artist_id' => $request->artist_id,
                'venue_id' => $request->venue_id,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the show not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new ShowResource($show),'show saved',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Show::with(['artist','venue'])->find($id);

        if($show)
        {
            return $this->apiResponse(new ShowResource($show),'ok',Response::HTTP_OK);
        }
        
        return $this->apiResponse(null,'this show not found',Response::HTTP_BAD_REQUEST);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ShowRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShowRequest $request, $id)
    {
        $show = Show::find($id);

        if($show == null)
        {
            return $this->apiResponse(null,'this show not found',Response::HTTP_BAD_REQUEST);
        }

        try{
            $show->update([
                'title' => $request->title,
                'date' => $request->date,
                'artist_id' => $request->artist_id,
                'venue_id' => $request->venue_id,
            ]);
        } catch(\Exception $e){
            return $this->apiResponse(null,'the show not save',Response::HTTP_BAD_REQUEST);
        }
        return $this->apiResponse(new ShowResource($show),'show saved',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = Show::find($id);

        if($show == null)
        {
            return $this->apiResponse(null,'this show not found',Response::HTTP_BAD_REQUEST);
        }

        $show->delete();

        return $this->apiResponse(null,'the show deleted',Response::HTTP_OK);
    }
}
