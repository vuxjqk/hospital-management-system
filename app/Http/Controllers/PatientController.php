<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('national_id', 'like', "%{$search}%")
                ->orWhere('insurance_number', 'like', "%{$search}%");
        })->paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'national_id' => 'required|string|unique:patients,national_id',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:patients,email',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'insurance_number' => 'nullable|string|unique:patients,insurance_number',
            'insurance_expiry_date' => 'nullable|date',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $validated['updated_by'] = Auth::id();

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'national_id' => 'required|string|unique:patients,national_id,' . $patient->id,
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:patients,email,' . $patient->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'insurance_number' => 'nullable|string|unique:patients,insurance_number,' . $patient->id,
            'insurance_expiry_date' => 'nullable|date',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['updated_by'] = Auth::id();

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();
            return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->route('patients.index')->with('error', 'Không thể xóa bệnh nhân: ' . $e->getMessage());
        }
    }
}
