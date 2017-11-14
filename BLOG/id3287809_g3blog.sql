-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2017 a las 09:25:08
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id3287809_g3blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `numero_comentario` bigint(20) UNSIGNED NOT NULL,
  `titulo_entrada` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_comentario` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`numero_comentario`, `titulo_entrada`, `contenido`, `fecha`, `usuario_comentario`) VALUES
(3, 'ejemplo', 'Este comentario es de HUIS, pero de aburria y escribio otro', '2017-10-26 10:52:25', 'huis'),
(4, 'ejemplo', 'Comentario a mano desde PHP', '2017-10-26 13:00:25', 'admin'),
(6, 'ejemplo', ' Esto es un comentario desde la pagina', '2017-10-26 13:10:25', 'admin'),
(7, 'ejemplo', ' Prueba de comentario, SIN ID', '2017-10-26 13:10:25', 'admin'),
(8, 'ejemplo', ' Este comentario a mano esta sin id ni fecha', '2017-10-26 13:15:35', 'admin'),
(9, 'ejemplo', ' Este tutorial esta muy chulo', '2017-10-31 09:40:22', 'admin'),
(10, 'ejemplo', ' El de prestashop y wordpress son una mierda', '2017-10-31 09:40:37', 'admin'),
(11, 'Owncloud Tutorial', ' Los comentario se han ido a ejemplos :c\r\n', '2017-10-31 09:41:38', 'admin'),
(12, 'Owncloud Tutorial', ' weofjwoefjoef', '2017-10-31 12:56:24', 'admin'),
(13, 'Owncloud Tutorial ', 'aaaaaaaa', '2017-10-31 12:56:47', 'admin'),
(14, 'Owncloud Tutorial ', 'aaaaaaaa', '2017-10-31 12:56:53', 'admin'),
(15, 'Owncloud Tutorial', ' comentando', '2017-10-31 12:57:25', 'admin'),
(16, 'Owncloud Tutorial', ' comentando sin h1', '2017-10-31 12:57:54', 'admin'),
(17, 'Owncloud Tutorial', ' comentando sin nada', '2017-10-31 12:58:25', 'admin'),
(18, 'Owncloud Tutorial', ' comento 13:05\r\n', '2017-10-31 13:05:07', 'admin'),
(24, 'Ralph', 'prueba desde mysql', '2017-11-06 10:27:11', 'admin'),
(30, 'paso 2', ' eooo', '2017-11-06 10:34:42', 'admin'),
(31, 'ejemplo', ' ahora si que funciona', '2017-11-06 10:35:02', 'admin'),
(32, 'paso 5', ' este es el paso 5', '2017-11-06 11:44:55', 'admin'),
(34, 'ejemplo', ' ROYUUUUUUUUUUUUUUUUUU', '2017-11-08 09:13:12', 'admin'),
(35, 'Ralph', ' Hola ralph, que tallÂ¿', '2017-11-08 09:38:47', 'admin'),
(43, 'paso 3', ' a', '2017-11-08 09:46:28', 'admin'),
(45, 'paso 3', ' a', '2017-11-08 09:50:44', 'admin'),
(46, 'paso 6', '3456', '2017-11-08 09:53:14', 'admin'),
(48, 'ejemplo', 'DAVID PRINGADFO', '2017-11-10 10:21:18', 'admin'),
(49, 'no entiendo', 'sssssssssssssssss', '2017-11-10 10:24:30', 'admin'),
(50, 'ejemplo', 'saefdsf', '2017-11-10 10:24:58', 'admin'),
(51, 'paso 5', 'gvfgvbfv ', '2017-11-10 10:25:11', 'admin'),
(54, 'paso 1', 'mjk', '2017-11-10 10:36:28', 'admin'),
(55, 'paso 1', 'mjk', '2017-11-10 10:36:46', 'admin'),
(56, 'ejemplo', 'ffff', '2017-11-10 18:53:31', 'admin'),
(57, 'ejemplo', 'ffff', '2017-11-10 18:54:16', 'admin'),
(58, 'ejemplo', 'ffff', '2017-11-10 18:54:22', 'admin'),
(59, 'ejemplo', 'ffff', '2017-11-10 18:54:30', 'admin'),
(60, 'ejemplo', 'htrgh', '2017-11-10 18:56:58', 'david2222'),
(62, 'ejemplo', 'gfgbf', '2017-11-10 19:57:25', 'nereadavid'),
(63, 'ejemplo', 'fdfdfdf', '2017-11-10 19:58:58', 'davidnerea'),
(65, 'Owncloud Tutorial', 'eweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee  essssssssssssssssssssssssssssssssssssssssssssssssssssssss  ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2017-11-13 10:03:30', 'admin'),
(66, 'Dificultades', 'esto es una puta mierda', '2017-11-14 08:19:31', 'alkarim787'),
(67, 'Dificultades', 'pppppppp', '2017-11-14 08:39:45', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `titulo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_entrada` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`titulo`, `contenido`, `fecha_entrada`) VALUES
('Dificultades', '\r\n<h1 style=\"text-align: justify;\">Entradas</h1>\r\n<p style=\"text-align: justify;\">A la hora de crear entradas ten&iacute;amos un formato de entrada que no era v&aacute;lido y lo hemos tenido que cambiar usando un editor de texto para HTML.</p>\r\n<h1><img id=\"imagenart\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploads/entrada_imagenes/Dificultad1.png\" width=\"334\" height=\"364\" /></h1>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h1 style=\"text-align: justify;\">Hosting</h1>\r\n<p>Nuestro hosting no permit&iacute;a el uso adecuado de las variables de sesi&oacute;n, por lo tanto, cambiamos todo al servidor local que tenemos en clase.</p>\r\n<p><img id=\"imagenart\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploads/entrada_imagenes/Dificultad2.png\" width=\"412\" height=\"254\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img id=\"imagenart\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploads/entrada_imagenes/Dificultad3.png\" width=\"400\" height=\"247\" /></p>', '2017-11-13 13:48:51'),
('ejemplo', '\r\n<section><!-- INICIO REDES SOCIALES --> <!-- Botones de la clase info y tamaï¿½o xs --> <button id=\"btnmostrar\" class=\"btn btn-info btn-xs\"></button><!-- FIN REDES SOCIALES -->\r\n<h2>Titulo Entrada</h2>\r\n<article>\r\n<div class=\"divart\">\r\n<h3 class=\"pasoart\">Paso 1</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita<img id=\"imagenart\" style=\"letter-spacing: -0.03em;\" src=\"uploads/entrada_imagenes/perfil.png\" /><span style=\"letter-spacing: -0.03em;\">tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n</div>\r\n<img class=\"imgart\" src=\"imagenes/flor2.jpg\" /></article>\r\n<article>\r\n<div class=\"divart\">\r\n<h3 class=\"pasoart\">Paso 1</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>\r\n<img class=\"imgart\" src=\"imagenes/flor3.jpg\" /></article>\r\n<article>\r\n<div class=\"divart\">\r\n<h3 class=\"pasoart\">Paso 1</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>\r\n<img class=\"imgart\" src=\"imagenes/flor.jpg\" /></article>\r\n<article>\r\n<div class=\"divart\">\r\n<h3 class=\"pasoart\">Paso 1</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>\r\n<img class=\"imgart\" src=\"imagenes/flor2.jpg\" /></article>\r\n<article>\r\n<div class=\"divart\">\r\n<h3 class=\"pasoart\">Paso 1</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>\r\n<img class=\"imgart\" src=\"imagenes/flor3.jpg\" /></article>\r\n</section>', '2017-11-11 18:29:36'),
('entradilla', '\r\n<h1>Escrifdsfdgdbe tu entrada</h1>', '2017-11-11 18:33:21'),
('mientrada', '\r\n<p>dsfdsfgegfdgfhf</p>', '2017-11-13 13:14:34'),
('nerewavid', '\r\n<h1>Eedferfdrfr entradaaaaaaaaa</h1>', '2017-11-11 18:29:36'),
('no entiendo', '\r\n<p>Prueba</p>\r\n', '2017-11-11 18:29:36'),
('Owncloud Tutorial', '\r\n<h1>OwnCloud</h1>\r\n<h3>Descarga OwnCloud</h3>\r\n<p>&nbsp;</p>\r\n<p>Lo primero sera descargar la ultima version de ownCloud, es muy facil de descargar ya que solo hay que comprobar que tenemos conexi&oacute;n a internet, y ecribir el siguiente comando:</p>\r\n<p><code>wget http://download.owncloud.org/community/owncloud-latest.tar.bz</code><a name=\"2\"></a></p>\r\n<h3>Descomprimir</h3>\r\n<p>&nbsp;</p>\r\n<p>Lo que hemos descargado es un <span class=\"text-info\">archivo comprimido</span>, as&iacute; que hay que descomprimirlo usando el comando <mark>tar</mark> el cual ya viene por defecto con ubuntu.</p>\r\n<p><code>tar -xjf owncloud-latest.tar.bz</code></p>\r\n<p>&nbsp;</p>\r\n<h3>Mover Carpeta</h3>\r\n<p>&nbsp;</p>\r\n<p>Lo que obtendremos ser&aacute; una carpeta llamada &ldquo;owcloud&rdquo;, esa carpeta hay que moverla a nuestro <span class=\"bg-primary\">/var/www/html/</span> para que sea accesible desde el navegador.</p>\r\n<p><code>sudo mv owncloud /var/www/html/</code> <a name=\"4\"></a></p>\r\n<h3>Comprobar IP</h3>\r\n<p>&nbsp;</p>\r\n<p>Ahora, yendo al servidor y poniendo nuestra ip m&aacute;s &ldquo;/owncloud&rdquo; <span class=\"bg-info\">x.x.x.x/owncloud</span> nos llevar&iacute;a a la creaci&oacute;n de usuario admin y conexi&oacute;n a la base de datos, pero aun no nos dejar&iacute;a crearlos ya que no tiene permisos para modificar nuestra carpeta, as&iacute; que hay que darle permisos, lo primero es entrar a la carpeta:</p>\r\n<p><code>cd /var/www/html</code><a name=\"5\"></a></p>\r\n<h3>Dar Permisos</h3>\r\n<p>&nbsp;</p>\r\n<p>Una vez dentro, usaremos el siguiente comando para darle permisos de edici&oacute;n a nuestea carpeta <mark>ownCloud</mark></p>\r\n<p><code>sudo chown -R www-data:www-data ownclou</code><a name=\"6\"></a></p>\r\n<h3>Comprobar Errores</h3>\r\n<p>&nbsp;</p>\r\n<p>Una vez hecho esto, accederemos desde el navegador. Recordad que se accede asi... <span class=\"bg-info\">x.x.x.x/owncloud</span></p>\r\n<p><span class=\"bg-info\"><img src=\"imagenes/1.png\" alt=\"\" width=\"621\" height=\"499\" /></span></p>\r\n<h3>Resolver Errores</h3>\r\n<p>&nbsp;</p>\r\n<p>Puede que nos de <span class=\"text-danger\">algunos errores</span> como se ve en la imagen anterior, as&iacute; que habra que <mark></mark>instalar algunos los siguientes paquetes.</p>\r\n<p><code>apt-get install php7.0-url</code><br /> <code>apt-get install php7.0-SimpleXML</code><br /> <code>apt-get install php7.0-mbstring</code><br /> <code>apt-get install php7.0-zip</code><a name=\"8\"></a></p>\r\n<ul class=\"list-unstyled\">\r\n<li>\r\n<h3>Reiniciar Servidor</h3>\r\n<p>Una vez instalados, <span class=\"bg-primary\">reiniciamos nuestro apache</span>, y volveremos a acceder</p>\r\n<code>service apache2 restart</code> <a name=\"9\"></a>\r\n<h3>Conexi&oacute;n MySql</h3>\r\n<p>Lo siguiente es crear una base de datos y un usuario que pueda acceder a dicha base de datos, para ello tendremos que entrar al MySql usando:</p>\r\n<code>mysql -u root -p</code> <a name=\"10\"></a>\r\n<h3>Creaci&oacute;n BD</h3>\r\n<p>Ahora creamos una Base de Datos, para ellos usaremos:</p>\r\n<code>CREATE DATABASE Grupo3BD;</code></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n', '2017-11-11 18:29:36'),
('paso 1', '\r\n<p>aaaa</p>\r\n', '2017-11-11 18:29:36'),
('paso 2', '\r\n<p>aaa<a href=\"http://www.google.es\">www.google.es</a>a</p>\r\n', '2017-11-11 18:29:36'),
('paso 3', '\r\n<p>&nbsp;</p>\r\n<h1>WWWelcome to TinyMCE 4.7!</h1>\r\n<p>Please try out this example of the worlds favorite online rich text editor. When you are ready, <a href=\"https://www..com/\">sign up</a> to integrate TinyMCE into your application today.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href=\"https://www..com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href=\"https://community..com/forum/\">community forum</a>.</li>\r\n<li>Need more? Get support with a <a href=\"https://.com/pricing\">premium subscription</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table class=\"tiny-table\" style=\"text-align: center;\">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Value</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td><a href=\"https://www..com\">TinyMCE Cloud</a></td>\r\n<td>The easiest and most reliable way to integrate powerful rich text editing into your application.</td>\r\n</tr>\r\n<tr>\r\n<td><a href=\"http://www.moxiemanager.com\">MoxieManager</a></td>\r\n<td>Image and file manager add-on for TinyMCE.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Get involved</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com///issues\">GitHub repository</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.</p>\r\n', '2017-11-11 18:29:36'),
('paso 4', '\r\n<p>&nbsp;</p>\r\n<h1>WWWelcome to TinyMCE 4.7!</h1>\r\n<p>Please try out this example of the worlds favorite online rich text editor. When you are ready, <a href=\"https://www..com/\">sign up</a> to integrate TinyMCE into your application today.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href=\"https://www..com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href=\"https://community..com/forum/\">community forum</a>.</li>\r\n<li>Need more? Get support with a <a href=\"https://.com/pricing\">premium subscription</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table class=\"tiny-table\" style=\"text-align: center;\">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Value</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td><a href=\"https://www..com\">TinyMCE Cloud</a></td>\r\n<td>The easiest and most reliable way to integrate powerful rich text editing into your application.</td>\r\n</tr>\r\n<tr>\r\n<td><a href=\"http://www.moxiemanager.com\">MoxieManager</a></td>\r\n<td>Image and file manager add-on for TinyMCE.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Get involved</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com///issues\">GitHub repository</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.</p>\r\n', '2017-11-11 18:29:36'),
('paso 5', '\r\n<p>&nbsp;</p>\r\n<h1>WWWelcome to TinyMCE 4.7!</h1>\r\n<p>Please try out this example of the worlds favorite online rich text editor. When you are ready, <a href=\"https://www..com/\">sign up</a> to integrate TinyMCE into your application today.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href=\"https://www..com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href=\"https://community..com/forum/\">community forum</a>.</li>\r\n<li>Need more? Get support with a <a href=\"https://.com/pricing\">premium subscription</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table class=\"tiny-table\" style=\"text-align: center;\">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Value</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td><a href=\"https://www..com\">TinyMCE Cloud</a></td>\r\n<td>The easiest and most reliable way to integrate powerful rich text editing into your application.</td>\r\n</tr>\r\n<tr>\r\n<td><a href=\"http://www.moxiemanager.com\">MoxieManager</a></td>\r\n<td>Image and file manager add-on for TinyMCE.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Get involved</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com///issues\">GitHub repository</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.</p>\r\n', '2017-11-11 18:29:36'),
('paso 6', '\r\n<p>&nbsp;</p>\r\n<h1>WWWelcome to TinyMCE 4.7!</h1>\r\n<p>Please try out this example of the worlds favorite online rich text editor. When you are ready, <a href=\"https://www..com/\">sign up</a> to integrate TinyMCE into your application today.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href=\"https://www..com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href=\"https://community..com/forum/\">community forum</a>.</li>\r\n<li>Need more? Get support with a <a href=\"https://.com/pricing\">premium subscription</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table class=\"tiny-table\" style=\"text-align: center;\">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Value</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td><a href=\"https://www..com\">TinyMCE Cloud</a></td>\r\n<td>The easiest and most reliable way to integrate powerful rich text editing into your application.</td>\r\n</tr>\r\n<tr>\r\n<td><a href=\"http://www.moxiemanager.com\">MoxieManager</a></td>\r\n<td>Image and file manager add-on for TinyMCE.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Get involved</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com///issues\">GitHub repository</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.</p>\r\n', '2017-11-11 18:29:36'),
('Ralph', '\r\n<p>holamellamoralph</p>\r\n', '2017-11-11 18:29:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `verificado` int(1) NOT NULL DEFAULT '0',
  `pass` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uploads/user_imagenes/perfil.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `correo`, `verificado`, `pass`, `imagen`) VALUES
('admin', 'admin@gmail.com', 1, 'bfa1671f1377a0e931e7d64b9e95f895', 'perfil.png'),
('alkarim787', 'asds@dd.com', 1, '5c4145ebabe00a3a50038f0a6f04506c', '13.png'),
('alkarinpipi', 'fefefe@dd.c', 1, '63b959c609952bbb7aa375364209978f', 'perfil.png'),
('david2222', 'qs@dd.com', 1, '63b959c609952bbb7aa375364209978f', 'SelecciÃ³n_020.png'),
('davidgupo', '1dw@dd.c', 1, '63b959c609952bbb7aa375364209978f', 'perfil.png'),
('davidnerea', '123e2@dd.v', 1, '63b959c609952bbb7aa375364209978f', 'f1.jpg'),
('dwsfewfew', 'fwefe@gg.com', 1, '63b959c609952bbb7aa375364209978f', 'perfil.png'),
('huis', 'huis@gmail.com', 1, '050071550edd35622ce9846e741ec8445', 'perfil.png'),
('nereadavid', '12@f.v', 1, '63b959c609952bbb7aa375364209978f', 'perfil.png'),
('nerealopez', '123rff@hh.c', 1, '63b959c609952bbb7aa375364209978f', 'f1.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`numero_comentario`),
  ADD UNIQUE KEY `id_comentario` (`numero_comentario`),
  ADD KEY `usuario_comentario` (`usuario_comentario`),
  ADD KEY `titulo_entrada` (`titulo_entrada`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`titulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `numero_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_comentario`) REFERENCES `usuario` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`titulo_entrada`) REFERENCES `entrada` (`titulo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
