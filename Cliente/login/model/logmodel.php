<?php

require_once 'Conexion.php'; 

class OperacionesCRUD {

    public function realizarLogin($conexion, $table=array(),$fields, $condition=array()){
        $sql = "SELECT " . implode(", ", $fields) . " FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE ";
            $conditions = array();
            foreach ($condition as $campo => $valor) {
                $conditions[] = "$campo = '$valor'";
            }
            $sql .= implode(" AND ", $conditions);
        }
        $result = $conexion->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            echo "error no encontrado"; // Devolver un array vacío si no hay resultados
        }
    }
}