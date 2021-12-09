<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatment = Treatment::with('category')->get();
        $category = Category::all();
        return view('admin.treatment', ['treatment' => $treatment, 'category' => $category]);
    }

    public function indexUser()
    {
        // return $id;
        // $treatment = Treatment::with('category')->where('category_id', $id)->get();
        // return view('user.treatments', ['treatment' => $treatment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $img_name = '';
        if ($request->file('photo')) {
            $img_name = $request->file('photo')->store('photo', 'public');
        }
        // return $request;
        Treatment::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $img_name
        ]);

        return redirect()->route('treatment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment = Treatment::with('category')->where('category_id', $id)->get();
        $category = Category::find($id);
        return view('user.treatments', ['treatment' => $treatment, 'category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showDetail($id)
    {
        // return $id;
        $treatment = Treatment::find($id);
        return view('user.details-treatments', ['treatment' => $treatment]);
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
        Treatment::find($id)->delete();
        return redirect()->route('transaction.index');
    }
}
