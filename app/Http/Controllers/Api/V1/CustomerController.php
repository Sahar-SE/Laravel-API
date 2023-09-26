<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomerFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $filter = new CustomerFilter();
      $queryItems = $filter->transform($request); //[['column', 'operator', 'value']]

      if($queryItems ==  0){
        return new CustomerCollection(Customer::paginate());
      } else {
        $customers = Customer::where($queryItems)->paginate();
        return new CustomerCollection($customers->appends($request->query()));
      }
      
    }

    public function store(StoreCustomerRequest $request)
    {
      return new CustomerResource(Customer::create($request->all()));
    }


    public function show(Customer $customer)
    {
      return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
      $customer->update($request->all());
    }


    public function destroy(Customer $customer)
    {
        //
    }
}
