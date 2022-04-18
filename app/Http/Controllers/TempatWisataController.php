<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tempatWisata = TempatWisata::with('user')->get();
            $tempatWisata->loadCount('Tempat Wisata');
            return response($tempatWisata, 200);
        } catch (\Exception $e) {
            dd($e);
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'nama_tempat' => ['required'],
                'location' => ['required'],
                'open' => ['required', 'max:5', 'min:0'],
                'close' => ['required'],
                'price' => ['min:-90', 'max:90'],
              
            ]);
            // if (predictTextIsSpam($request->review)) {
            //     return response("Review terdeteksi spam", 400);
            
            // $user = Auth::user();
            // $tempatWisata = $user->nama_tempat()->create($validated);
            // return response($tempatWisata, 200);
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
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(TempatWisata $tempatWisata)
    {
        try {
            $tempatWisata = TempatWisata::findOrFail($tempatWisata);
            // Lazy eager loading
            $tempatWisata->load('admin');
            $tempatWisata->load('location');
            $tempatWisata->load('open');
            $tempatWisata->load('close');
            $tempatWisata->load('price');
            return response($tempatWisata, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Tempat Wisata tidak dapat ditemukan", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatWisata $tempatWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatWisata $tempatWisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatWisata $tempatWisata)
    {
        try {

            $tempatWisata = TempatWisata::findOrFail($tempatWisata);
            if ($tempatWisata->tempatWisata_id !=  $tempatWisata->id) {
                return response("Tempat Wisata tidak ditemukan", 403);
            }
            $tempatWisata->delete();
            return response("Delete Tempat Wisata sukses", 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Tempat Wisata tidak valid", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }
}
