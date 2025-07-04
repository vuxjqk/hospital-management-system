<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $services = Service::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:services,name',
            'fee' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Dịch vụ đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:services,name,' . $service->id,
            'fee' => 'required|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $validated['updated_by'] = Auth::id();

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Dịch vụ đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('services.index')->with('success', 'Dịch vụ đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->route('services.index')->with('error', 'Không thể xóa dịch vụ: ' . $e->getMessage());
        }
    }
}
