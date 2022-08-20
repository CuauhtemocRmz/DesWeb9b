<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendarContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generarcalendario(int $mes, int $año, string $area, string $url, int $idarea, string $ruta)
	{

		$dias_semana = dias();
		$meses = Meses();
		$asuetos = asuetos();
		$base_url = base_url();
		$PrimerDiaMes = mktime(0, 0, 0, $mes, 1, $año);
		$NumeroDeDias = date('t', $PrimerDiaMes);
		$dateComponents = getdate($PrimerDiaMes);
		$NombreDelMes = $meses[$dateComponents['mon'] - 1];
		$DiaDeLaSemana = $dateComponents['wday'];

		$mes_anterior = date('m', mktime(0, 0, 0, $mes - 1, 1, $año));
		$año_anterior = date('Y', mktime(0, 0, 0, $mes - 1, 1, $año));
		$mes_siguiente = date('m', mktime(0, 0, 0, $mes + 1, 1, $año));
		$año_siguiente = date('Y', mktime(0, 0, 0, $mes + 1, 1, $año));

		$calendario = "<center>  <h2 >$NombreDelMes $año  </h2>";
		$calendario .= "<br>";

		// los botones para cambio de mes 
		$calendario .= "<a class='btn btn-azul m-tb-5'  href='$url" . "$mes_anterior/" . "$año_anterior '>Mes anterior </a> ";
		$calendario .= "<a class='btn btn-azul m-tb-5'  href='$url" . date('m') . "/" .  date('Y') . "'>Mes actual</a> ";
		$calendario .= "<a class='btn btn-azul m-tb-5'  href='$url" . "$mes_siguiente/" . "$año_siguiente '>Mes siguiente </a></center> ";

		$calendario .= "
   			<br>
   		<table class='table table-bordered' id='calendario' >";

		$calendario .= "<tr>";

		// Crear los headers del calendario
		foreach ($dias_semana as $dia) {
			$calendario .= "<th  class='bg11 text-white text-center'>$dia</th>";
		}

		// Crear el resto del calendario
		$DiaActual = 1;
		$calendario .= "</tr><tr>";

		// $DiaDeLaSemana se usa para verificar que se creen 7 columnas
		if ($DiaDeLaSemana > 0) {
			for ($k = 0; $k < $DiaDeLaSemana; $k++) {
				$calendario .= "<td  class='empty'></td>";
			}
		}

		$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);

		while ($DiaActual <= $NumeroDeDias) {
			// Septima columna (Sabado) creada. Crear nueva fla.
			if ($DiaDeLaSemana == 7) {
				$DiaDeLaSemana = 0;
				$calendario .= "</tr><tr>";
			}
			$DiaActualRel = str_pad($DiaActual, 2, "0", STR_PAD_LEFT);
			$fecha = "$año-$mes-$DiaActualRel";
			$NombreDia = strtolower(date('l', strtotime($fecha)));
			$hoy = $fecha == date('Y-m-d') ? 'hoy' : '';


			if ($NombreDia == "sunday"  || $NombreDia == "saturday" || $fecha < date('Y-m-d') || $fecha == date('Y-m-d')) {
				$calendario .= "<td><h4>$DiaActual</h4> <button class='btn btn-secondary' > <i class='fa fa-times'></i> </button>  </td>";
			} else {
				if (in_array($fecha, $asuetos)) {
					$calendario .= "<td><h4>$DiaActual</h4> <button class='btn btn-danger text-white' > <i class='fa fa-times'></i> </button>  </td>";
				} else {
					$calendario .= "<td><h4>$DiaActual</h4> <a href='$base_url/usae/turnos/$idarea/$ruta/$fecha'  class='btn btn-success'>Agendar</a> </td>";
				}
			}

			$calendario .= "</td>";
			// Incrementar contadores
			$DiaActual++;
			$DiaDeLaSemana++;
		}

		// Completar la fila de la ultima semana del mes en caso de ser necesario
		if ($DiaDeLaSemana != 7) {
			$DiasRestantes = 7 - $DiaDeLaSemana;
			for ($l = 0; $l < $DiasRestantes; $l++) {
				$calendario .= "<td class='empty'></td>";
			}
		}

		$calendario .= "</tr>";
		$calendario .= "</table>";
		$request = array(
			'calendario' => $calendario
		);
		return $request;
	}
}
