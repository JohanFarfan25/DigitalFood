<?php

use App\Exceptions\ValidationException;
use GuzzleHttp\Psr7\Request;

/*
 * fill string with a character till a specific lenght
 */

if (!function_exists('fill_string')) {
    function fill_string($string, $character, $length, $fill_after = false)
    {
        if (strlen($string) < $length) {
            return $fill_after
                ? $string . str_repeat($character, $length - strlen($string)) // fill character after string
                : str_repeat($character, $length - strlen($string)) . $string; // fill character before string
        }

        if (strlen($string) > $length) {
            return substr($string, 0, $length);
        }

        return $string;
    }
}

/*
 * Remove accents
 */
if (!function_exists('remove_accents')) {
    function remove_accents($string)
    {
        $string = str_replace(
            ['á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'],
            ['a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'],
            $string
        );

        $string = str_replace(
            ['é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'],
            ['e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'],
            $string
        );

        $string = str_replace(
            ['í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'],
            ['i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'],
            $string
        );

        $string = str_replace(
            ['ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'],
            ['o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'],
            $string
        );

        $string = str_replace(
            ['ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'],
            ['u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'],
            $string
        );

        $string = str_replace(
            ['ñ', 'Ñ', 'ç', 'Ç'],
            ['n', 'N', 'c', 'C'],
            $string
        );

        $string = str_replace(
            ['—', '-', '_'],
            [' ', ' ', ' '],
            $string
        );

        return $string;
    }

    /*
     * get Exception detail
     */
    if (!function_exists('getExceptionDetail')) {
        function getExceptionDetail(Exception $ex)
        {
            return $ex->getMessage() . 'on File ' . $ex->getFile() . ' on Line ' . $ex->getLine();
        }
    }

    /*
     * get Exception detail
     */
    if (!function_exists('curl_post')) {
        function curl_post(string $url, $payload, array $headers)
        {
            $curl = curl_init();
            $response = new stdClass();
            $response->data = null;
            $response->err = null;

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => $headers,
            ]);

            $response->data = curl_exec($curl);
            $response->err = curl_error($curl);
            curl_close($curl);

            return $response;
        }
    }

    /*
     * Retorna la fecha a mes calendario.
     * @var $init_date fecha inicial de referencia
     * @var $interval - Cada cuanto se generara la fecha, (mensual, trimestral...)
     * @var $installment_number numero de la fecha a partir de la inicial.
     */
    if (!function_exists('getCalendarDate')) {
        function getCalendarDate($init_date, $interval, $installment_number = 1)
        {
            //divida la fecha inicial para tomar el mes y año.
            $year_offset = 0;
            $init_date_array = explode('-', $init_date);

            // Calcule el mes de la nueva fecha,
            //usando el intervalo de meses por el numero de la cuota y sumandole el mes de la fecha inicial.
            $new_month = $interval * $installment_number + (int) $init_date_array[1];

            // si el nuevo mes sobrepasa los 12 meses.
            // Realice un recalculo del nuevo mes y año restandole 12 meses
            //y agregando un offset al año por cada docena restada.
            while ($new_month > 12) {
                $new_month -= 12;
                $year_offset += 1;
            }

            // Calcule el nuevo año agregando el offset.
            $new_year = (int) $init_date_array[0] + $year_offset;

            // Obtenga el ultimo dia del nuevo mes y año obtenido anteriormente.
            $new_date = date('Y-m-t', strtotime("$new_year-$new_month-01"));
            $new_date_array = explode('-', $new_date);

            // Si el dia de la fecha inicial supera el ultimo dia del nuevo mes obtenido.
            // retorne la fecha con el ultimo dia del mes. Por el contrario retorne la fecha
            // usando el dia de la fecha inicial.
            return (int) $init_date_array[2] >= (int) $new_date_array[2]
                ? $new_date
                : date('Y-m-d', strtotime("$new_year-$new_month-$init_date_array[2]"));
        }
    }

    /*
     * Devuelve el acronimo de la brand
     */
    if (!function_exists('getAcronim')) {
        function getAcronim($brand)
        {
            $acronim = '';
            if ($brand == 1) {
                $acronim = 'BDT';
            } elseif ($brand == 2) {
                $acronim = 'ATH';
            } elseif ($brand == 3) {
                $acronim = 'BDT';
            } else {
                throw new ValidationException('Invalid brand');
            }

            return $acronim;
        }
    }

    /*
     * Devuelve el tipo de documento
     */
    if (!function_exists('getDocumentTypeById')) {
        function getDocumentTypeById($id)
        {
            $type = '';
            if ($id == 10) {
                $type = 'CC';
            } elseif ($id == 20) {
                $type = 'CE';
            } elseif ($id == 50) {
                $type = 'TI';
            } elseif ($id == 9) {
                $type = 'NIT';
            } elseif ($id == 30) {
                $type = 'PS';
            }

            return $type;
        }
    }

    /*
     * Devuelve el tipo de documento
     */
    if (!function_exists('sendUserNotification')) {
        function sendUserNotification(stdClass $data)
        {
            try {
                $client = new GuzzleHttp\Client();
                $socketUrl = env('MIX_SOCKET_CLIENT_URL');

                if (!isset($data->users_id)) {
                    throw new ValidationException('Invalid users_id');
                }

                if (!isset($data->title)) {
                    throw new ValidationException('Invalid title');
                }

                if (!isset($data->description)) {
                    throw new ValidationException('Invalid description');
                }

                if (!isset($data->type)) {
                    throw new ValidationException('Invalid type');
                }

                if (!isset($data->brand_id)) {
                    throw new ValidationException('Invalid brand_id');
                }

                if (!isset($data->brand_id)) {
                    throw new ValidationException('Invalid brand_id');
                }

                if (empty($socketUrl)) {
                    throw new ValidationException('Invalid brand_id');
                }

                $endpoint = $socketUrl . '/notifications/trigger-action';
                $result = $client->post($endpoint, [
                    'json' => [
                        'users_id' => $data->users_id,
                        'title' => $data->title,
                        'description' => $data->description,
                        'route' => $data->route,
                        'type' => $data->type,
                        'brand_id' => $data->brand_id,
                    ],
                    'timeout' => 5,
                ]);

                return [
                    'success' => true,
                    'message' => 'success',
                ];
            } catch (Throwable $e) {
                return [
                    'success' => false,
                    'message' => $e->getMessage(),
                ];
            }
        }
    }

    /*
     * Send trepsi request
     */
    if (!function_exists('sendTrepsiNotification')) {
        function sendTrepsiNotification(array $data)
        {
            try {
                $client = new GuzzleHttp\Client();
                $baseUrl = env('PRODUCTS_MY_BODYTECH_API_URL');

                if (empty($baseUrl)) {
                    throw new ValidationException('baseUrl required');
                }

                if (!isset($data['payload'])) {
                    throw new ValidationException('payload required');
                }

                if (!isset($data['payload']['dateEnd'])) {
                    throw new ValidationException('payload.dateEnd required');
                }

                if (!isset($data['payload']['memberId'])) {
                    throw new ValidationException('payload.memberId required');
                }

                if (!isset($data['payload']['invoiceId'])) {
                    throw new ValidationException('payload.invoiceId required');
                }

                if (!isset($data['token'])) {
                    throw new ValidationException('token required');
                }

                if (!isset($data['brandId'])) {
                    throw new ValidationException('brandId required');
                }

                $endpoint = $baseUrl . '/trepsi/update-user';

                $headers = [
                    'Authorization' => 'Bearer ' . $data['token'],
                    'Content-Type' => 'application/json',
                    'x-bodytech-organization' => 1,
                    'x-bodytech-brand' => $data['brandId'],
                ];

                $request = new Request('POST', $endpoint, $headers, json_encode($data['payload']));
                $response = $client->send($request, ['timeout' => 2]);
                $statusCode = $response->getStatusCode();

                return [
                    'success' => true,
                    'message' => 'success',
                    'payload' => $data['payload'],
                    'statusCode' => $statusCode,
                ];
            } catch (Throwable $e) {
                return [
                    'success' => false,
                    'message' => $e->getMessage(),
                ];
            }
        }
    }

    /*
     * Devuelve el acronimo de la brand
     */
    if (!function_exists('decryptt')) {
        function decryptt($key, $encodedString)
        {
            $result = '';
            $string = base64_decode($encodedString);

            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) - ord($keychar));
                $result .= $char;
            }

            return $result;
        }
    }
}
