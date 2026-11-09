<?php
declare(strict_types=1);

namespace SkeletonPHP\Database;

use mysqli;
use mysqli_sql_exception;
use RuntimeException;
use SkeletonPHP\Config\Config;

final class Database
{
    private static ?self $instance = null;

    private ?mysqli $connection = null;

    private function __construct(array $settings = [])
    {
        $config = $settings ?: (new Config())->database();

        $host = $config['host'] ?? '127.0.0.1';
        $username = $config['username'] ?? 'root';
        $password = $config['password'] ?? '';
        $database = $config['database'] ?? 'skeletonphp';

        $this->connection = @mysqli_connect($host, $username, $password, $database);

        if ($this->connection === false || mysqli_connect_errno() !== 0) {
            throw new RuntimeException('Database connection failed: ' . mysqli_connect_error());
        }
    }

    public static function getInstance(?Config $config = null): self
    {
        if (self::$instance === null) {
            self::$instance = new self($config ? $config->database() : []);
        }

        return self::$instance;
    }

    public function connection(): mysqli
    {
        return $this->connection;
    }

    public function fetchAll(string $query, array $params = []): array
    {
        $statement = $this->prepare($query, $params);
        $result = $statement->get_result();
        $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $statement->close();

        return $rows;
    }

    public function fetchOne(string $query, array $params = []): ?array
    {
        $rows = $this->fetchAll($query, $params);
        return $rows[0] ?? null;
    }

    public function execute(string $query, array $params = []): bool
    {
        $statement = $this->prepare($query, $params);
        $success = $statement->execute();
        $statement->close();

        return $success;
    }

    public function close(): void
    {
        if ($this->connection instanceof mysqli) {
            $this->connection->close();
            $this->connection = null;
        }
    }

    private function prepare(string $query, array $params = []): \mysqli_stmt
    {
        $statement = $this->connection->prepare($query);
        if ($statement === false) {
            throw new RuntimeException('Unable to prepare query: ' . $this->connection->error);
        }

        if ($params !== []) {
            $types = '';
            $values = [];

            foreach ($params as $value) {
                if (is_int($value)) {
                    $types .= 'i';
                } elseif (is_float($value)) {
                    $types .= 'd';
                } elseif (is_string($value)) {
                    $types .= 's';
                } else {
                    $types .= 'b';
                }

                $values[] = $value;
            }

            $statement->bind_param($types, ...$values);
        }

        return $statement;
    }
}

