<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Master\customerModel;

class customerController extends Controller
{
    //
    public function index()
    {
        return view('admin.master.datacustomer');
    }
    public function getDataCustomer()
    {
        $customer = customerModel::query()
            ->select('kdCustomer', 'namaCustomer', 'nohp', 'alamat')
            ->get();

        return DataTables::of($customer)
            ->addIndexColumn()
            ->addColumn('action', function ($customer) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showEditCustomer(\'' . $customer->kdCustomer . '\', \'' . $customer->namaCustomer . '\', \'' . $customer->nohp . '\', \'' . $customer->alamat . '\', event)" ><i class="fa fa-edit"></i></a>
                            <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="hapus(\'' . $customer->kdCustomer . '\', event)" ><i class="fa fa-trash"></i></a>
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
            'kdCustomer' => 'required|max:10',
            'namaCustomer' => 'required|max:255',
            'nohp' => 'required|numeric|digits_between:1,15',
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
                $customer = new customerModel();
                $customer->kdCustomer = $r->kdCustomer;
                $customer->namaCustomer = $r->namaCustomer;
                $customer->nohp = $r->nohp;
                $customer->alamat = $r->alamat;
                $customer->save();
                return response()->json([
                    'valid' => true,
                    'sqlResponse' => true,
                    'data' => $customer
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
                $id = $r->oldkdcustomer;
                $data = [
                    'kdCustomer' => $r->kdCustomer,
                    'namaCustomer' => $r->namaCustomer,
                    'nohp' => $r->nohp,
                    'alamat' => $r->alamat,
                ];
                customerModel::query()
                    ->where('kdCustomer', '=', $id)
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
        customerModel::query()
            ->where('kdCustomer', '=', $id)
            ->delete();
        return response()->json([
            'sukses' => 'Berhasil Di hapus' . $id,
            'sqlResponse' => true,
        ]);
    }
}
