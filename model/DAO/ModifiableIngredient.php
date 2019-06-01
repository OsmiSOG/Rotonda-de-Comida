<?php

require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/interfaces/InterfaceModifiableIngredient.php';
require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/transferObject/ModifiableIngredient.php';


class ModifiableIngredient implements InterfaceModifiableIngredient
{
	public function insertModifiableIngredientToMenu($modifiableIngredient){
		$dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeInsert($sql);

    return $result;
	}
	public function getModifiableIngredientByMenu($value='')
	{
		$dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
	}
	public function getModifiableIngredientByProduct($idProduct){
		$dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
	}
	public function getModifiableIngredientsByIngredient($idIngredient){
		$dataBase = new ConnectionDB();
    $sql = 'SELECT * FROM Modificables WHERE idIngrediente = :idIngrediente';
    $result = $dataBase -> executeQuery($sql, array(':idIngrediente'=>$idIngredient));
		$modifiableIngredient = null;
		if($result != false){
			$modifiableIngredients = array();
			for ($i=0; $i <count($result) ; $i++) {
				$modifiableIngredient = new ModifiableIngredient();
				$modifiableIngredient -> setIdModifiable($result[$i]['idModifiables']);
				$modifiableIngredient -> setModification($result[$i]['type']);
				$modifiableIngredient -> setName($result[$i]['ingrediente']);
				array_push($modifiableIngredients, $modifiableIngredient);
			}
		}
    return $modifiableIngredients;
	}

?>
