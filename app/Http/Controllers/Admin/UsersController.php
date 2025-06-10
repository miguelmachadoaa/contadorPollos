<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Auth;
use Illuminate\Support\Str;
use View;


class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly UserRepository $userRepository
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
        $users = $this->userRepository->all();

        return view('admin.users.home', compact('users'));
    }

    public function add()
    {
        return view('admin.users.add');
    }


    public function store(Request $request)
    {

        $this->userRepository->create($request->all());
  
        return redirect('admin/users');
        
    }


    public function edit($id)
    {

        $user = $this->userRepository->find($id);

        return view('admin.users.edit', compact('user'));
    }


    public function update($id, Request $request)
    {

        $this->userRepository->update($id, $request->all());

        return redirect('admin/users');
        
    }

    public function delete($id)
    {

        $this->userRepository->delete($id);

        return redirect('admin/users');
        
    }
    

}
