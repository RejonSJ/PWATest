<?php

namespace App\Http\Controllers;

use App\Models\Videogames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewVideogameNotification;
use NotificationChannels\WebPush\PushSubscription;
use Illuminate\Support\Facades\Notification;
/**
 * Class LibrostestController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $name = '';
        $review = '';
        $progress = '';

        if ($request->has('_token')) {
            $name = $request->get('name');
            $review = $request->get('review');
            $progress = $request->get('progress');

            $query = DB::table('videogame')->orderBy('name', 'asc');

            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }

            if (!is_null($review)) {
                $query->where('review', '=', $review);
            }

            if (!is_null($progress)) {
                $query->where('status', '=', $progress);
            }

            $games = $query->paginate(10);
        } else {
            $games = DB::table('videogame')->orderBy('name', 'asc')->paginate(10);
        }

        return view('home', compact('games','name','review','progress'));
    }
    public function creategame (Request $request){
        $name = $request ->get('name');
        $image = $request ->get('image');

        $videogame = Videogames::create(['name' => $name, 'image' => $image, 'review' => 'none', 'status' => 0]);

        // Fetch all subscriptions
        $subscriptions = DB::table('push_subscriptions')->get();

        // Prepare the subscribers to notify
        $notifiableSubscribers = $subscriptions->map(function ($subscription) {
            return (object)[
                'endpoint' => $subscription->endpoint,
                'public_key' => $subscription->public_key,
                'auth_token' => $subscription->auth_token,
                'content_encoding' => $subscription->content_encoding,
            ];
        });

        // Send notifications to all subscribers
        Notification::send($notifiableSubscribers, new NewVideogameNotification($videogame));

        return redirect()->back()->with('success','Nueva entrada creada.');
    }
    public function updategame (Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $image = $request ->get('image');
        $review = $request ->get('review');
        $status = $request ->get('status');

        $videogame = Videogames::find($id)->update(['name' => $name, 'image' => $image, 'review' => $review, 'status' => $status]);

        return redirect()->back()->with('success','Se ha actualizado una entrada.');
    }
    public function deletegame (Request $request){
        $id = $request->get('id');
        $videogame = Videogames::find($id)->delete();
    
        return redirect()->back()->with('success','Se ha eliminado una entrada.');
    }
}
