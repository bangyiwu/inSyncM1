<?php

namespace App\Http\Controllers;

use App\FastEvent;
use Illuminate\Http\Request;
use Illuminate\Http\FastEventRequest;
use Illuminate\Http\EventRequest;


class FastEventController extends Controller
{
    public function destroy(Request $request){
        FastEvent::where('id', $request->id)->delete();
        return response()->json(true);
    }

    public function store(Request $request){
        
        FastEvent::create([
            'title' => request('title'),
            'start' => request('start'),
            'end' => request('end'),
            'color' => request('color'),
            'description' => request('description'),
            'user_id' => auth()->user()->id,
            'location' => request('location'),
        ]);
        return response()->json(true);
    }

    public function update(Request $request){
        $event = FastEvent::where('id', $request->id)->first();
        $event->fill([
            'title' => request('title'),
            'start' => request('start'),
            'end' => request('end'),
            'color' => request('color'),
            'description' => request('description'),
            'user_id' => auth()->user()->id,
            'location' => request('location'),
        ]);
        $event->save();
        return response()->json(true);

    }
}
