<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

     public function getEvent(){
        $response['data'] = Event::all();
        $response['message'] = 'List data event';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function storeEvent(Request $request){
        // validasi input
        $input = $request->validate([
            "nama_kegiatan" => "required|unique:events",
            "peserta"       => "required",
            "tanggal"       => "required"
        ]);

        // simpan
        $hasil = Event::create($input);
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama_kegiatan." berhasil disimpan";
            return response()->json($response, 201); // 201 Created
        } else {
            $response['success'] = false;
            $response['message'] = $request->nama_kegiatan." gagal disimpan";
            return response()->json($response, 400); // 400 Bad Request
        }
    }

    public function destroyEvent( $id)
    {
        //cari data di tabel Event berdasarkan "id" Event
        $Event = Event::find($id);
        //dd($Event);
        $hasil = $Event->delete();
        if($hasil){ //jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Event berhasil dihapus";
            return response()->json($response, 200); //201 utk created 
        }else {
            $response['success'] = false;
            $response['message'] = "Event gagal dihapus";
            return response()->json($response, 400); //400 Bad Request
        }
}

}