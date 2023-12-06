<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 * 
 * @property int $id
 * @property string|null $Nombre
 * @property string|null $Genero
 * @property string|null $Cedula
 * @property string|null $Fecha_nacimiento
 * @property string|null $Instrumento
 * @property string|null $Materias_teoricas
 * @property string|null $Tutor_teorico
 * @property string|null $Catedras
 * @property string|null $Tutor_catedras
 * @property string|null $Nombre_representante
 * @property string|null $Ocupacion_representante
 * @property string|null $Parentesco
 * @property string|null $Cedula_representante
 * @property string|null $Telefono_estudiantes
 * @property string|null $Telefono_representante
 * @property string|null $Nombre_emergencia
 * @property string|null $Numero_emergencia
 * @property string|null $Correo_electronico
 * @property string|null $Direccion
 * @property string|null $Fecha_ingreso
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiantes';

	protected $fillable = [
		'Nombre',
		'Genero',
		'Cedula',
		'Fecha_nacimiento',
		'Instrumento',
		'Materias_teoricas',
		'Tutor_teorico',
		'Catedras',
		'Tutor_catedras',
		'Nombre_representante',
		'Ocupacion_representante',
		'Parentesco',
		'Cedula_representante',
		'Telefono_estudiantes',
		'Telefono_representante',
		'Nombre_emergencia',
		'Numero_emergencia',
		'Correo_electronico',
		'Direccion',
		'Fecha_ingreso'
	];
}
