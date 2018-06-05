<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Trade;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(){
        // ============ SUMMARY ROW 1 BOXES ==================
        $trades = Trade::whereUserId(auth()->user()->id);
        $point_stats = auth()->user()->getPointStatsByUserId(auth()->user()->id);
        $total_points = $point_stats['total_win'] + $point_stats['total_lose'];
        $result = $trades->first();
        if (is_null($result)) {
            $profit = 0;
        } else {
            $profit = $total_points *  $result->instrument->point_value;
        }

        $point_stats = array_merge(
            $point_stats ,
            [
                'total_points' => $total_points ,
                'profit' => $profit
            ]
        );

        // ============ SUMMARY ROW 2 CHART ==================
        $activePage = 'dashboard';

        return view('dashboard' , compact('trades' , 'point_stats' , 'activePage'));
    }

    public function balance_chart(){
        $result = $trades = Trade::whereUserId(auth()->user()->id);
    }
}
