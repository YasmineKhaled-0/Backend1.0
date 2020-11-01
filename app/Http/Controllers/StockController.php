<?php

namespace App\Http\Controllers;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('search');

        return view('vendor.stock', [
            'stocks' => Stock::with(['product'  ]) 
                ->where('id', 'LIKE', "%{$q}%")
                ->paginate($request->query('limit', pagenation_count))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product  $product)
    {
        return view('vendor.inventory',[
            'product' =>$product
        ]);
    }
    public function getStocks(Request $request)
    {
        return view('vendor.table', [
            'stocks' => Stock::query()->paginate(pagenation_count)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $stock = Stock::create($request->all());

        return redirect(route('admin.stocks.index', $stock));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return  redirect(route('stocks.index'));
    }
}

