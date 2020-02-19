<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceModifiableIngredient.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/ModifiableIngredient.php';


class ModifiableManagement implements InterfaceModifiableIngredient
{
	public function insertModifiableIngredientToIngredient($modifiableIngredient, $idIngredient){
		$dataBase = new ConnectionDB();
    $sql = 'INSERT INTO Modificables (idModificables, type, ingrediente, idIngrediente) VALUES (null, :type, :ingrediente, :idIngrediente)';
    $result = $dataBase -> executeInsert($sql, array(
			':type'=>$modifiableIngredient->getModification(),
			':ingrediente'=>$modifiableIngredient->getName(),
			':idIngrediente'=>$idIngredient
		));

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
	public function getModifiableIngredientByIngredient($idIngredient){
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
}
?>
