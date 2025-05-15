<?php

class Database
{
    // Dados do banco de dados (vem de config.php)
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    protected $dbh; // PDO handler
    protected $stmt; // PDO statement


    public function __construct()
    {
        // Cria o DSN (String de conexão) 
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // Lança exceções em caso de erro

        try {
            // Cria a conexão com PDO
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    // Prepara uma query SQL
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Faz o bind de parâmetros com segurança
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            // Detecta o tipo do parâmetro automaticamente
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Executa a query preparada
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Retorna todos os resultados (SELECT múltiplos)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna um único resultado (SELECT único)
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}