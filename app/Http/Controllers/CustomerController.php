<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function addCustomer(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'firstname'=> 'required',
                'lastname'=> 'required',
                'email'=> 'required | unique:customers,email',
                'password'=> 'required | min:8',
                'phone'=> 'required | numeric',
                'state'=> 'required',
                'city'=> 'required',
                'street'=> 'required',
                'zipcode'=> 'required'
            ]);
            $data=$request->all();
            //$data=Json_decode(Json_encode($request->all()));
            //echo "<pre>";print_r($data);die;
            $hashedPassword = Hash::make($data['password']);
            DB::table('customers')
            ->insert(['firstname'=> $data['firstname'],'lastname'=> $data['lastname'],'email'=> $data['email'],'password'=> $hashedPassword,'phone'=>$data['phone'],'street'=> $data['street'],'city'=> $data['city'],'state'=> $data['state'],'zipcode'=> $data['zipcode']]);    
        }
        return view('/admin.customers.add_customers')->with('flash_message_success','Customer successfully registered!');
        
    }
}
