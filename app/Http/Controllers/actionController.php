<?php

namespace App\Http\Controllers;

use App\Models\pembayaran_bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class actionController extends Controller
{
    // show create pages
    public function create()
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('index');
        }
        return view('create');
    }

    public function detail($id)
    {
        $data = pembayaran_bonus::find($id);
        if ($data) {
            return view('detail', [
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function createPost(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'buruhA'    => 'required',
            'buruhB'    => 'required',
            'buruhC'    => 'required',
            'pembayaran' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', 'terjadi kesalahan input data ulangi lagi!');
            // return response()->json(['error' => 'terjadi kesalahan input data ulangi lagi!']);
        } else {
            $A = $request->buruhA;
            $B = $request->buruhB;
            $C = $request->buruhC;

            $cek_persen = $A + $B + $C;

            if ($cek_persen < 100) {
                return redirect()->back()->with('error', 'Maaf persentase kurang dari 100%, ulangi!');
                // return response()->json(['error' => 'Maaf persentase kurang dari 100%, ulangi!']);
            } elseif ($cek_persen > 100) {
                return redirect()->back()->with('error', 'Maaf persentase lebih dari 100%, ulangi!');
                // return response()->json(['error' => 'Maaf persentase lebih dari 100%, ulangi!']);
            } else {
                $save = pembayaran_bonus::create([
                    'buruh_a' => $A,
                    'buruh_b' => $B,
                    'buruh_c' => $C,
                    'pembayaran' => $request->pembayaran
                ]);
                if ($save) {
                    return redirect()->route('home')->with('success', 'Data berhasil ditambahkan!');
                    // return response()->json(['success' => 'Data berhasil ditambahkan!']);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan database, ulangi nanti!');
                    // return response()->json(['error' => 'Terjadi kesalahan database, ulangi nanti!']);
                }
            }
        }
    }

    public function update($id)
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('index');
        }

        $data = pembayaran_bonus::find($id);
        return view('update', [
            'data' => $data
        ]);
    }
    public function updatepost(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'buruhA'    => 'required',
            'buruhB'    => 'required',
            'buruhC'    => 'required',
            'pembayaran' => 'required',
            'id' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->with('error', 'terjadi kesalahan input data ulangi lagi!');
            // return response()->json(['error' => 'terjadi kesalahan input data ulangi lagi!']);
        } else {
            $A = $request->buruhA;
            $B = $request->buruhB;
            $C = $request->buruhC;

            $cek_persen = $A + $B + $C;

            if ($cek_persen < 100) {
                return redirect()->back()->with('error', 'Maaf persentase kurang dari 100%, ulangi!');
                // return response()->json(['error' => 'Maaf persentase kurang dari 100%, ulangi!']);
            } elseif ($cek_persen > 100) {
                return redirect()->back()->with('error', 'Maaf persentase lebih dari 100%, ulangi!');
                // return response()->json(['error' => 'Maaf persentase lebih dari 100%, ulangi!']);
            } else {
                $data = pembayaran_bonus::find($request->id);
                if ($data) {
                    $data->buruh_a = $A;
                    $data->buruh_b = $B;
                    $data->buruh_c = $C;
                    $data->pembayaran = $request->pembayaran;
                    $data->save();
                    return redirect()->back()->with('success', 'Data berhasil diupdate!');
                    // return response()->json(['success' => 'Data berhasil diupdate!']);
                } else {
                    return redirect()->back()->with('success', 'Terjadi kesalahan data!');
                    // return response()->json(['error' => 'Terjadi kesalahan data!']);
                }
            }
        }
    }
}
