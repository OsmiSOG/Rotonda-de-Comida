ALTER TABLE `virtual_roundabout`.`Restaurates`
RENAME TO  `virtual_roundabout`.`Restaurantes` ;

ALTER TABLE `virtual_roundabout`.`Pedidos`
DROP COLUMN `numeroPedido`,
DROP INDEX `numeroPedido_UNIQUE` ;
