  <?php
  //agregar la conexion
  require_once "conexion.php";

  class ModeloFormularios {

    /* =================================================
    Registro
    =================================================== */
    static public function mdlRegistro($tabla, $datos) {
        #statement declarar una sentancia

        #prepare() Prepara una sentencia SQL la cual va hacer ejecutada por
        #el método PDOStatement::execute()

        #una sentencia sql
        #una sentencia sql
        $sql = "INSERT INTO $tabla(idRegistro, nombre,apPaterno,apMaterno,fechaNacimiento,direccion,
        tel_cel, cargo,password) 
        VALUES (:idRegistro, :nombre,:apPaterno,:apMaterno,
        :direccion,:tel_cel, :cargo,:password);";
        $sql = "SELECT *, date_format(fechaNecimiento,'%Y/%m/%d') as fechaNacimiento FROM 
        $tabla ORDER BY ID DESC";

        $stmt = Conexion::conectar()->prepare($sql);

        #bindParam() Vincular una variable PHP a un párametro de sustitución con nombre o signo
        $stmt->bindParam(":idRegistro", $datos["idRegistro"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apPaterno",$datos["apPaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":apMaterno",$datos["apMaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaNacimiento",$datos["fechaNacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":tel-cel",$datos["tel-cel"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo",$datos["cargo"], PDO::PARAM_STR);

      
        //Ejecutar la sentencia sql y validarla
        if ($stmt->execute()){
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }

    
    /* =================================================
    Seleccionar registros
    =================================================== */
    static public function mdlSeccionarRegistros($tabla,$item,$valor){
      //consulta general
      if($item == null && $valor == null){
        $sql = "SELECT * FROM $tabla ORDER BY idRegistro DESC";
        
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();  #fetchAll regresa todos los registro
      } else {
        //prepara la consulta
        $sql = "SELECT * FROM $tabla WHERE $item=:$item ORDER BY idRegistro DESC";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();     #fetch regresa un solo registro 
      }
    }


    /* =================================================
    =================================================== */
    static public function mdlActualizarRegistro($tabla, $datos){

      $sql = "UPDATE $tabla SET idRegistro=:idRegistro, nombre=:nombre,
              direccion=:direccion, tel_cel=:tel_cel, password=:password   
              WHERE id=:id";
      //sentencia
      $stmt = Conexion::conectar()->prepare($sql);
      //parámetros
      $stmt->bindParam(":idRegistro", $datos["idRegistro"], PDO::PARAM_STR);
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
      $stmt->bindParam(":tel_cel", $datos["tel_cel"],PDO::PARAM_STR);
      $stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
      $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

      //actualizar el registro
      if($stmt->execute()){
        return "ok";
      } else {
        //se cambia al subirlo a producción
        print_r(Conexion::conectar()->errorInfo());
      }

      $stmt = null;
    }
    /* =================================================
    Actualizar registro
    =================================================== */
    static public function mdlEliminarRegistro($tabla,$valor){
      //crear consulta
      $sql = "DELETE FROM $tabla WHERE id=:id";
      //crear la sentencia
      $stmt = Conexion::conectar()->prepare($sql);

      $stmt->bindParam(":id",$valor,PDO::PARAM_INT);

      //ejecutar y validar la eliminación
      if($stmt->execute()){
        return "ok";
      } else {
        //esto se elimina al salir a producción
        print_r(Conexion::conectar()->errorInfo());
      }

      //eliminar el objeto
      $stmt = null;
    }

  }