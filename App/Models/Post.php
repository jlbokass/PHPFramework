<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

/**
 * Post model
 *
 * PHP version 7.4
 */
class Post extends Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll(): array
    {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
