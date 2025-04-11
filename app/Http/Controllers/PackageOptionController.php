<?php

namespace App\Http\Controllers;

use App\Models\PackageOption;
use Illuminate\Http\Request;

class PackageOptionController extends Controller
{
    public function index()
    {
        $packageOptions = PackageOption::all();
        return view('package_options.index', compact('packageOptions'));
    }

    public function create()
    {
        return view('package_options.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Naam' => 'required|string|max:50',
            'Omschrijving' => 'nullable|string'
        ]);

        PackageOption::create($validated);

        return redirect()->route('package_options.index')
            ->with('success', 'Package option created successfully');
    }

    public function edit(PackageOption $packageOption)
    {
        return view('package_options.edit', compact('packageOption'));
    }

    public function update(Request $request, PackageOption $packageOption)
    {
        $validated = $request->validate([
            'Naam' => 'required|string|max:50',
            'Omschrijving' => 'nullable|string'
        ]);

        $packageOption->update($validated);

        return redirect()->route('package_options.index')
            ->with('success', 'Package option updated successfully');
    }

    public function destroy(PackageOption $packageOption)
    {
        $packageOption->delete();
        
        return redirect()->route('package_options.index')