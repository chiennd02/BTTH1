<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales'; // Tên bảng
    protected $fillable = ['medicine_id', 'quantity', 'sale_date', 'customer_phone']; // Các cột có thể gán giá trị

    /**
     * Quan hệ với bảng Medicines (Một giao dịch bán hàng thuộc về một loại thuốc).
     */
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
