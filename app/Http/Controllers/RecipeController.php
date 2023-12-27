<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        return view('recipes.index', [

        ]);
    }

    public function create(): View
    {
        return view('recipes.create', [

        ]);
    }

    public function edit($id): View
    {
        return view('recipes.edit', [
            'id' => $id,
        ]);
    }

    public function show($id): View
    {
        return view('recipes.show', [
            'id' => $id,
        ]);
    }

}
