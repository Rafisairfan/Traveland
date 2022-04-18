<?php

namespace App\Http\Controllers;

use App\Models\TourGuide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tourGuide = TourGuide::with('user')->get();
            $tourGuide->loadCount('Tour Guide');
            return response($tourGuide, 200);
        } catch (\Exception $e) {
            dd($e);
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'Nama_Tour_Guide' => ['required'],
                'location' => ['required'],
                'schedule' => ['required', 'max:5', 'min:0'],
                'fee' => ['min:-90', 'max:90'],
              
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response("Request tidak valid", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourGuide  $tourGuide
     * @return \Illuminate\Http\Response
     */
    public function show(TourGuide $tourGuide)
    {
        try {
            $tourGuide = TourGuide::findOrFail($tourGuide);
            // Lazy eager loading
            $tourGuide->load('name');
            $tourGuide->load('location');
            $tourGuide->load('schedule');
            $tourGuide->load('fee');
            return response($tourGuide, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Tour Guide tidak dapat ditemukan", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourGuide  $tourGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(TourGuide $tourGuide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourGuide  $tourGuide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourGuide $tourGuide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourGuide  $tourGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourGuide $tourGuide)
    {
        try {
            $tourGuide = TourGuide::findOrFail($tourGuide);
            if ($tourGuide->TourGuide_id !=  $tourGuide->id) {
                return response("Tour Guide tidak ditemukan", 403);
            }
            $tourGuide->delete();
            return response("Delete Tour Guide sukses", 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Tour Guide tidak valid", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }
}
