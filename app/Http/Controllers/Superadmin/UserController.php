<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Unit;


use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            $query = User::with('unit','role');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">">
                                        Edit
                                    </a>
                                    <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.superadmin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $units = Unit::all();
        return view('pages.superadmin.user.create',[
            'roles' => $roles,
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'nama_users' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role_id' => 'nullable|integer|exists:roles,id',
            'unit_id' => 'nullable|integer|exists:units,id',
            'password' => 'required|string',
            'is_active' => 'required|integer',
        ]);

        $data['password'] = bcrypt($data['password']);
        
        User::create($data);
        return redirect()->route('user.index');
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
        //
        $item = User::with(['role','unit'])->findOrFail($id);
        $roles = Role::all();
        $units = Unit::all();

        return view('pages.superadmin.user.edit',[
            'item' => $item,
            'roles' => $roles,
            'units' => $units
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
        //
        $data = $request->validate([
            'nama_users' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role_id' => 'nullable|integer|exists:roles,id',
            'unit_id' => 'nullable|integer|exists:units,id',
            'password' => 'required|string',
            'is_active' => 'required|integer',
        ]);

        
        $item = User::findOrFail($id);

       
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $item->update($data);
        
        return redirect()->route('user.index');
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
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
