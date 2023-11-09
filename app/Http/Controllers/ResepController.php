<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Bahan;
use App\Models\Cook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ResepController extends Controller
{
    public  function Show()
    {
        $resep = Resep::select('*')->get();

        $data = [];
        foreach($resep as $row){
            $d['resep'] = $row;
            $d['resep']['bahan'] = Bahan::where('id_resep', $row->id)->get();
            $d['resep']['cook'] = Cook::where('id_resep', $row->id)->get();
            $data[] = $d;
        }


        return response()->json([
            'status'  => 'success',
            'data'    => $data
        ], 200);
    }


    public function Store(request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_resep'        => 'required',
            'deskripsi'         => 'required',
            'lama_memasak'      => 'required',
            'porsi'             => 'required',
            'bahan.*'           => 'required',
            'cook.*'           => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create resep
        $resep = Resep::create([
            'nama_resep'        => $request->nama_resep,
            'deskripsi'         => $request->deskripsi,
            'lama_memasak'      => $request->lama_memasak,
            'porsi'             => $request->porsi,
        ]);

        foreach($request->bahan as $row){
            //create bahan
            Bahan::create([
                'id_resep'           => $resep->id,
                'nama_bahan'         => $row['nama_bahan'],
            ]);
        }

        foreach($request->cook as $row){
            //create cook
            Cook::create([
                'id_resep'           => $resep->id,
                'how_to_cook'         => $row['how_to_cook'],
            ]);
        }

        return response()->json([
            'status'  => 'success',
            // 'message' => $message,
            // 'data'    => $resep
        ], 200);
    }

    public function Update($id,request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_resep'        => 'required',
            'deskripsi'         => 'required',
            'lama_memasak'      => 'required',
            'porsi'             => 'required',
            'bahan.*'           => 'required',
            'cook.*'           => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create resep
        $resep = Resep::where('id',$id)->update([
            'nama_resep'        => $request->nama_resep,
            'deskripsi'         => $request->deskripsi,
            'lama_memasak'      => $request->lama_memasak,
            'porsi'             => $request->porsi,
        ]);

        foreach($request->bahan as $row){
            //create bahan
            Bahan::where('id',$row['id'])->update([
                'nama_bahan'     => $row['nama_bahan'],
            ]);
        }

        foreach($request->cook as $row){
            //create cook
            Cook::where('id',$row['id'])->update([
                'how_to_cook'         => $row['how_to_cook'],
            ]);
        }

        return response()->json([
            'status'  => 'success',
            // 'message' => $message,
            // 'data'    => $resep
        ], 200);
    }

    public function Delete($id)
    {
        $resep = Resep::FindOrFail($id);
        $resep->delete();

        return response()->json([
            'status'  => 'success',
        ], 200);
    }


}
