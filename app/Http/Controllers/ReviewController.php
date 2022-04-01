<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stars' => 'required',
            'description' => 'required',
            'employee' => 'required'

        ]);
        return Review::create($request->all());
    }

    public function listReviewByEmployee ()
    {
       $employee= Review::query()->select('employee')->distinct()->orderBy('employee')->get();

       return $employee;
    }

    /**
     * Display the specified resource.
     *
     * @param   $employee
     * @return \Illuminate\Http\Response
     */
    public function show($employee=null)
    {

        if($employee==null){
            return \response([
                'message'=>'Il campo dipendente è oblligatorio'
            ],422);
        }

        $review = Review::query()->where('employee',$employee)->get();

        if($review=='[]'){
            return \response([
                'message'=>'Nessuna Recensione Trovata'
            ],404);

        }
        return \response($review,200);

    }

    public function index()
    {
        return Review::all();
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
