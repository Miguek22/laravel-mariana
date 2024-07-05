<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('backend.providers.index', compact('providers'));
    }
    
    public function show($id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }
        return response()->json($provider, 200);
    }
    public function create()
    {
        return view('backend.providers.create');
    }
    public function edit($id)
    {
        $provider=Provider::findOrFail($id);

        return view('backend.providers.edit')->with('provider', $provider);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:providers',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->save();
    
        return redirect()->route('providers.index')->with('success', 'Proveedor agregado con éxito');
    }
    

    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:providers,email,' . $provider->id,
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string|max:255',
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index');
    }

    public function destroy($id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $provider->delete();

        return redirect()->route('providers.index');
    }
}
