<?php

namespace App\Http\Controllers;

use App\Models\CourseMeta;
use Illuminate\Http\Request;

class CourseMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return CourseMeta::get()->where('post_id', $id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $videoElm = CourseMeta::get()->where('post_id', $id)->where('meta_key', '_video')->first();
        $res = json_encode( unserialize($videoElm['meta_value']));

        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseMeta $courseMeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseMeta $courseMeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseMeta $courseMeta)
    {
        //
    }
}
