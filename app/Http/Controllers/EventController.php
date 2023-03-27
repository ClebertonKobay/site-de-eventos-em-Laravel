<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $events = Event::where([
                ['title','like','%' . $search . '%'],
            ])->get();
        }else{
            $events = Event::all(); 
        }



    return view('welcome', 
            [
                'events'=> $events,
                'search'=> $search
            ]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }else if(!$request->hasFile('image')){
            $event->image = "event_placeholder.jpg";
        }
        
        $user = auth()->user();

        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg','Evento Criado com Sucesso!');
    }

    public function show($id){
        $event = Event::FindOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;
        
        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();
            foreach($userEvents as $userEvent){
                if($id == $userEvent['id']){
                    $hasUserJoined = true;
                }
            }    
        }

        $eventOwner = User::where('id',$event->user_id)->first()->toArray();

        return view('events.show',
        [
            'event'=> $event,
            'eventOwner'=> $eventOwner,
            'hasUserJoined'=>$hasUserJoined
        ]);
    }

    public function  dashboard(){
        $user = auth()->user();

        $events = $user->events;

        $eventsAsparticipant = $user->getEventsAsParticipant();


        return view('events.dashboard',[
                'events'=>$events,
                'eventsAsparticipant' => $eventsAsparticipant
        ]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento excluido com sucesso');
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        return view('events.edit',['event'=>$event]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;

        }

        Event::findOrfail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Evento editado com sucesso');
    }

    public function joinEvent($id){
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->attach($id);

        return redirect()->back()->with('msg','Sua presença está confirma no evento: ' . $event->title);
    }

    public function leaveEvent($id){
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($id);

        return redirect()->back()->with('msg','Você saiu do evento: ' . $event->title);
    }
}
