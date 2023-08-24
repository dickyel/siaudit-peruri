<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temuan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'temuans';

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class);
    }

    // app/Models/Temuan.php

    public function hasRecommendations()
    {
        return $this->rekomendasis()->exists(); // Assuming you have a relationship named 'rekomendasi'
    }

}
