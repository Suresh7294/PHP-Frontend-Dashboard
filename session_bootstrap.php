<?php

require_once __DIR__ . '/includes/dbcon.php';

class MySQLSessionHandler implements SessionHandlerInterface
{
    private $db;

    public function __construct($connection)
    {
        $this->db = $connection;
    }

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read(string $id): string|false
    {
        $stmt = $this->db->prepare(
            "SELECT session_data FROM php_sessions WHERE session_id = ?"
        );

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($data);

        $result = $stmt->fetch();
        $stmt->close();

        return $result ? $data : '';
    }

    public function write(string $id, string $data): bool
    {
        $time = time();

        $stmt = $this->db->prepare(
            "INSERT INTO php_sessions (session_id, session_data, last_activity)
             VALUES (?, ?, ?)
             ON DUPLICATE KEY UPDATE
             session_data = VALUES(session_data),
             last_activity = VALUES(last_activity)"
        );

        $stmt->bind_param("ssi", $id, $data, $time);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function destroy(string $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM php_sessions WHERE session_id = ?"
        );

        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function gc(int $max_lifetime): int|false
    {
        $expiry = time() - $max_lifetime;

        $stmt = $this->db->prepare(
            "DELETE FROM php_sessions WHERE last_activity < ?"
        );

        $stmt->bind_param("i", $expiry);
        $stmt->execute();

        $deleted = $stmt->affected_rows;
        $stmt->close();

        return $deleted;
    }
}

$handler = new MySQLSessionHandler($con);

session_set_save_handler($handler, true);
