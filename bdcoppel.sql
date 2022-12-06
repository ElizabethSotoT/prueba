-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-12-2022 a las 18:21:25
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcoppel`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `articulo_act` (IN `_skubf` INT(6), IN `_sku` INT(6), IN `_articulo` VARCHAR(15), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(20), IN `_iddepartamento` INT(1), IN `_idclase` INT(2), IN `_nombreclase` VARCHAR(30), IN `_idfamilia` INT(3), IN `_nombrefamilia` VARCHAR(30), IN `_stock` INT(9), IN `_cantidad` INT(9), IN `_descontinuado` INT(1), IN `_fechabaja` DATE)   BEGIN 
	UPDATE articulos set
    	 sku = _sku, 
         articulo = _articulo, 
         marca = _marca, 
         modelo = _modelo, 
         id_departamento = _iddepartamento, 
         id_clase = _idclase,
         nombre_clase = _nombreclase, 
         id_familia = _idfamilia, 
         nombre_familia= _nombrefamilia, 
         stock = _stock, 
         cantidad = _cantidad, 
         descontinuado = _descontinuado, 
         fecha_baja = _fechabaja where sku = _skubf;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `articulo_alta` (IN `_sku` INT(6), IN `_articulo` VARCHAR(15), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(20), IN `_iddepartamento` INT(1), IN `_idclase` INT(2), IN `_nombreclase` VARCHAR(30), IN `_idfamilia` INT(3), IN `_nombrefamilia` VARCHAR(30), IN `_stock` INT(9), IN `_cantidad` INT(9))   BEGIN 
    	INSERT into articulos 
        (sku, 
         articulo, 
         marca, 
         modelo, 
         id_departamento, 
         id_clase,
         nombre_clase, 
         id_familia, 
         nombre_familia, 
         fecha_alta, 
         stock, 
         cantidad, 
         descontinuado, 
         fecha_baja) 
         values 
         (_sku,
          _articulo, 
          _marca, 
          _modelo,
          _iddepartamento, 
          _idclase, 
          _nombreclase, 
          _idfamilia, 
          _nombrefamilia, 
          CURRENT_DATE(), 
          _stock, 
          _cantidad, 
          '0', 
           '1900-01-01');
    End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `articulo_consulta` ()   BEGIN 
    	select a.sku, a.articulo, a.marca, a.modelo, a.id_departamento, d.nombre as nombre_dep, a.id_clase, a.nombre_clase, a.id_familia, a.nombre_familia, a.fecha_alta, a.stock, a.cantidad, a.descontinuado, a.fecha_baja from articulos a INNER JOIN departamentos d on a.id_departamento = d.id order by sku;
    End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `articulo_eliminar` (IN `_sku` INT(6))   BEGIN 
    DELETE FROM articulos WHERE sku = _sku;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clase_act` (IN `_idbf` INT(2), IN `_idnew` INT(2), IN `_nombre` VARCHAR(30), IN `_nombrebf` VARCHAR(30), IN `_iddep` INT(3))   BEGIN 
    UPDATE clases set id = _idnew, nombre = _nombre where id = _idbf and nombre = _nombrebf;
    UPDATE clase_departamento set id_departamento = _iddep where id_clase = _idnew and nombre_clase = _nombre;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clase_alta` (IN `_numero` INT(2), IN `_nombre` VARCHAR(30), IN `_idep` INT(1))   BEGIN
    INSERT INTO clases (id, nombre) VALUES (_numero, _nombre);
    INSERT INTO clase_departamento (id_clase, nombre_clase, id_departamento) VALUES (_numero, _nombre, _idep);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clase_eliminar` (IN `_id` INT(2), IN `_nombre` VARCHAR(30))   BEGIN
    DELETE f from familias f 
    inner join clase_familia cf on f.id = cf.id_familia and f.nombre = cf.nombre_familia 
    where cf.id_clase = _id and cf.nombre_clase = _nombre;
    DELETE FROM clases WHERE id = _id and nombre = _nombre;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clase_index` ()   BEGIN
    SELECT c.id_clase, c.nombre_clase, c.id_departamento, d.nombre FROM clase_departamento c INNER JOIN departamentos d WHERE c.id_departamento = d.id ORDER BY c.id_clase; 
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dep_act` (IN `_idanterior` INT(1), IN `_idnuevo` INT(1), IN `_nombre` VARCHAR(30))   BEGIN	
    	UPDATE departamentos set id =_idnuevo, nombre = _nombre WHERE id =_idanterior;
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dep_alta` (IN `_nombre` VARCHAR(30))   BEGIN
    INSERT into departamentos (nombre) VALUES (_nombre);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dep_eliminar` (IN `_id` INT(1))   BEGIN
  	DELETE f from familias f 
	inner join clase_familia cf on f.id = cf.id_familia and f.nombre = cf.nombre_familia
	inner join clases c on c.id = cf.id_clase and c.nombre = cf.nombre_clase
	inner join clase_departamento cd on c.id = cd.id_clase and c.nombre = cd.nombre_clase
	where cd.id_departamento = _id;
    DELETE c FROM clases c INNER JOIN clase_departamento cd on c.id = cd.id_clase and c.nombre = cd.nombre_clase WHERE 				cd.id_departamento = _id;
	DELETE FROM departamentos WHERE id = _id;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dep_index` ()   BEGIN 
SELECT * FROM departamentos;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `familia_act` (IN `_idbf` INT(3), IN `_numero` INT(3), IN `_nombre` VARCHAR(30), IN `_nombrebf` VARCHAR(30), IN `_idclase` INT(2), IN `_nombre_clase` VARCHAR(30))   BEGIN
   		UPDATE familias set id = _numero, nombre = _nombre where id = _idbf and nombre = _nombrebf;
        UPDATE clase_familia set id_clase = _idclase, nombre_clase = _nombre_clase where id_familia = _numero and nombre_familia = _nombre;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `familia_alta` (IN `_number` INT(3), IN `_nombre` VARCHAR(30), IN `_idclase` INT(2), IN `_nombre_clase` VARCHAR(30))   BEGIN
    INSERT INTO familias (id, nombre) VALUES (_number, _nombre);
    INSERT INTO clase_familia (`id_clase`, `nombre_clase`, `id_familia`, `nombre_familia`) VALUES (_idclase, _nombre_clase, _number, _nombre);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `familia_eliminar` (IN `_id` INT(3), IN `_nombre` VARCHAR(30))   BEGIN
    delete from familias where id=_id and nombre=_nombre;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `familia_index` ()   BEGIN 
SELECT * from clase_familia ORDER by id_familia;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `sku` int(6) NOT NULL,
  `articulo` varchar(15) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_departamento` int(1) DEFAULT NULL,
  `id_clase` int(2) DEFAULT NULL,
  `nombre_clase` varchar(30) DEFAULT NULL,
  `id_familia` int(3) DEFAULT NULL,
  `nombre_familia` varchar(30) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `stock` int(9) DEFAULT NULL,
  `cantidad` int(9) DEFAULT NULL,
  `descontinuado` int(1) DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_departamento`
--

CREATE TABLE `clase_departamento` (
  `id` int(11) NOT NULL,
  `id_clase` int(2) DEFAULT NULL,
  `nombre_clase` varchar(30) DEFAULT NULL,
  `id_departamento` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_familia`
