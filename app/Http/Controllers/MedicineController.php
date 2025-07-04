<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $medicines = Medicine::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:medicines,name',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
        ]);

        $validated['updated_by'] = Auth::id();

        Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Thuốc đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:medicines,name,' . $medicine->id,
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $validated['updated_by'] = Auth::id();

        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Thuốc đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        try {
            $medicine->delete();
            return redirect()->route('medicines.index')->with('success', 'Thuốc đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->route('medicines.index')->with('error', 'Không thể xóa thuốc: ' . $e->getMessage());
        }
    }
}
