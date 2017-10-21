<?php
namespace App\Models;
use App\DB;
class Medico {
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($idmedico = null) {
        $where = ''; if (!empty($idmedico)) { $where = 'WHERE idmedico = :idmedico'; }
        $sql = sprintf("SELECT idmedico, nomeCompleto, crm, cpf, rg, datanascimento, naturalidade, nacionalidade, email, telefone, celular, idesp, idestado, idcidade, endereco, bairro, cep, complemento, trabalho FROM medicos %s ORDER BY nomeCompleto ASC", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);
        if (!empty($where))
        {
            $stmt->bindParam(':idmedico', $idmedico, \PDO::PARAM_INT);
        }
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
    public static function cpf($cpf) {
        $where = ''; if (!empty($cpf)) { $where = 'WHERE cpf = :cpf'; }
        $sql = sprintf("SELECT cpf FROM medicos %s ORDER BY cpf ASC", $where);
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
        $sql = sprintf("SELECT rg FROM medicos %s", $where);
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
    public static function crm($crm) {
        $where = ''; if (!empty($crm)) { $where = 'WHERE crm = :crm'; }
        $sql = sprintf("SELECT crm FROM medicos %s", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':crm', $crm, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $crm = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        if(count($crm) == 1){
            return true;
        }
        else{
            return false;
        }


    }
    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($idmedico, $nomeCompleto, $crm, $cpf, $rg, $datanascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $idesp, $idestado, $idcidade, $endereco, $bairro, $cep, $complemento, $trabalho)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO medicos
        (nomeCompleto, crm, cpf, rg, datanascimento, naturalidade, nacionalidade, 
        email, telefone, celular, idesp, idestado, idcidade, endereco, bairro, cep,
         complemento, trabalho)
         VALUES(:nomeCompleto, :crm, :cpf, :rg, :datanascimento, :naturalidade, :nacionalidade, :email, :telefone,
         :celular, :idesp, :idestado, :idcidade, :endereco, :bairro, :cep, :complemento, :trabalho)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $nomeCompleto);
        $stmt->bindParam(':crm', $crm);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':idestado', $idestado);
        $stmt->bindParam(':idesp', $idesp);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':trabalho', $trabalho);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {

            return false;
        }
    }
    /**
     * Altera no banco de dados um usuário
     */
    public static function update($idmedico, $nomeCompleto, $crm, $cpf, $rg, $datanascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $idesp, $idestado, $idcidade, $endereco, $bairro, $cep, $complemento, $trabalho)
    {
        // validação (bem simples, só pra evitar dados vazios)

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE medicos SET nomeCompleto = :nomeCompleto,crm = :crm ,cpf = :cpf, rg = :rg, datanascimento = :datanascimento, naturalidade = :naturalidade, nacionalidade = :nacionalidade, email = :email, telefone = :telefone, celular = :celular, idcidade = :idcidade,
        idestado = :idestado, idesp = :idesp, endereco = :endereco,bairro = :bairro,cep = :cep, complemento = :complemento, trabalho = :trabalho WHERE idmedico = :idmedico";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $nomeCompleto);
        $stmt->bindParam(':crm', $crm);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':idestado', $idestado);
        $stmt->bindParam(':idesp', $idesp);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':trabalho', $trabalho);
        $stmt->bindParam(':idmedico', $idmedico, \PDO::PARAM_INT);
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
    public static function remove($idmedico)
    {
        // valida o ID
        if (empty($idmedico))
        {
            echo "ID não informado";
            exit;
        }
        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM medicos WHERE idmedico = :idmedico";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':idmedico', $idmedico, \PDO::PARAM_INT);
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