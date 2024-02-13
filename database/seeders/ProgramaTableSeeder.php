<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programa;

class ProgramaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $programas = [
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS - GESTIÓN DE LA CALIDAD E INOCUIDAD DE ALIMENTOS',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 1,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS CON MENCIÓN EN INGENIERÍA DE PROCESOS INDUSTRIALES',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 1,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN MICROBIOLOGÍA CLÍNICA',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 11,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN GESTIÓN AMBIENTAL',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 11,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN EDUCACIÓN AMBIENTAL INTERCULTURAL',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 11,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS CON MENCIÓN EN INGENIERÍA HIDRÁULICA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 2,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS CON MENCIÓN EN ORDENAMIENTO TERRITORIAL Y DESARROLLO URBANO',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 2,
            ],
            [
                'nombre' => 'MAESTRÍA EN GERENCIA DE OBRAS Y CONSTRUCCIÓN',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 2,
            ],
            [
                'nombre' => 'MAESTRÍA EN INGENIERÍA DE SISTEMAS CON MENCIÓN EN GERENCIA DE TECNOLOGÍAS DE LA INFORMACIÓN Y GESTIÓN DEL SOFTWARE',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 2,
            ],
            [
                'nombre' => 'DOCTORADO EN TERRITORIO Y URBANISMO SOSTENIBLE',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 2,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS CON MENCIÓN EN PROYECTOS DE INVERSIÓN',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 3,
            ],
            [
                'nombre' => 'DOCTORADO EN ADMINISTRACIÓN',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 3,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE ENFERMERÍA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'DOCTORADO EN CIENCIAS DE ENFERMERÍA',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA ORGANIZACIONAL Y DE GESTIÓN ENFERMERA ESPECIALISTA EN ADMINISTRACIÓN Y GERENCIA EN SALUD CON MENCIÓN EN GESTIÓN DE LA CALIDAD',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DE SALUD PÚBLICA Y COMUNITARIA ENFERMERA ESPECIALISTA EN SALUD PÚBLICA CON MENCIÓN EN SALUD FAMILIAR',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN CUIDADO INTEGRAL INFANTIL CON MENCIÓN EN CRECIMIENTO Y DESARROLLO',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN CUIDADOS CRÍTICOS CON MENCIÓN EN ADULTO',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN CUIDADOS CRÍTICOS CON MENCIÓN EN NEONATOLOGÍA',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN EMERGENCIA Y DESASTRES CON MENCIÓN EN CUIDADOS HOSPITALARIOS',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN GASTROENTEROLOGÍA Y PROCEDIMIENTOS ENDOSCÓPICOS CON MENCIÓN EN PROCEDIMIENTOS ENDOSCÓPICOS',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ESPECIALISTA EN ENFERMERÍA NEFROLÓGICA Y UROLÓGICA CON MENCIÓN EN DIÁLISIS',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ESPECIALISTA EN ENFERMERÍA ONCOLÓGICA CON MENCIÓN EN ONCOLOGÍA',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ESPECIALISTA EN ENFERMERÍA PEDIÁTRICA Y NEONATOLOGÍA CON MENCIÓN EN PEDIATRÍA',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DE SALUD PÚBLICA Y COMUNITARIA ENFERMERA ESPECIALISTA EN SALUD OCUPACIONAL CON MENCIÓN EN SALUD OCUPACIONAL',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'SEGUNDA ESPECIALIDAD PROFESIONAL EN ÁREA DEL CUIDADO A LA PERSONA ENFERMERA ESPECIALISTA EN CENTRO QUIRÚRGICO ESPECIALIZADO CON MENCIÓN EN CENTRO QUIRÚRGICO',
                'grado_id' => 3, // SEGUNDA ESPECIALIDAD
                'facultad_id' => 4,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA INGENIERÍA MECÁNICA Y ELÉCTRICA CON MENCIÓN EN ENERGÍA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 5,
            ],
            [
                'nombre' => 'DOCTORADO EN CIENCIAS DE LA INGENIERÍA MECÁNICA Y ELÉCTRICA CON MENCIÓN EN ENERGÍA',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 5,
            ],
            [
                'nombre' => 'MAESTRÍA EN DERECHO CON MENCIÓN EN CIVIL Y COMERCIAL',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 6,
            ],
            [
                'nombre' => 'MAESTRÍA EN DERECHO CON MENCIÓN EN DERECHO CONSTITUCIONAL Y PROCESAL CONSTITUCIONAL',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 6,
            ],
            [
                'nombre' => 'MAESTRÍA EN DERECHO CON MENCIÓN EN DERECHO PENAL Y PROCESAL PENAL',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 6,
            ],
            [
                'nombre' => 'DOCTORADO EN DERECHO Y CIENCIA POLÍTICA',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 6,
            ],
            [
                'nombre' => 'MAESTRÍA EN GESTIÓN INTEGRADA DE LOS RECURSOS HÍDRICOS ',
                'grado_id' => 2, 
                'facultad_id' => 7,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA EDUCACIÓN CON MENCIÓN EN DIDÁCTICA DEL IDIOMA INGLÉS',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA EDUCACIÓN CON MENCIÓN EN DOCENCIA Y GESTIÓN UNIVERSITARIA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS SOCIALES CON MENCIÓN EN GESTIÓN PÚBLICA Y GERENCIA SOCIAL',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA EDUCACIÓN CON MENCIÓN EN TECNOLOGÍAS DE LA INFORMACIÓN E INFORMÁTICA EDUCATIVA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA EDUCACIÓN CON MENCIÓN EN GERENCIA EDUCATIVA ESTRATÉGICA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'MAESTRÍA EN CIENCIAS DE LA EDUCACIÓN CON MENCIÓN EN INVESTIGACIÓN Y DOCENCIA',
                'grado_id' => 2, // MAESTRÍA
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'DOCTORADO EN SOCIOLOGÍA',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'DOCTORADO EN CIENCIAS DE LA EDUCACIÓN',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 8,
            ],
            [
                'nombre' => 'DOCTORADO EN CIENCIAS AMBIENTALES',
                'grado_id' => 1, // DOCTORADO
                'facultad_id' => 9,
            ],
        ];

        foreach ($programas as $programaData) {
            Programa::create($programaData);
        }
    }
}
