<?php

class Master
{
    /**
     * Obtener todos los datos JSON
     */
    function get_all_data()
    {
        $json = (array) json_decode(file_get_contents('data.json'));
        $data = [];
        foreach ($json as $row) {
            $data[$row->id] = $row;
        }
        return $data;
    }

    /**
     * Obtener datos JSON únicos
     */
    function get_data($id = '')
    {
        if (!empty($id)) {
            $data = $this->get_all_data();
            if (isset($data[$id])) {
                return $data[$id];
            }
        }
        return (object) [];
    }

    /**
     * Insertar datos en un archivo JSON
     */
    function insert_to_json()
    {
        $id = $_POST['id'];
        $nombre = addslashes($_POST['nombre']);
        $email = addslashes($_POST['email']);
        $domicilio = addslashes($_POST['domicilio']);
        $telefono = addslashes($_POST['telefono']);
        $movil = addslashes($_POST['movil']);
        $nombre_familiar = addslashes($_POST['nombre_familiar']);
        $email_familiar = addslashes($_POST['email_familiar']);
        $parentezco = addslashes($_POST['parentezco']);
        $enfermedad = addslashes($_POST['enfermedad']);
        $tiempo = addslashes($_POST['tiempo']);
        $detalles = addslashes($_POST['detalles']);
        $fechas = addslashes($_POST['fechas']);
        $centro_medico = addslashes($_POST['centro_medico']);
        $diagnostico = addslashes($_POST['diagnostico']);

        $data = $this->get_all_data();
        $id = array_key_last($data) + 1;
        $data[$id] = (object) [
            "id" => $id,
            "nombre" => $nombre,
            "email" => $email,
            "domicilio" => $domicilio,
            "telefono" => $telefono,
            "movil" => $movil,
            "nombre_familiar" => $nombre_familiar,
            "email_familiar" => $email_familiar,
            "parentezco" => $parentezco,
            "enfermedad" => $enfermedad,
            "tiempo" => $tiempo,
            "detalles" => $detalles,
            "fechas" => $fechas,
            "centro_medico" => $centro_medico,
            "diagnostico" => $diagnostico
        ];
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        $insert = file_put_contents('data.json', $json);
        if ($insert) {
            $resp['status'] = 'success';
        } else {
            $resp['failed'] = 'failed';
        }
        return $resp;
    }
    /**
     * Actualizar datos del archivo JSON
     */
    function update_json_data()
    {
        $id = $_POST['id'];
        $nombre = addslashes($_POST['nombre']);
        $email = addslashes($_POST['email']);
        $domicilio = addslashes($_POST['domicilio']);
        $telefono = addslashes($_POST['telefono']);
        $movil = addslashes($_POST['movil']);
        $nombre_familiar = addslashes($_POST['nombre_familiar']);
        $email_familiar = addslashes($_POST['email_familiar']);
        $parentezco = addslashes($_POST['parentezco']);
        $enfermedad = addslashes($_POST['enfermedad']);
        $tiempo = addslashes($_POST['tiempo']);
        $detalles = addslashes($_POST['detalles']);
        $fechas = addslashes($_POST['fechas']);
        $centro_medico = addslashes($_POST['centro_medico']);
        $diagnostico = addslashes($_POST['diagnostico']);
        $data = $this->get_all_data();
        $data[$id] = (object) [
            "id" => $id,
            "nombre" => $nombre,
            "email" => $email,
            "domicilio" => $domicilio,
            "telefono" => $telefono,
            "movil" => $movil,
            "nombre_familiar" => $nombre_familiar,
            "email_familiar" => $email_familiar,
            "parentezco" => $parentezco,
            "enfermedad" => $enfermedad,
            "tiempo" => $tiempo,
            "detalles" => $detalles,
            "fechas" => $fechas,
            "centro_medico" => $centro_medico,
            "diagnostico" => $diagnostico
        ];
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        $update = file_put_contents('data.json', $json);
        if ($update) {
            $resp['status'] = 'success';
        } else {
            $resp['failed'] = 'failed';
        }
        return $resp;
    }

    /**
     * Eliminar datos del archivo JSON
     */

    function delete_data($id = '')
    {
        if (empty($id)) {
            $resp['status'] = 'failed';
            $resp['error'] = 'El ID de miembro dado está vacío.';
        } else {
            $data = $this->get_all_data();
            if (isset($data[$id])) {
                unset($data[$id]);
                $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
                $update = file_put_contents('data.json', $json);
                if ($update) {
                    $resp['status'] = 'success';
                } else {
                    $resp['failed'] = 'failed';
                }
            } else {
                $resp['status'] = 'failed';
                $resp['error'] = 'El ID de miembro dado no existe en el archivo JSON.';
            }
        }
        return $resp;
    }
}