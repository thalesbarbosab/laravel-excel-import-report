<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers =  $this->customer->all()->sortBy('name');
        return view('customer.index',['customers'=>$customers]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {
        try{
            $this->customers->create($request->all());
            $notification = array(
                'title'=> trans('validation.generic.Success'),
                'message'=> trans('validation.generic.created'),
                'alert-type' => 'success'
            );
            return redirect()->route('customers.index')->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'title'=> trans('validation.generic.Error'),
                'message'=> trans('validation.generic.not_created').': '.$e->getMessage(),
                'alert-type' => 'danger'
            );
            return back()->with($notification)->withInput();
        }
    }

    public function edit($id)
    {
        $customer =  $this->customer->findOrFail($id);
        return view('customer.edit',['customer'=>$customer]);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        try{
            $customer->update($request->all());
            $notification = array(
                'title'=> trans('validation.generic.Success'),
                'message'=> trans('validation.generic.updated'),
                'alert-type' => 'success'
            );
            return redirect()->route('customers.index')->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'title'=> trans('validation.generic.Error'),
                'message'=> trans('validation.generic.not_updated').': '.$e->getMessage(),
                'alert-type' => 'danger'
            );
            return back()->with($notification)->withInput();
        }
    }

    public function destroy($id)
    {
        $customer = $this->customer->findOrFail($id);
        try{
            $customer->delete();
            $notification = array(
                'title'=> trans('validation.generic.Success'),
                'message'=> trans('validation.generic.deleted'),
                'alert-type' => 'success'
            );
            return redirect()->route('customers.index')->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'title'=> trans('validation.generic.Error'),
                'message'=> trans('validation.generic.not_deleted').': '.$e->getMessage(),
                'alert-type' => 'danger'
            );
            return back()->with($notification);
        }
    }
}
