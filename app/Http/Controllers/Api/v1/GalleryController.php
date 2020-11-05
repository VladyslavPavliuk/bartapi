<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Gallery::get(), 200);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Gallery $gallery)
    {
        if ($gallery->storeGalleryValidate($request))
        {
            return $gallery->storeGalleryValidate($request);
        }

        $gallery->newGallery($request);

        $gallery->save();

        return response()->json($gallery, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|object
     */
    public function show($path)
    {
        $gallery = Gallery::where('path', '=', $path)->firstOrFail();

        if (is_null($gallery)):
            return response()->json(['message' => 'Not found'], 404);
        endif;

        return response()->json($gallery, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if (is_null($gallery)):
            return response()->json(['message' => 'Not found'], 404);
        endif;

        $gallery->update($request->all());

        return response()->json($gallery, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $gallery = Gallery::destroy($id);

        if (is_null($gallery)):
            return response()->json(['message' => 'Not found'], 404);
        endif;

        return response()->json(null, 204);
    }
}
