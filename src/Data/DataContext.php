<?php
namespace App\Data;

use App\Models\Libro;
use mysqli;

class DataContext
{
    static $mysqli;
    private array $settings;

    function __construct(array $settings)
    {
      $this->settings = $settings;
      self::conectar();   
    }
    function __destruct()
    {
        self::$mysqli->close();
    }
    protected function conectar()
    {
        //esta funcion es la q realiza la conexion al servidor mysql
        self::$mysqli = new mysqli(
            $this->settings['db']['host'],
            $this->settings['db']['username'],
            $this->settings['db']['password'],
            $this->settings['db']['database'],
        );
        // en  caso de error mandamos a imprimir a la pantalla 
        if (self::$mysqli->connect_error){
            die('error de conexion ('.self::$mysqli->connect_errno.')' . self::$mysqli->connect_error);
        }
    }
    public function obten_libros()
    {
        //obtenemos todos los editoriales 
        $consulta ='SELECT libro.id, libro.nombre, libro.precio, editorial.nombre AS editorial_nombre
        FROM editorial INNER JOIN libro ON editorial.id=libro.id_editoral';
        //creamos la consulta
        $sentencia = self::$mysqli->prepare($consulta);
        /* ejecutar la <sentencia*/
        $sentencia->excute();
        //aqui queda el resultado
        $resultado = $sentencia->get_result();
        $sentencia->close();

        $libros = [];
        while ($fila = $resultado->fetch_assoc()):
        $item = new Libro($fila["id"], $fila["nombre"], $fila["precio"], $fila["editorial_nombre "]);
        $libros[] =$item->jsonSerialize();
        endwhile;

  return $libros; 
    }
}