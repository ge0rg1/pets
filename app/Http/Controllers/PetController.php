<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePet;
use App\Models\Pet;
use App\Models\PetType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $pets = collect();

        if (isset($request->submit)) {
            $pets = Pet::query();

            if (request()->filled('name')) {
                $searchTerm = $request->get('name');
                $pets->where('name', 'like', "%{$searchTerm}%");
            }

            if (request()->filled('pet_type_id')) {
                $pets->whereHas('petType', function ($query) use ($request) {
                    $query->where('pet_type_id', $request->get('pet_type_id'));
                });
            }

            $pets = $pets->with('petType')
                ->orderByDesc('created_at')
                ->get();
        }


        return view('pet.index', [
            'pets' => $pets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $petTypes = PetType::all();

        return view('pet.create', [
            'petTypes' => $petTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePet  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(StorePet $request)
    {
        Pet::create($request->validated());

        $request->session()->flash('alert-success', 'Pet was created');
        return redirect(route('pet.index'));
    }
}
