-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 22:51:08
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vashir_forzza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_forzz`
--

CREATE TABLE `categoria_forzz` (
  `id_categoria_forzz` varchar(5) NOT NULL,
  `nombre_categoria_forzz` varchar(30) NOT NULL,
  `estado_categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_forzz`
--

INSERT INTO `categoria_forzz` (`id_categoria_forzz`, `nombre_categoria_forzz`, `estado_categoria`) VALUES
('ASD', 'Aseo Hogar e Industrial', 'DISPONIBLE'),
('ATM', 'Automotriz', 'DISPONIBLE'),
('BCO', 'Baño y Cocina', 'DISPONIBLE'),
('CAD', 'Cadenas y Cuerdas', 'DISPONIBLE'),
('CMP', 'Camping', 'DISPONIBLE'),
('CTS', 'Control Acceso Seguridad', 'DISPONIBLE'),
('DEC', 'Decoracion y Muebles', 'DISPONIBLE'),
('ELE', 'Electricidad', 'DISPONIBLE'),
('EPP', 'Proteccion Personal', 'DISPONIBLE'),
('EXT', 'Extintores', 'DISPONIBLE'),
('GAS', 'Gasfiteria', 'DISPONIBLE'),
('HRR', 'Herramientas y Maquinaria', 'DISPONIBLE'),
('JRD', 'Jardinería', 'DISPONIBLE'),
('LUM', 'Iluminacion', 'DISPONIBLE'),
('MTC', 'Materiales de Construcción', 'DISPONIBLE'),
('PVE', 'Puertas y Ventanas', 'DISPONIBLE'),
('REV', 'Revestimiento', 'DISPONIBLE'),
('SEG', 'Seguridad Vial', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_pro_forzz`
--

