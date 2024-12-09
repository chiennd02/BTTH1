<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MedicineController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // Controller
public function index() {
    $employees = Employee::all(); // Lấy tất cả dữ liệu nhân viên
    return view('employees.index', compact('employees'));
}

}
