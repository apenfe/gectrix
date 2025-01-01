<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Http\Requests\EarlyWarning\SatRequest;
use App\Models\Sat;
use App\Models\Target;

class SatController extends Controller
{
    public function create(Target $target)
    {
        return view('alerta-temprana.targets.sats.create', compact('target'));
    }

    public function store(SatRequest $request, Target $target)
    {

        $data = $request->validated();
        $data['target_id'] = $target->id;

        $copernicusController = new CopernicusController;

        $bbox = [
            $request->input('longitude_west'), // Longitud mínima
            $request->input('latitude_south'), // Latitud mínima
            $request->input('longitude_east'), // Longitud máxima
            $request->input('latitude_north'),  // Latitud máxima
        ];

        $startDate = $request->input('start_date');

        if ($data['satellite'] == 'sentinel2') {

            $response = $copernicusController->sentinel2($bbox, $startDate);

            if (count($response) > 0) {
                $data['image_route'] = (string) $response[0]['preview'];

                Sat::create($data);
            } else {
                return redirect()->route('targets.show', $target->id)->with('error', 'No se han encontrado imágenes de satélite para las coordenadas y fecha seleccionadas');
            }

        } else {

            $response = $copernicusController->sentinel3($bbox, $startDate);

            if (count($response) > 0) {
                $data['image_route'] = (string) $response[0]['preview'];
                Sat::create($data);
            } else {
                return redirect()->route('targets.show', $target->id)->with('error', 'No se han encontrado imágenes de satélite para las coordenadas y fecha seleccionadas');
            }
        }

        return redirect()->route('targets.show', $target->id)->with('success', 'Imágenes de satélite cargadas correctamente');
    }

    public function destroy(Target $target, Sat $sat)
    {
        $sat->delete();

        return redirect()->route('targets.show', $target)->with('success', 'Imagen satelital eliminada correctamente.');
    }
}
