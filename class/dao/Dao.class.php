<?php

require_once(__DIR__ . "/../../etc/conf.php");

// Classe pai executar as queries na conexão com BD
 class Dao {
    // Nome da tabela usada
    private $tablename;
    // Nomes do campos
    private $fields;
    // Nomes dos valores (para buscar ou para inserir)
    private $values;
    // Complemento da query, como "WHERE" ou "HAVING"
    private $complement;

    // Construtor para setar os atributos para valores iniciais
    function __construct($tablename, $fields, $values = array(), $complement = "") {
        $this->setTablename($tablename);
        $this->setFields($fields);
        $this->setValues($values);
        $this->setComplement($complement);
    }

    // Query para inserir novo registro no BD
    function createQuery() {
        // Transforma o array de campos para string
        $fieldsToString = implode(", ", $this->getFields());
        // Transforma o array de valores para string
        $valuesToString = $this->getValuesToString();
        // Retorna a query em string
        return "INSERT INTO " . $this->getTablename() . " ($fieldsToString) VALUES ($valuesToString)";
    }

    // Query para buscar registros no BD
    function readQuery($fields = array()) {
        // Verifica se há campos para serem buscados
        if (count($fields) > 0) {
            // Transforma o array de campos para string
            $fieldsToString = implode(", ", $fields);
        }
        // Retorna a query em string
        return "SELECT " . (isset($fieldsToString) ? "($fieldsToString)" : "*") . " FROM " . $this->getTablename() . " " . $this->getComplement();
    }

    // Query para atualizar registros no BD
    function updateQuery($fields = array(), $values = array()) {
        // Verifica se há restrição de campo
        if (count($fields) == 0) {
            $fields = $this->getFields();
        }
        // Verifica se há restrição de valor
        if (count($values) == 0) {
            $values = $this->getValues();
        }
        // Verifica se a quantidade de campos é a mesma de valores
        if (count($fields) != count($values)) {
            // Retorna nada caso não seja
            return "";
        }
        // Inicia a variável de field = value para string
        $fieldAndValueToString = "";
        // Percorre todos os campos
        for ($i = 0; $i < count($fields); $i++) {
            $field = $fields[$i];
            $value = $values[$i];
            $fieldAndValueToString .= ($i > 0 ? ", " : "") . "$field = " . (isset($value) ? is_string($value) ? "\"$value\"" : $value : "NULL");
        }
        // Retorna a query em string
        return "UPDATE " . $this->getTablename() . " SET $fieldAndValueToString " . $this->getComplement();
    }

    // Query para excluir feedback no BD
    function deleteQuery() {
        // Retorna a query em string
        return "DELETE FROM " . $this->getTablename() . " " . $this->getComplement();
    }

    // Transforma os valores para string, mantendo o NULL por padrão
    function getValuesToString($keepNull = TRUE) {
        // Inicializa o retorno em string
        $response = "";
        // Percorre cada valor
        for ($i = 0; $i < count($this->getValues()); $i++) {
            // Pega o valor atual
            $value = $this->getValues()[$i];
            // Verifica se o valor é diferente de NULL ou se não há keepNull
            if (isset($value) || !$keepNull) {
                // Verifica se o valor deve ter aspas
                if (is_string($value)) {
                    // Acrescenta o valor com aspas ao retorno
                    $response .= ($i > 0 ? ", " : "") . "\"$value\"";
                } else {
                    // Acrescenta o valor sem aspas ao retorno
                    $response .= ($i > 0 ? ", " : "") . "$value";
                }
            } else {
                // Acrescenta o valor ao retorno mantendo o NULL
                $response .= ($i > 0 ? ", " : "") . "NULL";
            }
        }
        // Retorna a string obtida a partir do array
        return $response;
    }

    // Getters e setters
    function getTablename() {
        return $this->tablename;
    }
    // Não pode ser alterado de fora da classe
    protected function setTablename($tablename) {
        $this->tablename = $tablename;
    }
    function getFields() {
        return $this->fields;
    }
    // Não pode ser alterado de fora da classe
    protected function setFields($fields) {
        $this->fields = $fields;
    }
    function getValues() {
        return $this->values;
    }
    function setValues($values) {
        $this->values = $values;
    }
    function getComplement() {
        return $this->complement;
    }
    function setComplement($complement) {
        $this->complement = $complement;
    }
}

?>