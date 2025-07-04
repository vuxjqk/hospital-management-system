<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $specialties = Specialty::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialties,name',
            'fee' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();

        Specialty::create($validated);

        return redirect()->route('specialties.index')->with('success', 'Chuyên khoa đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialty $specialty)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialties,name,' . $specialty->id,
            'fee' => 'required|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $validated['updated_by'] = Auth::id();

        $specialty->update($validated);

        return redirect()->route('specialties.index')->with('success', 'Chuyên khoa đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        try {
            $specialty->delete();
            return redirect()->route('specialties.index')->with('success', 'Chuyên khoa đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->route('specialties.index')->with('error', 'Không thể xóa chuyên khoa: ' . $e->getMessage());
        }
    }
}
