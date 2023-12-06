<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nota
 * 
 * @property int $id
 * @property string|null $materias
 * @property string|null $nombre
 * @property int|null $id_estudiante
 * @property string|null $profesor
 * @property string $previa
 * @property string $tecnico
 * @property string $final
 * @property string $definitiva
 * @property string $observacion
 *
 * @package App\Models
 */
class Nota extends Model
{
	protected $table = 'notas';
	public $timestamps = false;

	protected $casts = [
		'id_estudiante' => 'int'
	];

	protected $fillable = [
		'materias',
		'nombre',
		'id_estudiante',
		'profesor',
		'previa',
		'tecnico',
		'final',
		'definitiva',
		'observacion'
	];
}
