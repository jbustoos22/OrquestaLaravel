<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $username
 * @property string $clave
 * @property string $rango
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $fillable = [
		'username',
		'clave',
		'rango'
	];
}
