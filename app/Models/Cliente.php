<?php
namespace App\Models;
use App\DB;
class Cliente {
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($idclient = null) {
        $where = ''; if (!empty($idclient)) { $where = 'WHERE idclient = :idclient'; }
        $sql = sprintf("SELECT idclient, nome, cpf, rg, datanascimento, naturalidade, nacionalidade, email, telefone, celular, idcidade, cep, complemento, nomePai, nomeMae, tipoSangue FROM clients %s ORDER BY nome ASC", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);
        if (!empty($where))
        {
            $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);
        }
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
    public static function cpf($cpf) {
        $where = ''; if (!empty($cpf)) { $where = 'WHERE cpf = :cpf'; }
        $sql = sprintf("SELECT cpf FROM clients %s ORDER BY cpf ASC", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':cpf', $cpf, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $cpf = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(count($cpf) == 1){
            return true;
        }
        else{
            return false;
        }


    }
    public static function rg($rg) {
        $where = ''; if (!empty($rg)) { $where = 'WHERE rg = :rg'; }
        $sql = sprintf("SELECT rg FROM clients %s", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':rg', $rg, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $rg = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        if(count($rg) == 1){
            return true;
        }
        else{
            return false;
        }


    }
    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($nome, $cpf, $rg, $datanascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade, $cep, $complemento, $nomePai, $nomeMae, $tipoSangue)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO clients
        (nome, cpf, rg, datanascimento, naturalidade,
        nacionalidade, email, telefone, celular, idcidade,
         cep, complemento, nomePai, nomeMae, tipoSangue)
         VALUES(:nome, :cpf, :rg, :datanascimento, :naturalidade,
           :nacionalidade, :email, :telefone, :celular,
           :idcidade, :cep, :complemento, :nomePai, :nomeMae, :tipoSangue)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':nomePai', $nomePai);
        $stmt->bindParam(':nomeMae', $nomeMae);
        $stmt->bindParam(':tipoSangue', $tipoSangue);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }
    /**
     * Altera no banco de dados um usuário
     */
    public static function update($idclient,$nome, $cpf, $rg,
                                  $datanascimento, $naturalidade, $nacionalidade, $email, $telefone,
                                  $celular, $idcidade, $cep, $complemento, $nomePai, $nomeMae, $tipoSangue)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE clients SET nome = :nome, cpf = :cpf, rg = :rg, datanascimento = :datanascimento, naturalidade = :naturalidade, nacionalidade = :nacionalidade, email = :email, telefone = :telefone, celular = :celular, idcidade = :idcidade,
         cep = :cep, complemento = :complemento, nomePai = :nomePai, nomeMae = :nomeMae, tipoSangue = :tipoSangue WHERE idclient = :idclient";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':nomePai', $nomePai);
        $stmt->bindParam(':nomeMae', $nomeMae);
        $stmt->bindParam(':tipoSangue', $tipoSangue);
        $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }
    public static function remove($idclient)
    {
        // valida o ID
        if (empty($idclient))
        {
            echo "ID não informado";
            exit;
        }
        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM clients WHERE idclient = :idclient";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}