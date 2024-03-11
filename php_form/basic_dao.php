<?php

require_once "config.php";

class BasicDAO{
    protected function execDLM($sql, ...$params) {
        global $dns, $user, $pass;
        $pdo = new PDO($dns, $user, $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        } finally {
            $pdo = null;
        }
    }

    protected function execQUERY($sql) {
        global $dns, $user, $pass;
        $pdo = new PDO($dns, $user, $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $objects = $stm->fetchaAll(PDO::FETCH_OBJ);
        $pdo = null;
        return $objects;
    }
}

?>