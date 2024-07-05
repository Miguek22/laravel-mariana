<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('backend.customer.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cuit' => 'required|string|max:255|unique:customers',
            'provincia' => 'required|string|max:255',
            'tipo_persona' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'domicilio' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        $customer = Customer::create($request->all());

        return redirect()->route('customer.index');
    }
    public function create()
    {
        return view('backend.customer.create');
    }
    public function show(Customer $customer)
    {
        return $customer;
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'cuit' => 'string|max:255|unique:customers,cuit,' . $customer->id,
            'provincia' => 'string|max:255',
            'tipo_persona' => 'string|max:255',
            'sexo' => 'string|max:255',
            'domicilio' => 'string|max:255',
            'fecha_nacimiento' => 'date',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index');
    }
    public function edit($id)
    {

        $customer=Customer::findOrFail($id);

        // return $items;
        return view('backend.customer.edit')->with('customer',$customer);
    }
    
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
