<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
use App\Http\Resources\YourShopsResource;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UseUpload;

class CategoriesController extends Controller
{
    use UseUpload;

    public function __construct()
    {
        $this->middleware('redirect.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $yourShops = YourShopsResource::collection(
            User::find(Auth::user()->id)->customer->shops);

        return inertia('CartXpressPage/CategoryForm', [
            'yourShops' => $yourShops,
            'hasLogin' => Auth::check() 
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

        $backgroundImagePath = $this->upload($request->file('backgroundImagePath'), 'stored-category');

        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'backgroundImagePath' => $backgroundImagePath
        ]);

        return redirect()->route('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = new CategoriesResource(Categories::where('id', $id)->first());
        
        return inertia('CartXpressPage/Category', [
            'category' => $category,
            'hasLogin' => Auth::check()
        ]);
        
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
