<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\ApiService;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ApiService $apiService,
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
        $users = $this->userRepository->all()->count();

        return view('admin.home.home', compact(
            'users',
        ));
    }
}
