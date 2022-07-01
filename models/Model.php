<?php
abstract class Model{
    private static $_db;

    private static function setDB(){
        if(empty(self::$_db)){
            try{
                self::$_db = new PDO('mysql:host=localhost;dbname=fast-image;charset=utf8', 'root', '');
                self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }catch (PDOException $error){
                echo $error->getMessage();
            }
        }
    }

    protected function getDB(){
        if(empty(self::$_db)){
            try{
                self::setDB();
            }catch (PDOException $error){
                echo $error->getMessage();
            }
        }
            return self::$_db;
    }

    protected function getAll($table, $obj){
        $var = [];

        $request = self::getDB()->prepare('SELECT * FROM ' . $table);
        $request->execute();

        while($data = $request->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }

        return $var;
        $request->closeCursor();
    }

    protected function getRow($table, $key, $value, $obj){
        $var = [];

        $request = self::getDB()->prepare("SELECT * FROM $table WHERE $key = ?");
        $request->execute([$value]);

        while($data = $request->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }

        return $var;
        $request->closeCursor();
    }

    protected function getRows($table, $key, $value, $obj){
        $var = [];

        $request = self::getDB()->prepare("SELECT * FROM $table WHERE $key = ?");
        $request->execute([$value]);

        while($data = $request->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }

        return $var;
        $request->closeCursor();
    }

    protected function delete($table, $key, $value){
        $request = self::getDB()->prepare("DELETE FROM $table WHERE $key = ?");
        $request->execute([$value]);

        $request->closeCursor();
    }

    protected function checkExist($table, $key, $value){
        $request = self::getDB()->prepare("SELECT count(*) AS exist FROM $table WHERE $key = ?");
        $request->execute([$value]);

        return $request->fetchAll();
    }

    protected function create($table, $data, $values){
        $p = '';
        $f = '';

        foreach($values as $v){
            $p .= '?,';
            $f .= $v . ', ';
        }
        $p = substr($p, 0, -1);
        $f = substr($f, 0, -2);

        $request = self::getDB()->prepare("INSERT INTO $table($f) VALUES($p)");
        $request->execute($data);

        $request->closeCursor();
    }

    protected function validate($type, $data, $error = false){
        $validation = New Validation();

        $type = ucfirst(strtolower($type));
        $method = 'check' . $type;

        return $validation->$method($data, $error);
    }

    protected function checkConnection($dest){
        if(isset($_SESSION['connect'])){
            header('Location: /' . $dest);
        }
    }

    protected function requireConnection($dest){
        if(!isset($_SESSION['connect'])){
            header('Location: /' . $dest);
        }
    }
}