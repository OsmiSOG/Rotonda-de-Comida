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
	public function getModifiableIngredientByIngredient($modifiableIngredient){
		$dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
	}

?>
