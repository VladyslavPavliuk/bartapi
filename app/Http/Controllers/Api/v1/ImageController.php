<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $path)
    {
        $model = new Gallery();

        if ($model->storeImageValidate($request)):
            return $model->storeImageValidate($request);
        endif;

        $concret = $model->where('path', '=', $path)->firstOrFail();

        $concret->image = $request->file('image')->store($path);

        $concret->save();

        return response()->json($concret, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function show($w, $h, $image)
    {
        $photo = Image::make(storage_path("app/$image"));

        $photo->resize($w, $h);

        $photo->save(storage_path("app/resizes/image.jpg"), 80,);

        return response()->download($photo->dirname . '/' . $photo->basename, 'image');

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
