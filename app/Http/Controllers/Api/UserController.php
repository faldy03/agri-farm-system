<?php
namespace App\Http\Controllers\Api;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // Mengambil data dari service
        $users = $this->userService->getAll();

        // RETURN VIEW, bukan return JSON
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        return response()->json(
            $this->userService->findById($id)
        );
    }

    public function create()
    {
        // Mengarahkan ke file resources/views/users/create.blade.php
        return view('users.create');
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name'
        ]);

        $user = $this->userService->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($id, $request->all());

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id, auth()->id());

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 403);
        }
    }
}