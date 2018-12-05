<?php

namespace PPF\Ques\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PPF\Ques\App\Que;


class QuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $ques = Que::all();
        return view('ques.index', compact('ques', 'q'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ques.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:ques',
            'timeout' => 'required|integer',
        ]);
        Que::create($request->all());
        flash($request->get('name') . ' Que saved.')->success()->important();
        return redirect()->route('ques.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    private function show($id)
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
        $que = Que::findOrFail($id);
        return view('ques.edit', compact('que'));
    }
    /*
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $que = Que::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|unique:Que',
            'timeout' => 'required|integer',
        ]);
        $que->update($request->all());
        flash($request->get('name') . ' Que updated.')->success()->important();
        return redirect()->route('ques.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Que::find($id)->delete();
        flash($request->get('name') . ' Que deleted.')->success()->important();
        return redirect()->route('ques.index');
    }
}
