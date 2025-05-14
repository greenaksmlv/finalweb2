<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->json(['message' => 'Successfully fetched menus', 'data' => $menus], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = Menu::create($request->all());
        return response()->json(['message' => 'Menu Successfully created', 'data' => $menu], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return response()->json(['message' => 'Successfully fetched menu', 'data' => $menu], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());
        return response()->json(['message' => 'Menu successfully updated', 'data' => $menu], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(['message' => 'Menu successfully deleted'], 200);
    }
}
