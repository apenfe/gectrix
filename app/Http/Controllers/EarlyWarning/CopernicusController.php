<?php

namespace App\Http\Controllers\EarlyWarning;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Log;
use Exception;
use GuzzleHttp\Client;

class CopernicusController extends Controller
{
    public function sentinel2()
    {
        $accessToken = session('copernicus_access_token');

        if (! $accessToken) {
            return response()->json(['error' => 'No access token found.'], 400);
        }

        $client = new Client([
            'base_uri' => 'https://catalogue.dataspace.copernicus.eu/stac/',
        ]);

        // Coordenadas de Murcia (bounding box: [minLon, minLat, maxLon, maxLat])
        $bbox = [-5.389, 35.86, -5.270, 35.92];

        // Fechas en formato ISO 8601
        $startDate = now()->subDays(90)->toISOString(); // Últimos 90 días
        $endDate = now()->toISOString();

        // Construcción de parámetros de consulta
        $query = [
            'bbox' => implode(',', $bbox),           // Bounding box
            'datetime' => "{$startDate}/{$endDate}", // Rango de fechas
            'collections' => 'SENTINEL-2',      // Colección Sentinel-2 nivel 2A
            'limit' => 5,                            // Máximo 5 resultados
        ];

        try {
            // Realizamos la consulta en la API STAC
            $response = $client->get('search', [
                'query' => $query,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            // Decodificamos la respuesta JSON
            $data = json_decode($response->getBody()->getContents(), true);

            // Si hay productos disponibles, los retornamos
            if (! empty($data['features'])) {
                // Extraemos los enlaces a los productos
                $productos = [];
                foreach ($data['features'] as $feature) {
                    $productos[] = [
                        'id' => $feature['id'],
                        'datetime' => $feature['properties']['datetime'],
                        'preview' => $feature['assets']['QUICKLOOK']['href'],
                        'product' => $feature['assets']['PRODUCT']['href'],
                    ];
                }

                return response()->json($productos);
            } else {
                return response()->json(['message' => 'No se encontraron imágenes recientes para Murcia.']);
            }
        } catch (Exception $e) {
            // En caso de error, lo capturamos y respondemos con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sentinel2refactor($bbox, $startDate)
    {
        $client = new Client([
            'base_uri' => 'https://catalogue.dataspace.copernicus.eu/stac/',
        ]);

        $endDate = now()->toISOString();

        // Construcción de parámetros de consulta
        $query = [
            'bbox' => implode(',', $bbox),           // Bounding box
            'datetime' => "{$startDate}/{$endDate}", // Rango de fechas
            'collections' => 'SENTINEL-2',           // Colección Sentinel-2 nivel 2A
            'limit' => 1,                            // Máximo 5 resultados
        ];

        try {
            // Realizamos la consulta en la API STAC
            $response = $client->get('search', [
                'query' => $query,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            // Decodificamos la respuesta JSON
            $data = json_decode($response->getBody()->getContents(), true);

            // Si hay productos disponibles, los retornamos
            if (! empty($data['features'])) {
                // Extraemos los enlaces a los productos
                $productos = [];
                foreach ($data['features'] as $feature) {
                    $productos[] = [
                        'id' => $feature['id'],
                        'datetime' => $feature['properties']['datetime'],
                        'preview' => $feature['assets']['QUICKLOOK']['href'],
                        'product' => $feature['assets']['PRODUCT']['href'],
                    ];
                }

                return $this->filterResults($productos);

            } else {
                return [];
            }
        } catch (Exception $e) {
            // En caso de error, lo capturamos y respondemos con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sentinel1()
    {
        $client = new Client([
            'base_uri' => 'https://catalogue.dataspace.copernicus.eu/stac/',
        ]);

        // Coordenadas de Ceuta (bounding box: [minLon, minLat, maxLon, maxLat])
        $bbox = [-5.389, 35.86, -5.270, 35.92];

        // Fechas en formato ISO 8601
        $startDate = now()->subDays(200)->toISOString(); // Últimos 90 días
        $endDate = now()->toISOString();

        // Construcción de parámetros de consulta
        $query = [
            'bbox' => implode(',', $bbox),           // Bounding box
            'datetime' => "{$startDate}/{$endDate}", // Rango de fechas
            'collections' => 'SENTINEL-1',      // Colección Sentinel-1
            'limit' => 5,                            // Máximo 5 resultados
        ];

        try {
            // Realizamos la consulta en la API STAC
            $response = $client->get('search', [
                'query' => $query,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            // Decodificamos la respuesta JSON
            $data = json_decode($response->getBody()->getContents(), true);

            // Si hay productos disponibles, los retornamos
            if (! empty($data['features'])) {
                // Extraemos los enlaces a los productos
                $productos = [];
                foreach ($data['features'] as $feature) {
                    $producto = [
                        'id' => $feature['id'],
                        'datetime' => $feature['properties']['datetime'],
                        'product' => $feature['assets']['PRODUCT']['href'],
                    ];

                    // Verificamos si existe el enlace a la vista previa (QUICKLOOK)
                    if (isset($feature['assets']['QUICKLOOK'])) {
                        $producto['preview'] = $feature['assets']['QUICKLOOK']['href'];
                    } else {
                        $producto['preview'] = 'Vista previa no disponible';
                    }

                    $productos[] = $producto;
                }

                return response()->json($productos);
            } else {
                return response()->json(['message' => 'No se encontraron imágenes recientes para Ceuta.']);
            }
        } catch (Exception $e) {
            // En caso de error, lo capturamos y respondemos con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function filterResults($data)
    {
        // recorrer el array y eliminar de este los elementos cuyo preview sea Vista previa no disponible
        $filtered = array_filter($data, function ($item) {
            return $item['preview'] !== 'Vista previa no disponible';
        });

        return $filtered;

    }

    public function getAccessToken()
    {
        // Obtener las credenciales desde el archivo .env
        $username = env('COPERNICUS_USERNAME');
        $password = env('COPERNICUS_PASSWORD');
        $clientId = env('COPERNICUS_CLIENT_ID');
        $tokenUrl = env('COPERNICUS_TOKEN_URL');

        $client = new Client;

        try {
            // Realizar la solicitud POST para obtener el token
            $response = $client->post($tokenUrl, [
                'form_params' => [
                    'username' => $username,
                    'password' => $password,
                    'grant_type' => 'password',
                    'client_id' => $clientId,
                ],
            ]);

            // Decodificar la respuesta JSON
            $data = json_decode($response->getBody()->getContents(), true);

            // Obtener el ACCESS_TOKEN
            $accessToken = $data['access_token'];

            // Guardarlo en la sesión o retornarlo
            session(['copernicus_access_token' => $accessToken]);

            return response()->json([
                'access_token' => $accessToken,
                'expires_in' => $data['expires_in'],
            ]);

        } catch (Exception $e) {
            Log::error('Error al obtener el ACCESS_TOKEN: '.$e->getMessage());

            return response()->json(['error' => 'No se pudo obtener el token de acceso'], 500);
        }
    }


}
