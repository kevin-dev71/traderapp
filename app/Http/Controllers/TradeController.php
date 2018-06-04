<?php

namespace App\Http\Controllers;

use App\Http\Requests\TradeRequest;
use App\Instrument;
use App\Market;
use App\Trade;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TradeController extends Controller
{

    public function summary(){

    }

    public function index(){
        $trades = Trade::with('instrument')
            ->whereUserId(auth()->user()->id)
            ->latest()
            ->paginate(25);


        return view('trades.index' , compact('trades'));

    }

    public function datatable(){

        $trades = Trade::with('instrument')
            ->whereUserId(auth()->user()->id)
            ->latest();


        return DataTables::of($trades)->make(true);

    }

    public function create () {
        $trade = new Trade;
        $btnText = __("Crear Trade");
        return view('trades.form', ['trade' => $trade , 'btnText' => $btnText]);
    }

    public function store (TradeRequest $trade_request) {
        $trade_request->merge(['user_id' => auth()->user()->id]);
        Trade::create($trade_request->input());
        return redirect()->route('trades.index')
            ->with('message', ['success', __('Trade Creado Correctamente')]);
        //return back()->with('message', ['success', __('Trade Creado Correctamente')]);
    }

    public function edit ($id) {
        $trade = Trade::with(['instrument'])->whereId($id)->first();
        $btnText = __("Actualizar Trade");
        return view('trades.form', ['trade' => $trade , 'btnText' => $btnText]);
    }

    public function update (TradeRequest $trade_request, Trade $trade) {

        $trade->user_id = auth()->id();
        $trade->fill($trade_request->input())->save();
        //return back()->with('message', ['success', __('Trade actualizado')]);
        return redirect()->route('trades.index')
            ->with('message', ['success', __('Trade actualizado Correctamente')]);
    }

    public function destroy (Trade $trade) {
        try {
            $trade->delete();
            return back()->with('message', ['success', __("Trade eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando el trade, no se pudo eliminar")]);
        }
    }


    /*public function show(Course $course){
        $course->load([
            'category' => function($q){
                $q->select('id' , 'name');
            },
            'goals' => function($q){
                $q->select('id' , 'course_id' , 'goal');
            },
            'level' => function($q){
                $q->select('id' , 'name');
            },
            'requirements' => function($q){
                $q->select('id' , 'course_id', 'requirement');
            },
            'reviews.user',
            'teacher'
        ])->get();

        $related = $course->relatedCourses();

        return view('courses.detail' , compact('course' , 'related'));

    }*/
}
