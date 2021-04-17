<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\ImportRequest;
use App\Import\CustomerImport;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;
    protected $customer_import;

    public function __construct(Customer $customer,
                                CustomerImport $customer_import )
    {
        $this->customer = $customer;
        $this->customer_import = $customer_import;

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

    public function import()
    {
        return view('customer.import');
    }

    public function storeImport(ImportRequest $request)
    {

        $notification = $this->customer_import->allData($request);
            if($notification['message'] == "worksheet_imported"){
                $notification = array(
                    'title'=> trans('validation.generic.Success'),
                    'message'=> trans('validation.generic.imported')." ".
                                trans('validation.generic.data_created')." : ".$notification['created'].". ".
                                trans('validation.generic.data_updated')." : ".$notification['updated'],
                    'alert-type' => 'success'
                );
            }
            if($notification['message']  == "worksheet_invalid"){
                $notification = array(
                    'title'=> trans('validation.generic.Error'),
                    'message'=> trans('platform.customer.message.import'),
                    'alert-type' => 'danger'
                );
                return back()->withInput()->with($notification);
            }
            return redirect()->route('customers.index')->with($notification);
        try{
        }
        catch(\Exception $e)
        {
            $notification = array(
                'title'=> trans('validation.generic.Error'),
                'message'=> trans('validation.generic.not_imported').': '.$e->getMessage(),
                'alert-type' => 'danger'
            );
            return back()->with($notification)->withInput();
        }
    }
}
