<?php

namespace App\Http\Controllers\Admin;

use App\Quote;
use App\QuotesItem;
use App\CustomersField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        //
        $quotes = Quote::with('customer')->get();
        return view('admin.quotes.dashboard', compact('quotes'));
    }

    public function index()
    {

//        return view('admin.quotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.quotes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $customer = Customer::create($request->customer);
        $quote = Quote::create($request->quote + ['customer_id' => $customer->id]);

        for ($i=0; $i < count($request->product); $i++) {
            if (isset($request->qty[$i]) && isset($request->price[$i])) {
                QuotesItem::create([
                    'quote_id' => $quote->id,
                    'name' => $request->product[$i],
                    'quantity' => $request->qty[$i],
                    'price' => $request->price[$i],
                ]);
            }

        }

        for($i=0; $i < count($request->customer_fields); $i++) {
            if (isset($request->customer_fields[$i]['field_key']) && isset($request->customer_fields[$i]['field_value'])) {
                CustomersField::create([
                    'customer_id' => $customer->id,
                    'field_key' => $request->customer_fields[$i]['field_key'],
                    'field_value' => $request->customer_fields[$i]['field_value'],
                ]);
            }
        }


        return 'To be continued';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quote_id)
    {
        $quote = Quote::findorFail($quote_id);

        return view('admin.quotes.show', compact('quote'));



        //        return 'To be continued';


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
