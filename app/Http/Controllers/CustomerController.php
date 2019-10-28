<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = $this->customer->paginate(5);
        return view('customers.list', compact('customers'));
    }

    public function deleteCustomer($id)
    {


        $customer = $this->customer->findOrFail($id);
        File::delete(storage_path("app\public\images\\".$customer->image));
        $customer->delete();

        return redirect()->route("customers.index");
    }

    public function formAdd()
    {
        return view('customers.formAdd');
    }

    public function insertCustomer(Request $request)
    {
        $image = $request->image;

        $path = 'public/images';
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs($path, $fileName);

        $customer = $this->customer->create(
            [
                "name" => $request->name,
                "age" => $request->age,
                "email" => $request->email,
                "image" => $fileName
            ]);

        $customer->save();
        return redirect()->route('customers.index');
    }

    public function formEdit($id)
    {
        $customer = $this->customer->findOrFail($id);
        return view('customers.formEdit', compact('customer'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customers.index');
    }

    public function searchCustomer(Request $request)
    {
        $search = $request->get('search');

        $dataSearch = DB::table("customers")->where("email", "LIKE", "%$search%")
            ->orWhere("name", "LIKE", "%$search%")
            ->orWhere("age", "LIKE", "%$search%")
            ->paginate(5);

        return view('customers.search', compact('dataSearch'));
    }
}
