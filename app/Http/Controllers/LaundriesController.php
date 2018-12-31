<?php

namespace App\Http\Controllers;

use App\Laundry;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LaundriesController extends Controller
{
    private $laundry_id;

    public function saveDefaultServices()
    {
        if (Service::all()->isEmpty()) {
            $s = new Service([
                'name' => 'Dry Cleaning',
                'cost_per_kg' => 4.5,
            ]);
            $s->save();

            $s = new Service([
                'name' => 'Normal wash',
                'cost_per_kg' => 1.7,
            ]);
            $s->save();

            $s = new Service([
                'name' => 'Cadar',
                'cost_per_kg' => 1.7,
            ]);
            $s->save();
            $s = new Service([
                'name' => 'Curtains',
                'cost_per_kg' => 3,
            ]);
            $s->save();
        }
    }

    /**
     * Show the 1st form for making a new laundry.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1()
    {
        $this->saveDefaultServices();

        $services = Service::all();
        return view('laundries.new_laundry_1', compact('services', $services));
    }

    public function postCreateStep1(Request $request)
    {
        try {
            $this->validate($request, [
                'service' => 'required',
                'weight' => 'required',
            ]);
        } catch (ValidationException $e) {
            echo "Caught exception: ", $e->getMessage(), "\n";
        }

        $laundry = new Laundry([
            'service_id' => $request->input('service'),
            'weight' => $request->input('weight'),
            'status' => "In Progress"
        ]);

        $laundry->save();
        $laundry_id = $laundry->id;

        return redirect('/laundries/new-laundry-2');
    }
}
