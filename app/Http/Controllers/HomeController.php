<?php

namespace App\Http\Controllers;

use App\Models\Videogames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class LibrostestController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
    {
        $games = DB::table('videogame')->orderBy('name','asc')->paginate(10);

        return view('home', compact('games'));
    }
    public function creategame (Request $request){
        $name = $request ->get('name');
        $image = $request ->get('image');

        Videogames::create(['name' => $name, 'image' => $image, 'review' => 'none', 'status' => 0]);

        return redirect()->back()->with('success','Nueva entrada creada.');
    }
    public function updategame (Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $image = $request ->get('image');
        $review = $request ->get('review');
        $status = $request ->get('status');

        Videogames::find($id)->update(['name' => $name, 'image' => $image, 'review' => $review, 'status' => $status]);

        return redirect()->back()->with('success','Se ha actualizado una entrada.');
    }
    public function deletegame (Request $request){
        $id = $request->get('id');
        Videogames::find($id)->delete();
    
        return redirect()->back()->with('success','Se ha eliminado una entrada.');
    }
}
