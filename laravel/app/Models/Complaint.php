<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use HasFactory;
    
    protected $table = 'complaint';
    
    protected $fillable = [
        'title',
        'text_problem',
        'client_id',
        'in_work'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_id' => 'integer',
        'in_work' => 'boolean',
    ];
    
    /**
     * @return BelongsTo
     */
    public function clientApp(): BelongsTo
    {
        return $this->belongsTo(ClientApp::class);
    }
}
