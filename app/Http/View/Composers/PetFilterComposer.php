<?php

namespace App\Http\View\Composers;

use App\Models\PetType;
use Illuminate\View\View;

class PetFilterComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('petTypes', PetType::all());
    }
}
