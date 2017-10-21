<?php
namespace App\Models;
use App\DB;
class User {
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function select($user, $password) {
        session_start();

        $sql = sprintf("SELECT * FROM users WHERE user = '$user' AND password = '$password'") or die("erro ao selecionar");
        $DB = new DB; $stmt = $DB->prepare($sql);

        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($users) == 1){
            $_SESSION['login'] = $user;
            $_SESSION['senha'] = $password;


        }
        else{

            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);

            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/';</script>";
            die();
        }
    }
    public static function email($user) {
        $where = ''; if (!empty($user)) { $where = 'WHERE user = :user'; }
        $sql = sprintf("SELECT email FROM users %s", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':user', $user, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $email = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        if(count($email) == 1){
            return true;
        }
        else{
            return false;
        }


    }
    public static function save($user, $password)
    {
        // validação (bem simples, só pra evitar dados vazios)

        $senha = md5($password);
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO users
        (nome,email, password, role)
         VALUES(:user, :password)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);

        $stmt->bindParam(':password', $senha);


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
}