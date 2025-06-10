<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\ContratoDetalle;
use App\Models\User;
class Auditoria extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $table = 'auditoria';

    protected $guarded = ['id'];

    public function usuario(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
