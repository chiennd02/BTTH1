<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines'; // Tên bảng
    protected $fillable = ['name', 'brand', 'dosage', 'form', 'price', 'stock']; // Các cột có thể gán giá trị

    /**
     * Quan hệ với bảng Sales (Một loại thuốc có nhiều giao dịch bán hàng).
     */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'medicine_id');
    }
}
