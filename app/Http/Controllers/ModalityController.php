<?php
namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function index()
    {
        $modalities = Modality::latest()->get();
        return view('admin.modalities.index', compact('modalities'));
    }

    public function create()
    {
        return view('admin.modalities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Modality::create($request->only('title', 'status'));

        return redirect()->route('modalities.index')->with('success', 'Modality created successfully.');
    }

    public function edit(Modality $modality)
    {
        return view('admin.modalities.edit', compact('modality'));
    }

    public function update(Request $request, Modality $modality)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $modality->update($request->only('title', 'status'));

        return redirect()->route('modalities.index')->with('success', 'Modality updated successfully.');
    }

    public function destroy(Modality $modality)
    {
        $modality->delete();
        return redirect()->route('modalities.index')->with('success', 'Modality deleted successfully.');
    }
}

