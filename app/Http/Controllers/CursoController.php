<?php
namespace App\Http\Controllers;
use App\Models\Curso;


use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CursoController extends Controller
{
   // Método para mostrar la lista de cursos
  public function index($ano = '4to', $carrera = 'BACHILLERATO EN COMPUTACIÓN')
{
            // Filtrar los cursos por el año y la carrera específicos
            $cursos = Curso::where('nivel', $ano)
                        ->where('carrera', $carrera)
                        ->orderBy('nombre', 'desc')
                        ->paginate(6);
            
            // Retornar la vista con los cursos filtrados
            return view('4tocomputacion', compact('cursos'));
        }


        public function computacion($ano = '5to', $carrera = 'BACHILLERATO EN COMPUTACIÓN')
        {
            // Filtrar los cursos que pertenecen al 5to año
            $cursos = Curso::where('nivel', $ano)
                            ->where('carrera', $carrera)
                            ->orderBy('nombre', 'desc')
                            ->paginate(6);

        // Retornar la vista con los cursos filtrados
        return view('computacion', compact('cursos'));
        }





    public function cuartoPerito($ano = '4to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
    // Filtrar los cursos que pertenecen al 4to año de perito
                        $cursos = Curso::where('nivel', $ano)
                        ->where('carrera', $carrera)
                        ->orderBy('nombre', 'desc')
                        ->paginate(6);

                    // Retornar la vista con los cursos filtrados
                    return view('4toperito', compact('cursos'));
                    }



    public function quintoPerito($ano = '5to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
    // Filtrar los cursos que pertenecen al 5to año de perito
                        $cursos = Curso::where('nivel', $ano)
                        ->where('carrera', $carrera)
                        ->orderBy('nombre', 'desc')
                        ->paginate(6);

                    // Retornar la vista con los cursos filtrados
                    return view('perito', compact('cursos'));
                    }


    public function sextoPerito($ano = '6to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
    // Filtrar los cursos que pertenecen al 6to año de perito
                        $cursos = Curso::where('nivel', $ano)
                        ->where('carrera', $carrera)
                        ->orderBy('nombre', 'desc')
                        ->paginate(6);

                    // Retornar la vista con los cursos filtrados
                    return view('6toperito', compact('cursos'));
                    }




    public function cuartoMagisterio($ano = '4to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
                    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('4tomagisterio', compact('cursos'));
                }



    public function quintoMagisterio($ano = '5to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('magisterio', compact('cursos'));
                }

    public function sextoMagisterio($ano = '6to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('6tomagisterio', compact('cursos'));
                }





    public function cuartoSecretariado($ano = '4to', $carrera = 'Secretariado Bilingüe Inglés-Español')
    {
                    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('4tosecretariado', compact('cursos'));
                }



    public function quintoSecretariado($ano = '5to', $carrera = 'Secretariado Bilingüe Inglés-Español')
    {
                    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('secretariado', compact('cursos'));
                }

    public function sextoSecretariado($ano = '6to', $carrera = 'Secretariado Bilingüe Inglés-Español')
    {
    // Filtrar los cursos que pertenecen al 4to año de perito
                    $cursos = Curso::where('nivel', $ano)
                    ->where('carrera', $carrera)
                    ->orderBy('nombre', 'desc')
                    ->paginate(6);

                // Retornar la vista con los cursos filtrados
                return view('6tosecretariado', compact('cursos'));
                }




}