<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.dashboard', [
            'event' => Event::all(),
            'title'=> 'Dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.create',[
            'title'=> 'Dashboard'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'mulai' => 'required',
            'akhir' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tipe' => 'required'
        ]);
        Event::create($validateData);

        return redirect('/dashboard')->with('success', 'Event berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $dashboard)
    {
        return view('admin.dashboard.edit', [
            'event' => $dashboard,
            'title'=> 'Dashboard'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $dashboard)
    {
        $validateData = $request->validate([
            'mulai' => 'required',
            'akhir' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tipe' => 'required'
        ]);
        Event::where('id', $dashboard->id)
                ->update($validateData);

        return redirect('/dashboard')->with('success', 'Event berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $dashboard)
    {
        Event::destroy($dashboard->id);
        return redirect('/dashboard')->with('success', 'Event berhasil di hapus!');
    }
}