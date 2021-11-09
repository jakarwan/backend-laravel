<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return response()->json($contact);
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
        $validate = Validator::make($request->all(),[
            'firstname' => 'required',
            'title' => 'required',
            'description' => 'required',
            'contactdate' => 'required',
        ]);
        if($validate->fails()){
            $response = ['message' => 'กรุณากรอกข้อมูลให้ครบ', 'code' => 400];
            return response()->json($response, 400);
        }
        $data = [
            'firstname' => $request->get('firstname'),
            'familyname' => $request->get('familyname'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'contactdate' => $request->get('contactdate')
        ];
        $responseQuery = Contact::create($data);
        if ($responseQuery) {
            $response = ['message' => 'บันทึกข้อมูลเสร็จสิ้น', 'code' => 200];
            return response()->json($response);
        } else {
            $response = ['message' => 'เกิดข้อผิดพลาด', 'code' => 500];
            return response()->json($response, 500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
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
    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        // $contact->delete();
        if ($contact->delete()) {
            $response = ['message' => 'ลบข้อมูลสำเร็จ', 'code' => 200];
            return response()->json($response);
        } else {
            $response = ['message' => 'เกิดข้อผิดพลาด', 'code' => 400];
            return response()->json($response, 400);
        }
    }
}
