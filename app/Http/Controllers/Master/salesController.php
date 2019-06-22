<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Master\salesModel;

class salesController extends Controller
{
    //
    public function index()
    {
        return view('admin.master.datasales');
    }
    public function getDatakategori()
    {
        $sales = salesModel::query()
            ->select('kdSales', 'namaSales', 'nohp', 'target', 'diskon')
            ->get();

        return DataTables::of($sales)
            ->addIndexColumn()
            ->addColumn('action', function ($sales) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showEditSales(\'' . $sales->kdSales . '\', \'' . $sales->namaSales . '\', \'' . $sales->nohp . '\', \'' . $sales->target . '\', \'' . $sales->diskon . '\', event)" ><i class="fa fa-edit"></i></a>
                            <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="hapus(\'' . $sales->kdSales . '\', event)" ><i class="fa fa-trash"></i></a>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'kdSales' => 'required|max:10',
            'namaSales' => 'required|max:255',
            'nohp' => 'required|numeric|digits_between:1,15',
            'target' => 'required|numeric',
            'diskon' => 'required|numeric',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r)
    {
        if ($this->isValid($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        } else {
            try {
                $sales = new salesModel();
                $sales->kdSales = $r->kdSales;
                $sales->namaSales = $r->namaSales;
                $sales->nohp = $r->nohp;
                $sales->target = $r->target;
                $sales->diskon = $r->diskon;
                $sales->save();
                return response()->json([
                    'valid' => true,
                    'sqlResponse' => true,
                    'data' => $sales
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'valid' => true,
                    'sqlResponse' => false,
                    'data' => $th
                ]);
            }
        }
    }

    public function edit(Request $r)
    {
        if ($this->isValid($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        } else {
            try {
                $id = $r->oldkdsales;
                $data = [
                    'kdSales' => $r->kdSales,
                    'namaSales' => $r->namaSales,
                    'nohp' => $r->nohp,
                    'target' => $r->target,
                    'diskon' => $r->diskon,
                ];
                salesModel::query()
                    ->where('kdSales', '=', $id)
                    ->update($data);
                return response()
                    ->json([
                        'sqlResponse' => true,
                        'sukses' => $data,
                        'valid' => true,
                    ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'sqlResponse' => false,
                    'data' => $th,
                    'valid' => true,
                ]);
            }
        }
    }

    public function delete(Request $r)
    {
        $id = $r->input('id');
        salesModel::query()
            ->where('kdSales', '=', $id)
            ->delete();
        return response()->json([
            'sukses' => 'Berhasil Di hapus' . $id,
            'sqlResponse' => true,
        ]);
    }
}
