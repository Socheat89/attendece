<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpiCategory extends Model
{
    use \App\Traits\BelongsToCompany;

    protected $fillable = ['company_id', 'name', 'color'];

    public function kpis(): HasMany
    {
        return $this->hasMany(Kpi::class, 'kpi_category_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
