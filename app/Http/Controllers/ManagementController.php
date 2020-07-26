<?php

namespace App\Http\Controllers;

use App\management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $managements = management::latest()->paginate(5);

        return view('managements.index', compact('managements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('managements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:25',
            'detail' => 'required|min:10|max:100',
            'email' => 'required|email',
            'created_by' => 'required|min:5|max:20',
            'status' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:20',
        ]);

        management::create($request->all());

        return redirect()->route('managements.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\management  $management
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(management $management)
    {
        return view('managements.show',compact('management'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\management  $management
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(management $management)
    {
        return view('managements.edit',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\management  $management
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, management $management)
    {
        $request->validate([
            'name' => 'required|min:5|max:25',
            'detail' => 'required|min:10|max:100',
            'email' => 'required|email',
            'created_by' => 'required|min:5|max:20',
            'status' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:20',
        ]);

        $management->update($request->all());

        return redirect()->route('managements.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\management $management
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(management $management)
    {
        $management->delete();

        return redirect()->route('managements.index')
            ->with('success','Product deleted successfully');
    }
}
