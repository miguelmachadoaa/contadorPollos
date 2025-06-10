<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\RolesRepository;
use Auth;
use Illuminate\Support\Str;
use View;


class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly RolesRepository $rolesRepository
    )
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = $this->rolesRepository->all();

        return view('admin.roles.home', compact('roles'));
    }

    public function add()
    {
        return view('admin.roles.add');
    }


    public function store(Request $request)
    {

        $this->rolesRepository->create($request->all());
  
        return redirect('admin/roles');
        
    }


    public function edit($id)
    {
        $rol = $this->rolesRepository->find($id);

        return view('admin.roles.edit', compact('rol'));
    }


    public function update($id, Request $request)
    {

        $this->rolesRepository->update($id, $request->all());

        return redirect('admin/roles');
        
    }

    public function delete($id)
    {

        $this->rolesRepository->delete($id);

        return redirect('admin/roles');
        
    }
    

}
