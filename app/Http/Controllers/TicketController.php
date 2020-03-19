<?php

namespace App\Http\Controllers;

use App\MasterResponse;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $userTickets = MasterResponse::find($id)->tickets;
        return view('tickets/index')->with('userTickets', $userTickets)->with('ticketid', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("tickets/create")->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->master_response_id = $request->input('idhidden');
        $ticket->tech = $request->input('tech');
        $ticket->ticket = $request->input('ticket');
        $ticket->note = $request->input('note');
        $ticket->save();

        return redirect("tickets/{$ticket->master_response_id}/index")->with('success', 'Successfully created');
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
        $ticket = Ticket::find($id);
        return view('tickets/edit')->with('ticket', $ticket)->with('id', $id);
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
        $ticket = Ticket::find($id);
        $masterResponseId = $ticket->master_response_id;
        $ticket->tech = $request->input('tech');
        $ticket->ticket = $request->input('ticket');
        $ticket->note = $request->input('note');
        $ticket->save();

        return redirect("tickets/$masterResponseId/index")->with('success', 'Successfully updated');
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
