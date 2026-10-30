<?php

require_once __DIR__ . '/includes/dbcon.php';

class MySQLSessionHandler implements SessionHandlerInterface
{
    private mysqli $db;

    public function __construct(mysqli $connection)
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
            "SELECT session_data
             FROM php_sessions
             WHERE session_id = ?"
        );

        if (!$stmt) {
            error_log("Session read prepare failed: " . $this->db->error);
            return false;
        }

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($data);

        $found = $stmt->fetch();
        $stmt->close();

        return $found ? $data : '';
    }

    public function write(string $id, string $data): bool
    {
        $time = time();

        $stmt = $this->db->prepare(
            "INSERT INTO php_sessions
                (session_id, session_data, last_activity)
             VALUES (?, ?, ?)
             ON DUPLICATE KEY UPDATE
                session_data = VALUES(session_data),
                last_activity = VALUES(last_activity)"
        );

        if (!$stmt) {
            error_log("Session write prepare failed: " . $this->db->error);
            return false;
        }

        $stmt->bind_param("ssi", $id, $data, $time);

        $result = $stmt->execute();

        if (!$result) {
            error_log("Session write failed: " . $stmt->error);
        }

        $stmt->close();

        return $result;
    }

    public function destroy(string $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM php_sessions WHERE session_id = ?"
        );

        if (!$stmt) {
            error_log("Session delete prepare failed: " . $this->db->error);
            return false;
        }

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

        if (!$stmt) {
            error_log("Session cleanup prepare failed: " . $this->db->error);
            return false;
        }

        $stmt->bind_param("i", $expiry);
        $stmt->execute();

        $deleted = $stmt->affected_rows;

        $stmt->close();

        return $deleted;
    }
}

// Verify database connection
if (!isset($con) || !($con instanceof mysqli) || $con->connect_error) {
    error_log("Session database connection is unavailable.");
    die("Session database connection failed.");
}

// Register custom session handler BEFORE session_start()
$handler = new MySQLSessionHandler($con);

if (!session_set_save_handler($handler, true)) {
    error_log("Unable to register MySQL session handler.");
    die("Unable to initialize sessions.");
}
