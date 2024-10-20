<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $m = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data = [];
        for($i = 0; $i < 12; $i++){
          $tahun = now()->format('Y');
          $tahun = $tahun.'-'.$m[$i];
          array_push($data, Tamu::where('created_at', 'like', $tahun.'%')->get()->count());
        }

        return view('admin.index', [
            'title' => 'Buku Tamu',
            'data' => $data,
            'hari' => Tamu::where('created_at', 'like', now()->format('Y-m-d').'%')->count(),
            'bulan' => Tamu::where('created_at', 'like', now()->format('Y-m').'%')->count(),
            'tahun' => Tamu::where('created_at', 'like', now()->format('Y').'%')->count(),
            'semua' => Tamu::all()->count()
        ]);
    }

    public function data(Request $request){
        $data = Tamu::where('created_at', 'like', now()->format('Y-m-d').'%')->get();;
        if($request->dmy){
            switch ($request->dmy) {
                case 'd':
                    $data = Tamu::where('created_at', 'like', now()->format('Y-m-d').'%')->get();
                    break;
                case 'm':
                    $data = Tamu::where('created_at', 'like', now()->format('Y-m').'%')->get();
                    break;
                case 'y':
                    $data = Tamu::where('created_at', 'like', now()->format('Y').'%')->get();
                    break;
                case 'a':
                    $data = Tamu::all();
                    break;
                default:
                    $data = Tamu::all();
                    break;
            }
        }elseif($request->from){
            $data = Tamu::whereBetween('created_at', [$request->from.'%', $request->to.'%'])->get();
        }

        $data = $data->sortByDesc('created_at');
        return view('admin.data',[
            'title' => 'Buku Tamu',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'instansi' => 'required',
            'pesan' => 'required'
        ]);

        if ($request->foto){
            if (!file_exists(public_path('storage/images'))) {
                mkdir(public_path('storage/images'), 0777, true);
            }
            $folderPath = public_path('storage/images/');
            $image_parts = explode(";base64,", $request->foto);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);

            $validated['foto'] = $imageName;
        };
        Tamu::create($validated);
        $nama = explode(' ', $validated['nama']);
        return redirect('/result')->with('success', $nama[0]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
