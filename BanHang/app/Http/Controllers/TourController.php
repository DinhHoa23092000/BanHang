<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tour;
use  App\Http\Requests\TourRequest;

class TourController extends Controller
{
    public function getList()
    {
    	$tour = Tour::all();
        return view('tour', compact('tour'));
    }
    public function views(){
    	return view('inputTour');
    }
    public function insertTour(TourRequest $request){
        $tour = new Tour;
        $tour->name = $request->input('name');
        $tour->image = "public/img/".$request->input('myFile');
        $tour->typetour = $request->input('typetour');
        $tour->schedule = $request->input('schedule');
        $tour->depart = $request->input('depart');
        $tour->number = $request->input('number');
        $tour->price = $request->input('price');
        $tour->save();
    	return $this->getList();
    }

}
