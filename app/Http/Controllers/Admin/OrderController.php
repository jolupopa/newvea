<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Product;
use App\Profile;
use App\User;
use App\Order;

class OrderController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listado de ordenes
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->paginate();
               
        return view('admin.order.index',['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    public function confirma(Request $request)
    {
       
         // obtengo el arrar del localstorage
        $locStorage = $request->get('ls');
        $anunciosLS = json_decode($locStorage);
        if( $anunciosLS == null )
        {
           return back()->withErrors(['Sin datos en el carro de compras']);
        }
        $products = Product::all();
        // datos de usuario
        $user_id =  Auth::user()->id;
        $profile =  Profile::findOrFail($user_id);
        $total = 0;
        $items = [];

        foreach ($anunciosLS as $anuncio)
        {
            foreach ($products as $product)
            {
                if( $anuncio->id == $product->id )
                {
                    array_push($items, ['anuncio'=> $product->name, 'cantidad'=> $anuncio->cantidad,
                    'precio'=> $product->price, 'parcial'=> $product->price*$anuncio->cantidad  ]);
                    $total = $total + $product->price*$anuncio->cantidad;
                }
                
            }           
        }

        return view('admin.order.confirm', [
                'user' => Auth::user(),
                'profile'=> $profile,
                'items' => $items,
                'total' => $total
                
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(  !isset($request->address) ){
            return redirect()->route('datos')->withFlash('Actulice sus información para poder comprar');
        }
        if(  !isset($request->num_doc) ){
            return redirect()->route('datos')->withFlash('Actulice sus información para poder comprar');
        }
        if(  !isset($request->telf) ){
            return redirect()->route('datos')->withFlash('Actulice sus información para poder comprar');
        }

        // generar json
        // [ [ productoi , cantidadi, precioi, parciali], ...  ]
        $k = 0;
        $arr = [];
        while( $k < ($request->num_items) )
        {
            $product = 'product' . $k;
            $cantidad = 'cantidad' . $k;
            $precio = 'precio' . $k;
            $parcial = 'parcial' . $k;
            array_push( $arr, [
                'producto' => $request->$product,
                'cantidad' => $request->$cantidad,
                'precio' => $request->$precio,
                'parcial' => $request->$parcial
            ]);
            $k = $k +1;
        }
        
        $order = New Order;
        $order->tipo_doc = $request->type_doc;
        $order->num_doc = $request->num_doc;
        $order->fullname = $request->full_namec;
        $order->address = $request->address;
        $order->telf = $request->telf;
        $order->email = $request->email;
        $order->products = $arr;
        $order->total = $request->total;
        $order->user_id = Auth::user()->id;
        $order->save();


        return redirect()->route('payment.show', $order->id);


       

      
      


        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $items = $order->products;
       

       // return $items[i]['producto'];
        return view('admin.order.show', ['order' => $order, 'items'=> $items ]);
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
        return 'desde edit' ;
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
        return 'desde update' ;
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
        return 'desde destroy' ;
    }

    

   
}
