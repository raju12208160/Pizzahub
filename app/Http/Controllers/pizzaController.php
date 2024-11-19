<?php

namespace App\Http\Controllers;

use App\Http\Requests\pizzaStoreRequest;
use App\Http\Requests\pizzaUpdateRequest;
use App\Models\pizza;
use Illuminate\Http\Request;

class pizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_Pizzas= pizza::paginate(3);
        return view ('pizza.index', compact('all_Pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pizzaStoreRequest $request)
    {
        // dd($request->all());
        $path=$request->image->Store('public/pizza');
        pizza::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path

        ]);
        return redirect()->route('pizza.index')->with('message', 'Pizza created successfully');
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
        $pizzaCol =pizza::find($id);
        return view('pizza.edit', compact('pizzaCol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pizzaUpdateRequest $request, $id)
    {
        $pizzas=pizza::find($id);
        if($request->has('image')){
            $path=$request->image->store('public/pizza');
        }
        else{
            $path= $pizzas->image;
        }

        $pizzas->fill($request->input());
        $pizzas->name=$request->name;
        $pizzas->price=$request->price;
        $pizzas->description=$request->description;
        $pizzas->image=$path;
        $pizzas->save();
        return redirect()->route('pizza.index')->with('message', 'Pizza updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza=pizza::find($id);
        $pizza->delete();
        return redirect()->route('pizza.index')->with('message', 'Pizza deleted successfully');
    }
}
