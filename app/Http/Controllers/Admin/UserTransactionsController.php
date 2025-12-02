<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserTransactionsController extends Controller
{
    public function index(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        return view('page.admin.user-transactions', [
            'username' => $user->name,
            'userId' => $user->id,
            'profile_picture' => $user->foto_link,
        ]);
    }

    public function data(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $username = $user->name;
        $school = $user->school ?? 'SMK BPI';
        $department = $user->major ?? 'RPL';
        $page = (int)($request->query('page', 1));
        $perPage = (int)($request->query('per_page', 10));

        $items = [];
        for ($i = 0; $i < 12; $i++) {
            $items[] = [
                'username' => $username,
                'school' => $school,
                'department' => $department,
                'product' => 'Cake Tiramisu',
                'price' => 200000,
                'transaction_date' => '2024-07-04',
                'status' => 'success',
            ];
        }

        $total = count($items);
        $offset = ($page - 1) * $perPage;
        $data = array_slice($items, $offset, $perPage);

        return response()->json([
            'username' => $username,
            'user_id' => $user->id,
            'total_omzet' => 5000000,
            'transactions' => $data,
            'pagination' => [
                'page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'pages' => (int)ceil($total / max(1, $perPage)),
            ],
        ]);
    }
}
