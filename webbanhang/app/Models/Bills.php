<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bills extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';
    protected $fillable = ['user_id', 'pro_id', 'bill_status'];
}