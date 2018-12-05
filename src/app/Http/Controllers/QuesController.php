<?php

namespace PPF\Ques\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PPF\Ques\App\Que;


class QuesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
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
        $Que = Que::all();
        return view('Que.index', compact('Que', 'q'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Que.create');
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
            'name' => 'required|string|unique:Que',
            'timeout' => 'required|integer',
        ]);
        Que::create($request->all());
        flash($request->get('title') . ' Que saved.')->success()->important();
        return redirect()->route('Que.index');
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
        $Que = Que::findOrFail($id);
        return view('Que.edit', compact('Que'));
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
        $Que = Que::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|unique:Que',
            'timeout' => 'required|integer',
        ]);
        $Que->update($request->all());
        flash($request->get('title') . ' Que updated.')->success()->important();
        return redirect()->route('Que.index');
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
        flash($request->get('title') . ' Que deleted.')->success()->important();
        return redirect()->route('Que.index');
    }
}
