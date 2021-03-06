<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reservation;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $users= User::where('id','!=', '1')->paginate(10); 
        return view('admin.index', ['users'=> $users]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function reservation()
    {
        return view('admin.calendar');
    }

    public function get_reservation()
    {
      $reservation=  Reservation::all();
      $calendar=array();
      foreach ($reservation as $reserved) {
        $start=$reserved->start_date . " " .$reserved->start_time;
        $end=$reserved->end_date . " " .$reserved->end_time;

          $json=array(
            'start'=>$start,
            'end'=>$end,
            'title'=>$reserved->company->name

            );
          array_push($calendar, $json);
      }
      return json_encode($calendar);

    }
}
