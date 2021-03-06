<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminModel $admin)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.event.listEvent', [
            'event' => EventModel::all(),
            'admin' => $data,
            'title'=> 'Event'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.createEvent',[
            'title'=> 'create Event'
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
            'event_name' => 'required|unique:event',
            'event_time' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $validateData['admin_id']=Auth::user()->id;
        $tmp = explode(" - ", $validateData['event_time']);
        $date1 = $tmp[0];
        $date2 = $tmp[1];
        if(!$this->isValidDate($date1)){
            return back()->with('toast_error', 'Tanggal tidak valid!')->withInput($request->all());
        }
        if(!$this->isValidDate($date2)){
            return back()->with('toast_error', 'Tanggal tidak valid!')->withInput($request->all());
        }
        EventModel::create($validateData);

        return redirect('/event')->with('toast_success', 'Event berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(EventModel $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(EventModel $event)
    {
       
        return view('admin.event.editEvent', [
            'event' => $event,
            'title'=> 'Edit Event'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventModel $event, AdminModel $admin)
    {
        $rules=[
           
            'event_time' => 'required',
            'type' => 'required',
            'status' => 'required',
        ];
        if ($request->event_name != $event->event_name) {
            $rules['event_name'] = 'required|unique:event';
        }
        
        $validateData= $request->validate($rules);
       
        $event->update($validateData);

        return redirect('/event')->with('toast_success', 'Event berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventModel $event)
    {
        EventModel::destroy($event->id);
        return redirect('/event')->with('toast_success', 'Event berhasil di hapus!');
    }

    private function isValidDate($date)
    {   
        $date = strtotime($date);
        $dateNow = time();
        return $date >= $dateNow;
    }
}