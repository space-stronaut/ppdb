<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->nama == 'admin') {
            $items = Pendaftaran::all();

            return view('pendaftaran.index', compact('items'));
        }elseif(Auth::user()->role->nama == 'calon'){
            $items = Pendaftaran::where('user_id', Auth::user()->id)->get();

            return view('pendaftaran.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['berkas'] = $request->file('berkas')->store('berkas', 'public');

        Pendaftaran::create($data);

        return redirect()->route('pendaftaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pendaftaran::find($id);

        return view('pendaftaran.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);

        return view('pendaftaran.edit', compact('pendaftaran'));
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
        $data = $request->all();

        if ($request->hasFile('berkas')){
            $data['berkas'] = $request->file('berkas')->store('berkas', 'public');
            if (Pendaftaran::where('user_id', Auth::user()->id)->first() != NULL) {
                Pendaftaran::find($id)->update([
                    'user_id' => Auth::user()->id,
                    'berkas' => $data['berkas']
                ]);
            }else{
                Pendaftaran::create([
                    'user_id' => Auth::user()->id,
                    'status' => 'proses',
                    'berkas' => $data['berkas']
                ]);
            }
        }


        User::find($request->id)->update([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nama_wali' => $request->nama_wali
        ]);

        // dd($request);

        return redirect()->route('pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftaran::find($id)->delete();

        return redirect()->back();
    }

    public function unduh($id)
    {
        $berkas = Pendaftaran::find($id)->berkas;

        return response()->download(storage_path('app/public/'.$berkas));

        // return response()->download(storage_path('app/public/'.$bukti));
        // return response()->download(storage_path('app/public/'.$berkas));
    }

    public function status(Request $request,$id)
    {
        Pendaftaran::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }
}
