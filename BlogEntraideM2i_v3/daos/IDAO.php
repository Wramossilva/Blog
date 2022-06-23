<?php

/*
  IDAO.php
 */

/**
 *
 * @author Pascal
 */
interface IDAO {

    public static function selectAll(PDO $pdo): array;

    public static function selectOne(PDO $pdo, int $id): object;

    public static function delete(PDO $pdo, object $objet): int;

    public static function insert(PDO $pdo, object $objet): int;

    public static function update(PDO $pdo, object $objet): int;
}
?>