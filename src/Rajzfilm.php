<?php
namespace Petrik\Rajzfilmek;

use Exception;

class Rajzfilm{
    public $id;
    public $cim;
    public $hossz;
    public $kiadasi_ev;

    public function setAttributes(array $attr) {
        $this->id = $attr['id'] ?? $this->id;
        $this->cim = $attr['cim'] ?? $this->cim;
        $this->hossz = $attr['hossz'] ?? $this->hossz;
        $this->kiadasi_ev = $attr['kiadasi_ev'] ?? $this->kiadasi_ev;
    }
    public static function osszes():array{
        global $db;
        $result = $db->query('SELECT * FROM rajzfilmek ORDER BY kiadasi_ev');
        $rajzfilmtomb=[];
        foreach($result as $row){
            $rajzfilmtomb = new Rajzfilm();
            $rajzfilmtomb ->setAttributes($row);
            $rajzfilmek[] = $rajzfilmtomb;
        }
        return $rajzfilmek;
    }
    public function uj() {
        global $db;
        $insert = $db->prepare('INSERT INTO rajzfilmek (cim, hossz, kiadasi_ev) VALUES (:cim, :hossz,:kiadasi_ev)');
        $insert->execute([':cim'=>$this->cim, ':hossz'=>$this->hossz, ':kiadasi_ev' =>$this->kiadasi_ev]);
        $this->id = $db->lastInsertId();
    }
    public static function getById(int $id) : ?Rajzfilm {
        global $db;
        $select = $db->prepare('SELECT * FROM rajzfilmek WHERE id = :id');
        $select->execute([':id' => $id]);
        if ($select->rowCount() !== 1) {
            return null;
        }
        $rajzfilm = new Rajzfilm();
        $rajzfilm->setAttributes($select->fetchAll()[0]);
        //$rajzfilm->setAttributes($select->fetch(\PDO::FETCH_ASSOC));
       return $rajzfilm;
    }
    public function torles(){
        global $db;
        if ($this->id == null) {
            throw new Exception("Null idt nem lehet torolni");
        }
        else{
            $delete = $db->prepare('DELETE FROM rajzfilmek WHERE id = :id');
            $delete->execute([':id' => $this->id]);
            if ($delete->rowCount() !== 1) {
                throw new Exception("Nincs ilyen id!");
            }
        }
    }
}