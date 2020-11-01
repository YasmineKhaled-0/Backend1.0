<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\User;
use App\Detail;
use App\Product;
use App\paymentMethod;
use App\Http\Requests\OrderRequest;
use App\Repository\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return  view('admin.order.index', [
            'orders' => $this->orderRepository->paginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.order.create', [
            'orders' => Order::all(),
            'products' => Product::all(),
            'clients' => Client::all(),
            'users'=> User::all(),
            'payments'=>paymentMethod::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = $this->orderRepository->create($request);
        $request->merge([
           'user_id' => $request->user()->id , auth()->user()->id, Auth::user()->id
        ]);

        $order = Order::create($request->all());
        $order->products()->attach($request->get('products'));
        $order->save();

        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       // foreach ($order->products as $product) {
       //     $product->pivot->price;
      //  }
      //  dd($order->products->count());
      $order->load('products');
      return view('admin.order.show', [
          'order'=> $order
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'order' => $order,
            'orders' => Order::all(),
            'clients'=> Client::all(),
            'users'=> User::all(),
            'products'=> Product::all(),
            'payments'=>paymentMethod::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->merge([
            'user_id' => $request->user()->id
        ]);
        $order->update($request->all());
        $products=$request->get('products');
        $totalamount=0;
        foreach($products as $product){
            $quantity=$product['quantity'];
            $price=$product['price'];
            $total= $quantity * $price;
            $totalamount +=$total;
        }
        $order->total_amount =$totalamount;
        $order->save();
        $order->products()->sync($request->get('products'));
        $order->save();
        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return  redirect(route('admin.orders.index'));
    }
}
