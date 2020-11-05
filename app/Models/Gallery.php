<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Gallery extends Model
{
    protected $table = 'galleries';

    public $timestamps = false;

    protected $fillable = [
        'path',
        'image',
        'name',
    ];

    use HasFactory;

    /**
     * @return string[]
     */
    public function rulesGallery()
    {
        return
            [
                'name' => 'required|unique:galleries',
            ];
    }

    /**
     * @return string[]
     */

    public function rulesImage()
    {
        return
            [
                'image' => 'mimes:jpeg,png',
            ];
    }

    /**
     * @param Request $request
     */
    public function newGallery(Request $request)
    {
        $this->name = $request->name;
        $this->path = $request->name;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGalleryValidate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rulesGallery());

        if ($validator->fails()):
            return response()->json($validator->errors());
        endif;
    }

    public function storeImageValidate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rulesImage());

        if ($validator->fails()):
            return response()->json($validator->errors());
        endif;
    }

}
