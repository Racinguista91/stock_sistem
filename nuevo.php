<?php
#Verificar
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["categoria"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencia"])) exit();

#Si esta todo, pasa a este paso

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$categoria = $_POST["categoria"];
$precioVenta = $_POST["precioVenta"];
$precioCompra = $_POST["precioCompra"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, descripcion, categoria, precioVenta, precioCompra, existencia) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $categoria, $precioVenta, $precioCompra, $existencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>