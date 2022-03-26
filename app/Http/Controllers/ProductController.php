<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$products = Product::all();
        //$products= DB::table('products')->get(); query builder
        //dd($products);
        return view('products.index')->with(['products'=>Product::all()]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request){

        /* esta es la forma de hacer las reglas directamente desde el controlador
        $rules=[
            'title'=>['required','max:255'],
            'description'=>['required','max:255'],
            'price'=>['required','min:1'],
            'stock'=>['required','min:0'],
            'status'=>['required','in:available,unavailable'],
        ];
        request()->validate($rules);
         */
        /*if($request->status =='available'&&$request->stock==0){
        //    session()->flash('error','Si está disponible, debe tener stock'); esta es una alternativa al witherrors, el witherrors es una forma directa de manejar errores
            
            return redirect()->back()->withInput($request->all())->withErrors('Si está disponible, debe tener stock');
        }*/
        /*
        esta es una forma de hacerlo
        $product= Product::create([
            'title'=>request()->title,
            'description'=>request()->description,
            'price'=>request()->price,
            'stock'=>request()->stock,
            'status'=>request()->status,
        ]);
        */
        //esta es la más sencilla
        //dd(request()->all(),$request->all(),$request->validated());
        $product = Product::create($request->validated());
        // session()->flash('success',"El nuevo producto con la ID {$product->id} fue creado"); usamos el withsuccess
        return redirect()
        ->route('products.index')
        ->withSuccess("El nuevo producto con la ID {$product->id} fue creado");
        //también puede ser with(['success'=>"El nuevo producto con la ID {$product->id} fue creado"]);
    }
    public function show(Product $product)
    {
        //$product = Product::findorfail($product);
        //$product= DB::table('products')->find($product); aquí usamos query builder
        //dd($product); lo uso para mostrar la lista y detener la ejecución, excelente para pruebas
        return view('products.show')->with(['product'=>$product, 'html'=>'<h1>subtitle</h1>']);
    }
    public function edit(Product $product)
    {
    return view('products.edit')->with(['product'=>/*Product::findorfail(*/$product/*)*/]);
    }
    public function update(ProductRequest $request,$product)
    {
        /*
        $rules=[
            'title'=>['required','max:255'],
            'description'=>['required','max:255'],
            'price'=>['required','min:1'],
            'stock'=>['required','min:0'],
            'status'=>['required','in:available,unavailable'],
        ];
        request()->validate($rules);
         */
        $product = Product::findorfail($product);
        $product->update($request->validated());
        return redirect()
        ->route('products.index')
        ->withSuccess(("El producto con la ID {$product->id} fue editado"));
    }
    public function destroy(Product $product)
    {
        //$product=Product::findorfail($product);
        $product->delete();
        return redirect()
        ->route('products.index')
        ->withSuccess(("El producto con la ID {$product->id} fue eliminado"));
    }
}
