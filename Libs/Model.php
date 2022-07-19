<?php
class Model
{
    public $conexion;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->conexion = $conexion->getConeccion();
    }
    public function listCategories(){
        $sql = "SELECT categoria_title , imagen FROM `category`";
        
        $stm = $this->conexion->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();
       return $resultado;
    }
   
    public function listAllExercices(){
        $sql = "SELECT exercice_name, description, img_path,pdf_path FROM exercices;";
        
        $stm = $this->conexion->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();
       return $resultado;
    }
   public function listExercice($id){
        $sql = "SELECT exe.exercice_name, exe.description, exe.img_path, exe.pdf_path FROM exercices exe JOIN category cat ON cat.id_category = exe.id_category WHERE cat.id_category = :id;";        
        $stm = $this->conexion->prepare($sql);
        $stm->bindParam(":id" , $id);
        $stm->execute();
        $resultado = $stm->fetchAll();
       return $resultado;
    }
}
