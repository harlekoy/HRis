<?php

/**
 * This file is part of the HRis Software package.
 *
 * HRis - Human Resource and Payroll System
 *
 * @link    http://github.com/HB-Co/HRis
 */

namespace HRis\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomField.
 */
class CustomField extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['custom_field_section_id', 'name', 'custom_field_type_id', 'required'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_fields';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * @author Bertrand Kintanar
     */
    public function type()
    {
        return $this->hasOne('HRis\Eloquent\CustomFieldType', 'id', 'custom_field_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author Bertrand Kintanar
     */
    public function options()
    {
        return $this->hasMany('HRis\Eloquent\CustomFieldOption', 'custom_field_id', 'id');
    }
}
