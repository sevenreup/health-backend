<?php

namespace App\Http\Controllers;

use App\Http\Resources\LanguageResource;
use App\Locale;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LanguageResource::collection(Locale::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = Locale::create([
            'country' => $request->country,
            'language' => $request->language,
            'languageName' => $request->languageName,
            'code_2' => $request->code_2,
            'code_3' => $request->code_3,
        ]);

        return new LanguageResource($lang);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new LanguageResource(Locale::findOrFail($id));
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
        if (Locale::where('id', $id)->exists()) {
            $lang = Locale::find($id);
            $lang->country = is_null($request->country) ? $lang->country : $request->country;
            $lang->language = is_null($request->language) ? $lang->language : $request->language;
            $lang->languageName = is_null($request->languageName) ? $lang->languageName : $request->languageName;
            $lang->code_2 = is_null($request->code_2) ? $lang->code_2 : $request->code_2;
            $lang->code_3 = is_null($request->code_3) ? $lang->code_3 : $request->code_3;
            $lang->save();

            return new LanguageResource($lang);
        } else {
            return response()->json([
                "message" => "Language not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Locale::where('id', $id)->exists()) {
            $lang = Locale::find($id);
            $lang->delete();
            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Language not found"
            ], 404);
        }
    }
}
