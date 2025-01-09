<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin'); // กำหนดให้เฉพาะ admin เท่านั้นที่สามารถเข้าถึง
    // }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:8',
                'role' => 'required|in:user,admin',
            ]);
            // dd($request->role);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // Success message
            return redirect()->back()->with('status', 'success')->with('message', 'User created successfully :)');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('message', 'Creation failed: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
{
    try {
        // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
        $user = User::findOrFail($id);  // ใช้ findOrFail เพื่อให้แน่ใจว่าจะได้รับข้อมูลจากฐานข้อมูล

        DB::beginTransaction();

        // ตรวจสอบข้อมูลที่ส่งมา
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $user->id,
            'role' => 'required|string|in:admin,user', // ตรวจสอบว่าเป็น admin หรือ user เท่านั้น
        ]);

        // อัปเดตข้อมูลผู้ใช้
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
        ]);

        DB::commit();
        return redirect()->back()->with('status', 'success')->with('message', 'User updated successfully :)');
    } catch (\Exception $e) {
        DB::rollback();
        Log::error('Update User Failed: ' . $e->getMessage());
        return redirect()->back()->with('status', 'error')->with('message', 'Update failed :) ' . $e->getMessage());
    }
}



    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // ลบผู้ใช้
            $User = User::findOrFail($id);
            $User->delete();
            // commit การทำงาน
            DB::commit();

            // ส่งข้อความ success ไปยัง session
            return redirect()->back()->with('status', 'success')->with('message', 'User deleted successfully :)');
        } catch (\Exception $e) {
            // ถ้ามีข้อผิดพลาดเกิดขึ้น, log ข้อผิดพลาดและ rollback
            Log::error($e->getMessage());
            DB::rollback();
            // ส่งข้อความ error ไปยัง session
            return redirect()->back()->with('status', 'error')->with('message', 'Delete failed :) ' . $e->getMessage());
        }
    }
}