--

CREATE TABLE `clase_familia` (
  `id` int(11) NOT NULL,
  `id_clase` int(2) NOT NULL,
  `nombre_clase` varchar(30) NOT NULL,
  `id_familia` int(3) NOT NULL,
  `nombre_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(1) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`sku`),
  ADD KEY `fk_departmentoArticulo` (`id_departamento`),
  ADD KEY `fk_claseArticulo` (`id_clase`,`nombre_clase`),
  ADD KEY `fk_familiaArticulo` (`id_familia`,`nombre_familia`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`,`nombre`);

--
-- Indices de la tabla `clase_departamento`
--
ALTER TABLE `clase_departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clasedep` (`id_clase`,`nombre_clase`),
  ADD KEY `fk_depclase` (`id_departamento`);

--
-- Indices de la tabla `clase_familia`
--
ALTER TABLE `clase_familia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clase` (`id_clase`,`nombre_clase`),
  ADD KEY `fk_familia` (`id_familia`,`nombre_familia`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`,`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase_departamento`
--
ALTER TABLE `clase_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `clase_familia`
--
ALTER TABLE `clase_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_claseArticulo` FOREIGN KEY (`id_clase`,`nombre_clase`) REFERENCES `clases` (`id`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departmentoArticulo` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_familiaArticulo` FOREIGN KEY (`id_familia`,`nombre_familia`) REFERENCES `familias` (`id`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase_departamento`
--
ALTER TABLE `clase_departamento`
  ADD CONSTRAINT `fk_clasedep` FOREIGN KEY (`id_clase`,`nombre_clase`) REFERENCES `clases` (`id`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_depclase` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase_familia`
--
ALTER TABLE `clase_familia`
  ADD CONSTRAINT `fk_clase` FOREIGN KEY (`id_clase`,`nombre_clase`) REFERENCES `clases` (`id`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_familia` FOREIGN KEY (`id_familia`,`nombre_familia`) REFERENCES `familias` (`id`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