CREATE TABLE `categoria_pro_forzz` (
  `id_pro_categoria_forzz` int(11) NOT NULL,
  `id_sub_pro_forzz` varchar(5) NOT NULL,
  `sku_pro_forzz` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_pro_forzz`
--

INSERT INTO `categoria_pro_forzz` (`id_pro_categoria_forzz`, `id_sub_pro_forzz`, `sku_pro_forzz`) VALUES
(12, 'HRR', '0001'),
(13, 'HRR', '0002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto_forzz` int(11) NOT NULL,
  `id_pro_forzz` varchar(20) NOT NULL,
  `ruta_forzz` varchar(50) NOT NULL,
  `tipo_forzz` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto_forzz`, `id_pro_forzz`, `ruta_forzz`, `tipo_forzz`) VALUES
(7, '0001', 'img/categoria1.jpg', 'image/jpeg'),
(8, '0002', 'img/taladro.jpg', 'image/jpeg'),
(9, '0003', 'img/soldar01.jpg', 'image/jpeg'),
(10, '0004', 'img/caja01.jpg', 'image/jpeg'),
(11, '0005', 'img/sierra_electrica.jpg', 'image/jpeg'),
(12, '0006', 'img/hexagonales.jpg', 'image/jpeg'),
(13, '0007', 'img/llaves.jpg', 'image/jpeg'),
(14, '0008', 'img/generador.jpg', 'image/jpeg'),
(15, '0009', 'img/cinta.jpg', 'image/jpeg'),
(16, '0010', 'img/tornillo.jpg', 'image/jpeg'),
(17, '0011', 'img/hidro.jpg', 'image/jpeg'),
(18, '0012', 'img/cepillo.jpg', 'image/jpeg'),
(19, '0013', 'img/guante.jpg', 'image/jpeg'),
(20, '0014', 'img/guante01.jpg', 'image/jpeg'),
(21, '0015', 'img/zapato.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_forzz`
--

CREATE TABLE `marca_forzz` (
  `id_marca_forzz` int(11) NOT NULL,
  `nombre_marca_forzz` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca_forzz`
--

INSERT INTO `marca_forzz` (`id_marca_forzz`, `nombre_marca_forzz`) VALUES
(1, 'FORZZA'),
(2, 'UYUSTOOLS'),
(3, 'CERECITA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_forzz`
--

CREATE TABLE `productos_forzz` (
  `sku_producto_id` varchar(15) NOT NULL,
  `nombre_prod_forzz` varchar(50) NOT NULL,
  `modelo_prod_forzz` varchar(30) NOT NULL,
  `marca_pro_forzz` varchar(30) NOT NULL,
  `precio_prod_forzz` int(11) NOT NULL,
  `cant_prod_forzz` int(11) NOT NULL,
  `id_img_forzz` int(11) NOT NULL,
  `descripcion_pro_forzz` text NOT NULL,
  `especification_prod_forzz` text NOT NULL,
  `usuario_prod_forzz` varchar(20) NOT NULL,
  `fecha_agr_forzz` date NOT NULL,
  `fecha_mod_forzz` date NOT NULL,
  `precio_anterior_forzz` int(11) DEFAULT NULL,
  `oferta_pro_forzz` varchar(3) NOT NULL,
  `estado_pro_forzza` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_forzz`
--

INSERT INTO `productos_forzz` (`sku_producto_id`, `nombre_prod_forzz`, `modelo_prod_forzz`, `marca_pro_forzz`, `precio_prod_forzz`, `cant_prod_forzz`, `id_img_forzz`, `descripcion_pro_forzz`, `especification_prod_forzz`, `usuario_prod_forzz`, `fecha_agr_forzz`, `fecha_mod_forzz`, `precio_anterior_forzz`, `oferta_pro_forzz`, `estado_pro_forzza`) VALUES
('0001', 'Taladro atornillador inalambrico 10 mm', 'TC-DC 18/35 Li', 'FORZZA', 42990, 0, 0, '	Iluminación LED, más alta manejabilidad gracias a su diseño ergonómico y a la empuñadura Sotfgrip.', 'Engranajes: 1. Max. \r\nEsfuerzo de torsión duro: 35Nm. \r\nNúmero de pasos de torsión: 21 \r\nconfiguraciones. \r\nCantidad de acumuladores: 1 pieza.', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0002', 'Taladro inalambrico + bateria + cargador', 'TE-CD 18/2 Li KIT', 'UYUSTOOLS', 79990, 0, 0, 'Engranaje de 2 velocidades para atornillado y perforación rápida, bloqueo automático del husillo para cambio rápido de herramientas, bloqueo automático del husillo para cambio sin herramientas, acoplamiento a fricción del par de giro para trabajos de prec., empuñadura antideslizante ergonómica para trabajo cómodo', '	Luz LED para la iluminación de la zona de trabajo, clip de cinturón práctico, 2 x 1,5 Ah baterías recargables y un cargador rápido', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0003', 'Soldadora Kombat 160 + mascara soldar M&H', '	Soldadora: kombat 160, máscar', 'FORZZA', 84990, 0, 0, 'Máscara de soldar con filtro fotosensible de auto-oscurecimiento está diseñada para proteger los ojos y la cara de las chispas, salpicaduras y radiaciones nocivas, el filtro de oscurecimiento cambia automáticamente de un estado oscuro, cuando se empieza a soldar y vuelve a su estado claro una vez terminado de soldar, mica protectora reemplazable, cintillo con mecanismo diseñado para ajustar la caída, tiempo de cambio claro/oscuro: 0,000033 segundos, ajuste externo de sensibilidad y número de grado deseado (9 - 13)', 'Soldadora, suministro: 200 - 240V, en vacío: 65V, de trabajo: 20,8 - 24,8V', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0004', 'Carro porta herramientas con ruedas Robust', '	Robust', 'FORZZA', 17990, 0, 0, 'Carro porta herramientas con ruedas inferiores para fácil desplazamiento. Está disponible en color negro y naranjo y permite ubicar todos los implementos sin desordenar y sin ocupar mucho espacio.', '	42 x 36 x 58 cm\r\n	Negro / naranja\r\n	Importado', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0005', 'Sierra circular inalambrica', 'TE-CS 18/165 - Solo', 'FORZZA', 59990, 0, 0, 'La Sierra Circular TE-CS 18/165 -  Solo de Einhell es ligera y prÃ¡ctica y permite cortes precisos con hasta 4200 rpm. Como parte de la familia Power X-Change, estÃ¡ alimentada por una potente baterÃ­a de 18 V', 'Profundidad de corte	90Â°: 54 mm, 45Â°: 35 mm\r\nDiÃ¡metro	Hoja de sierra: 165 x 20 mm\r\nPeso	2,4 kg\r\nCaracterÃ­sticas	Miembro de la familia Power X-Change,', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0006', 'Set de dados hexagonales 40 unidades Bahco', 'bahco', 'UYUSTOOLS', 119990, 0, 0, 'Con el Set de dados hexagonales 40 unidades Bahco, tendrÃ¡s todo lo necesario para terminar tus labores y proyectos de la forma mÃ¡s segura y resistente.', 'Este modelo incluye una maleta que cuenta con 40 piezas: 21 dados hexagonales 1/2\" de 10 a 32 milÃ­metros, 1 chicharra mando 1/2\", 2 extensiones 5\" y 10\", 1 adaptador 1/2\", 1 dado cuadrado 1/2\", 1 mango articulado y 13 llaves punta corona. Todas son hechas en acero, material que otorga la resistencia, calidad y seguridad para que puedas trabajar de manera confiada.', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0007', 'Juego llave hexagonal 9 piezas', 'total', 'FORZZA', 5490, 0, 0, 'Acero', 'Color	Verde/Gris\r\nProcedencia	China\r\nUso	DomÃ©stico/Industrial', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0008', 'Generador elÃ©ctrico a gasolina 2800 W', 'HYG4050', 'FORZZA', 219990, 0, 0, 'Con el Generador a gasolina de 2,8 Kw de Hyundai es un dispositivo muy Ãºtil, capaz de sacarte de apuros cuando no cuentas con electricidad.', 'De color azul, con alimentaciÃ³n por gasolina y partida manual, este modelo cuenta con regulador automÃ¡tico de voltaje (AVR), lo que le proporciona una tensiÃ³n de salida estable y limpia que, ademÃ¡s, protege contra los sobrecalentamientos.\r\n\r\nPosee 2800 W de potencia, un motor de 212 cc y 2 salidas. Es monofÃ¡sico, lo que implica posee un sistema de producciÃ³n, distribuciÃ³n y consumo de energÃ­a elÃ©ctrica formado por una Ãºnica corriente alterna o fase y, por lo tanto, todo el voltaje varÃ­a de la misma forma.', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0009', 'Cinta aisladora elÃ©ctrica 3/4\'\' 10 m', 'Temflex 2000 Negro', '3M', 1290, 0, 0, 'Realizar conexiones es mucho mÃ¡s sencillo con el bConector cable Fast Line/b, ya que te permitirÃ¡ llevar a cabo tus realizaciones o actividades de manera segura y confiable. Si quieres tener terminaciones perfectas a la hora de manipular belectricidad,/b lo lograrÃ¡s gracias a su especificaciÃ³n bE3/b', 'Espesor de 0,18 mm. Adhesivo sensible a la presiÃ³n, gran flexibilidad y elongaciÃ³n. Auto extinguibles. Retardante a la llama y de moderada resistencia a los rayos ultravioleta. Opera de manera eficiente y continua en rangos de temperatura desde 0Â°C hasta 8', '', '0000-00-00', '0000-00-00', NULL, '', 'DISPONIBLE'),
('0010', 'Perno anclaje 1/4X1 3/4 1 unidad', 'fixser', 'FORZZA', 850, 0, 0, 'Ideal para sujetar piezas en estructuras', 'Cantidad por paquete	1\r\nDiÃ¡metro	1/4 \"\r\nModelo	100pan-x\r\nColor	Zincado brillante', '', '0000-00-00', '0000-00-00', NULL, '', 'DISPONIBLE'),
('0011', 'Hidrolavadora 1400 W elÃ©ctrica 110 ', 'K2 basic', 'UYUSTOOLS', 57990, 0, 0, 'MÃ¡xima eficacia para limpiar es lo que ofrece la Hidrolavadora de 1400 W, que cuenta con todo el respaldo y tecnologÃ­a de la marca alemana Karcher.', 'Con un flujo de salida de 6 l/min, este modelo K2 Basic trabaja con una presiÃ³n de 110 Bar, ideal para limpiar cualquier superficie, ya sea extensa o pequeÃ±a, como muros, rejas, puertas, canaletas, u objetos de mediano y gran tamaÃ±o como un auto, piscina o un contenedor de basura, entre otros.\r\n\r\nEsta hidrolavadora de 1400 W de potencia es de color amarillo y fabricaciÃ³n muy resistente. Su compra incluye pistola manguera y lanza turbo. Se alimenta a travÃ©s de la red elÃ©ctrica y tiene un excelente tamaÃ±o de 44,3x27,9x17,6 cm y un peso de 4,6 kg, de manera que puedas trasladarla y guardarla cÃ³modamente en tu hogar, bodega o garaje.', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0012', 'Cepillo rotatorio para hidrolavadora', 'WB100', 'FORZZA', 32990, 0, 0, 'Rotatorio', 'Marca	Karcher\r\nModelo	WB100\r\nUso	Ocasional', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0013', 'Guante profesional polycotton', 'Karson', 'FORZZA', 390, 0, 0, 'Guantes de Seguridad', 'CaracterÃ­sticas	Antideslizante\r\nMaterial	PolicotÃ³n\r\nUso	Para proteger las manos\r\nNÂº	StÃ¡ndard\r\nColor	Crudo', '', '0000-00-00', '0000-00-00', 0, 'SI', 'DISPONIBLE'),
('0014', 'Guante multipropÃ³sito polycotton', 'MultipropÃ³sito', 'REDLINE', 890, 0, 0, 'El guante multipropÃ³sito Standard Redline es una de las mejores elecciones entre las disponibles en el mercado de la ferreterÃ­a para el cuidado y protecciÃ³n de las manos. Se encuentra fabricado con policotton de alta resistencia que es un polÃ­mero cuya eficacia ha sido ampliamente probada por dÃ©cadas; ademÃ¡s reviste el producto de una textura interna suave, lo que aumenta la comodidad en su uso. Sirve para aplicaciones tanto a nivel domÃ©stico como profesional.', 'Una de las caracterÃ­sticas del guante multipropÃ³sito Standard Redline es su ductibilidad, esto se traduce en una propiedad mecÃ¡nica de algunos materiales que les permite estirarse sin romperse, por eso es una opciÃ³n flexible. AdemÃ¡s se destaca su durabilidad, por ello podrÃ¡ ofrecerte aÃ±os de vida Ãºtil. Cuenta con una superficie antideslizante, gracias a lo cual podrÃ¡s sostener objetos o herramientas con firmeza y minimizar el riesgo de caÃ­das y accidentes. Son sencillos de poner, quitarse y luego asear para una nueva utilizaciÃ³n.', '', '0000-00-00', '0000-00-00', NULL, '', 'DISPONIBLE'),
('0015', 'BotÃ­n de seguridad cleveland n.41', 'CLEVELAND', 'FORZZA', 39990, 0, 0, 'Seguridad Industrial', 'Aislante tÃ©rmico 3M Thinsulate; Aislante elÃ©ctrico; Anticlavo; Plantilla malla Eva y Nylon; AdemÃ¡s tiene dos soportes de color azul y agujeros de respiraciÃ³n', '', '0000-00-00', '0000-00-00', NULL, '', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria_forzz`
--

CREATE TABLE `sub_categoria_forzz` (
  `id_sub_forzz` int(11) NOT NULL,
  `id_categoria_forzz` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_sub_forzz` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado_sub` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sub_categoria_forzz`
--

INSERT INTO `sub_categoria_forzz` (`id_sub_forzz`, `id_categoria_forzz`, `nombre_sub_forzz`, `estado_sub`) VALUES
(1, 'HRR', 'TALADROS', 'DISPONIBLE'),
(2, 'HRR', 'HERRAMIENTAS MANUALES', 'DISPONIBLE'),
(5, 'ATM', 'Parabrisas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_pro` int(11) NOT NULL,
  `nombre_tipo_producto` varchar(30) NOT NULL,
  `id_subca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_pro`, `nombre_tipo_producto`, `id_subca`) VALUES
(1, 'GOLA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `admin`, `estado`) VALUES
('claudio', 'c20ad4d76fe97759aa27a0c99bff6710', 0, 1),
('juan', '202cb962ac59075b964b07152d234b70', 1, 1),
('river', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
('wlady', '432f45b44c432414d2f97df0e5743818', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_forzz`
--
ALTER TABLE `categoria_forzz`
  ADD PRIMARY KEY (`id_categoria_forzz`);

--
-- Indices de la tabla `categoria_pro_forzz`
--
ALTER TABLE `categoria_pro_forzz`
  ADD PRIMARY KEY (`id_pro_categoria_forzz`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto_forzz`);

--
-- Indices de la tabla `marca_forzz`
--
ALTER TABLE `marca_forzz`
  ADD PRIMARY KEY (`id_marca_forzz`);

--
-- Indices de la tabla `productos_forzz`
--
ALTER TABLE `productos_forzz`
  ADD PRIMARY KEY (`sku_producto_id`);

--
-- Indices de la tabla `sub_categoria_forzz`
--
ALTER TABLE `sub_categoria_forzz`
  ADD PRIMARY KEY (`id_sub_forzz`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_pro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_pro_forzz`
--
ALTER TABLE `categoria_pro_forzz`
  MODIFY `id_pro_categoria_forzz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto_forzz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `marca_forzz`
--
ALTER TABLE `marca_forzz`
  MODIFY `id_marca_forzz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sub_categoria_forzz`
--
ALTER TABLE `sub_categoria_forzz`
  MODIFY `id_sub_forzz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
