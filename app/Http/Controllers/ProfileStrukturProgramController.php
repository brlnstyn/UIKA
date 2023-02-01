<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileStrukturProgramStudi;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProfileStrukturProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('a');
        $profilestruktur = DB::table('profile_struktur_program_studi')->get();
        return view('profile.struktur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.struktur.create');
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

        ProfileStrukturProgramStudi::Create($data);

        return redirect()->route('profile-struktur-program-studi.index')
            ->with(toaster('Profile struktur program studi created successfully', 'success', 'success'));
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
        $profilestruktur_edit = ProfileStrukturProgramStudi::find($id);
        return view('profile.struktur.index', [
            'profilestruktur_edit' => $profilestruktur_edit
        ]);
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
        $input = $request->all();

        $ProfileStruktur = ProfileStrukturProgramStudi::find($id);
        $ProfileStruktur->update($input);

        return redirect()->route('profile-struktur-program-studi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ProfileStrukturProgramStudi::find($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }

    public function datatable(Request $req)
    {
        if ($req->ajax()) {
            $this->type = $req['type'];
            $model      = DB::table('profile_struktur_program_Studi');

            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('regional_name', function ($data) {
                    return ($data->regional_name);
                })
                ->addColumn('regional_area', function ($data) {
                    return ($data->regional_area);
                })
                ->addColumn('regional_sub_area', function ($data) {
                    return ($data->regional_sub_area);
                })
                ->addColumn('action', function ($data) {
                    $button = '';
                    if (auth()->user()->can('master-regionals.edit')) {
                        $button .= ' <a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-icon btn-primary btn-sm" title="Edit">
                    ' . SVGI('bi-pencil-square') . '
                    </a>';
                    }
                    // if ($this->type == 'create') {
                    //     if (auth()->user()->can('master-regionals.delete')) {
                    //         $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="' . route($this->route . '.destroy', $data->id) . '"title="Delete">
                    //         ' . SVGI('bi-trash') . '
                    //     </button>';
                    //     }
                    // }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
