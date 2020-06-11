<?php

namespace App\Http\Controllers;

use App\FastEvent;
use Illuminate\Http\Request;
use Illuminate\Http\FastEventRequest;

class FastEventController extends Controller
{
    public function destroy(Request $request){
        FastEvent::where('id', $request->id)->delete();
        return response()->json(true);
    }

    public function store(Request $request){
        FastEvent::create($request->all());
        return response()->json(true);
    }

    public function update(Request $request){
        $event = FastEvent::where('id', $request->id)->first();
        $event->fill($request->all());
        $event->save();
        return response()->json(true);

    }
}
