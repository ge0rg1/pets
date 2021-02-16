<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePet;
use App\Models\Pet;
use App\Models\PetType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pets = Pet::all();

        return view('pet.index', [
            'pets' => $pets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
        StorePet::create($request->validated());

        $request->session()->flash('alert-success', 'Pet was created');
        return redirect(route('pet.index'));
    }
}
