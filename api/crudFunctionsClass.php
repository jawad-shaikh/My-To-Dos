<?php

class CrudFunctions
{

    public static function insertQuery($table_name, $post_data)
    {
        $partial_query_only_keys = "";
        $partial_query_only_values = "";

        foreach ($post_data as $key => $value) {
            $partial_query_only_keys .=  $key . ',';
            $partial_query_only_values .=  "'$value'" . ',';
        }

        $partial_query_only_keys = rtrim($partial_query_only_keys, ',');
        $partial_query_only_values = rtrim($partial_query_only_values, ',');

        return "INSERT INTO $table_name($partial_query_only_keys) VALUES($partial_query_only_values)";
    }

    public static function selectQuery($table_name, ...$colums)
    {
        $partial_query = "";
        $columNames = [...$colums];
        foreach ($columNames as $value) {
            $partial_query .=  $value . ', ';
        }

        $partial_query = rtrim($partial_query, ', ');
        return "SELECT $partial_query FROM $table_name";
    }

    public static function updateQuery($table_name, $post_data, $id)
    {
        $partial_query = "";

        $keys = array_keys($post_data);

        while (!empty($keys)) {
            $key = array_pop($keys);
            $partial_query .=  $key . ' = "' . $post_data[$key] . '",';
        };

        $partial_query = rtrim($partial_query, ',');

        return "UPDATE $table_name SET $partial_query WHERE id = $id";
    }

    public static function deleteQuery($table_name, $id)
    {
        return "DELETE FROM $table_name WHERE id = $id";
    }
}
