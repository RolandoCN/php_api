<?php
  include "api.php";
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, X-PINGOTHER , Content-Range, Content-Disposition, Content-Description');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Max-Age: 1000');
    header('Connection: Keep-Alive');

    //ini_set('display_errors', 1);
 //error_reporting(E_ALL);

  

    $postjson = json_decode(file_get_contents('php://input'), true);

    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='login'){
        //     $usuario=$postjson['usuario'];
        //     $contrasenia=$postjson['contrasenia'];
        // // Consulta SQL
        //    $sql = "SELECT id, usuario, contrasenia FROM usuario where usuario='$usuario' and contrasenia ='$contrasenia'"; // Ajusta la consulta según tu tabla

            $sql = "SELECT id, usuario, contrasenia FROM usuario";
            
            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            
            // Obtener resultados
            $resultados = $stmt->fetchAll();
            $data=array();
            if ($resultados) {
                // Mostrar resultados
                foreach ($resultados as $fila) {
                    
                    $data[] = array(
                        'id'   =>  $fila["id"],
                        'usuario'   =>  $fila["usuario"],
                        'contrasenia'   =>  $fila["contrasenia"],
            
                    );
                }

                 $result = json_encode(array('error'=>false,'result'=>$data, 'msg'=>'Datos correcots'));
                

               
            } else $result = json_encode(array('error'=>true, 'msg'=>'Usuario no existe'));
            echo $result;

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }

    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='lista'){
            //$usuario=$postjson['usuario'];
            //$contrasenia=$postjson['contrasenia'];
        // Consulta SQL
           // $sql = "SELECT id, usuario, contrasenia FROM usuario where usuario='$usuario' and contrasenia ='$contrasenia'"; // Ajusta la consulta según tu tabla

           $sql = "SELECT id, usuario, contrasenia FROM usuario where estado='A'";
            
            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            
            // Obtener resultados
            $resultados = $stmt->fetchAll();
            $data=array();
            if ($resultados) {
                // Mostrar resultados
                foreach ($resultados as $fila) {
                    
                    $data[] = array(
                        'id'   =>  $fila["id"],
                        'usuario'   =>  $fila["usuario"],
                        'contrasenia'   =>  $fila["contrasenia"],
            
                    );
                }

                 $result = json_encode(array('error'=>false,'result'=>$data, 'msg'=>'Datos correcots'));
                

               
            } else $result = json_encode(array('error'=>true, 'msg'=>'Usuario no existe'));
            echo $result;

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }

    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='detalle'){
            $id=$postjson['id'];
           
           $sql = "SELECT id, usuario, contrasenia FROM usuario where id=$id ";
            
            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            
            // Obtener resultados
            $resultados = $stmt->fetchAll();
            $data=array();
            if ($resultados) {
                // Mostrar resultados
                foreach ($resultados as $fila) {
                    
                    $data[] = array(
                        'id'   =>  $fila["id"],
                        'usuario'   =>  $fila["usuario"],
                        'contrasenia'   =>  $fila["contrasenia"],
            
                    );
                }

                 $result = json_encode(array('error'=>false,'result'=>$data, 'msg'=>'Datos correcots'));
                

               
            } else $result = json_encode(array('error'=>true, 'msg'=>'Usuario no existe'));
            echo $result;

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }

    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='guardar'){
            
           // Recuperar y validar los datos
            $usuario =trim($postjson['usuario']);
            $contrasenia =trim($postjson['contrasenia']) ;


            if($usuario=='null' || $contrasenia=='null')
            {
              echo $result = json_encode(array('error'=>true, 'msg'=>'Complete todod los campos'));
            }else
            {
        // Consulta SQL
                $sql = "INSERT INTO usuario (usuario, contrasenia, estado) VALUES ('$usuario', '$contrasenia', 'A') "; // Ajusta la consulta según tu tabla
                
                // Preparar y ejecutar la consulta
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                
                // Obtener resultados
            
                if ($stmt) {
                    // Mostrar resultados

                    $result = json_encode(array('error'=>false, 'msg'=>'Datos grabados'));
                    

                
                } else $result = json_encode(array('error'=>true, 'msg'=>'Error al grabar'));
                echo $result;
            } 

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }


    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='editar'){
            $id=$postjson['id'];
            $usuario=$postjson['usuario'];
            $contrasenia=$postjson['contrasenia'];
        // Consulta SQL
            $sql = "UPDATE usuario SET usuario='$usuario', contrasenia='$contrasenia' 
            WHERE id= $id"; // Ajusta la consulta según tu tabla
            
            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            
            // Obtener resultados
           
            if ($stmt) {
                // Mostrar resultados

                 $result = json_encode(array('error'=>false, 'msg'=>'Datos actualizados'));
                

               
            } else $result = json_encode(array('error'=>true, 'msg'=>'Error al actualizar'));
            echo $result;

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }

    if(isset($postjson['consulta'])){
        if($postjson['consulta']=='eliminar'){
            $id=$postjson['id'];
            // $estado=$postjson['estado'];
           
        // Consulta SQL
            $sql = "UPDATE usuario SET estado='I'
            WHERE id= $id"; // Ajusta la consulta según tu tabla
            
            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            
            // Obtener resultados
           
            if ($stmt) {
                // Mostrar resultados

                 $result = json_encode(array('error'=>false, 'msg'=>'Datos eliminado exitosamente'));
                

               
            } else $result = json_encode(array('error'=>true, 'msg'=>'Error al actualizar'));
            echo $result;

            //$result = json_encode(array('success'=>true,'result'=>$data));
            //echo $result;
        }  
    }


?>