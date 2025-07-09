<?php
class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct($config)
    {
        try {
            //Obtenemos la configuración de la base de datos desde config/config.php
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
            $this->pdo = new PDO($dsn, $config['user'], $config['password']);
            // Configura PDO para que lance excepciones en errores
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En producción no muestres detalles del error
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    // Devuelve la instancia única (singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../config/config.php';
            self::$instance = new self($config['db']);
        }
        return self::$instance;
    }

    // Devuelve el objeto PDO para usar en consultas
    public function getConnection()
    {
        return $this->pdo;
    }
}
