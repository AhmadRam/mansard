<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function face()
    {
        $cat = Category::where([['id', '!=', 9],['id', '!=', 10]])->get();
        return view('face')->with('cat', $cat);
    }
    public function contact()
    {
        return view('contact');
    }
    public function history()
    {
        return view('brand.history');
    }
    public function ourValues()
    {
        return view('brand.our-values');
    }
   
    public function soinBioVisage()
    {
        return view('salon-treatments.soin-bio-visage');
    }
    
    public function discoveryRythmesOfBrazil()
    {
        return view('salon-treatments.spa-ritual.discovery-rythmes-of-brazil');
    }
    public function escapeInTheMoroccanGarden()
    {
        return view('salon-treatments.spa-ritual.escape-in-the-moroccan-garden');
    }
    public function explorationOfTheSiberianTaiga()
    {
        return view('salon-treatments.spa-ritual.exploration-of-the-siberian-taiga');
    }
    public function frenchRiviera()
    {
        return view('salon-treatments.spa-ritual.french-riviera');
    }
    public function stopoverAtTarahoIGarden()
    {
        return view('salon-treatments.spa-ritual.stopover-at-taraho-i-garden');
    }
    public function walkInTheKyotoImperialGarden()
    {
        return view('salon-treatments.spa-ritual.walk-in-the-kyoto-imperial-garden');
    }
    public function rituelApaisantDesensibilisant()
    {
        return view('salon-treatments.skincare-rituals.rituel-apaisant-desensibilisant');
    }
    public function rituelCorrecteurRidesCiblees()
    {
        return view('salon-treatments.skincare-rituals.rituel-correcteur-rides-ciblees');
    }
    public function rituelFermeteAntiAge()
    {
        return view('salon-treatments.skincare-rituals.rituel-fermete-anti-age');
    }
    public function rituelHydratantRepulpant()
    {
        return view('salon-treatments.skincare-rituals.rituel-hydratant-repulpant');
    }
    public function rituelPurifiantEquilibrant()
    {
        return view('salon-treatments.skincare-rituals.rituel-purifiant-equilibrant');
    }
    public function rituelRevitalisantEclatIntense()
    {
        return view('salon-treatments.skincare-rituals.rituel-revitalisant-eclat-intense');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'name' => $request->name,
          'subject' => $request->subject,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }

}
