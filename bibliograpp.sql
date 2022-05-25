-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 09:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliograpp`
--
CREATE DATABASE IF NOT EXISTS `bibliograpp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bibliograpp`;

-- --------------------------------------------------------

--
-- Table structure for table `fichas`
--

DROP TABLE IF EXISTS `fichas`;
CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `revista` varchar(50) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `lugarPublicacion` varchar(50) NOT NULL,
  `fechaPublicacion` year(4) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `palabrasClave` varchar(255) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `bibliografiaSugerida` varchar(50) NOT NULL,
  `resumen` varchar(255) NOT NULL,
  `notas` text NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fichas`
--

INSERT INTO `fichas` (`id`, `autor`, `titulo`, `revista`, `editorial`, `lugarPublicacion`, `fechaPublicacion`, `ubicacion`, `palabrasClave`, `tema`, `bibliografiaSugerida`, `resumen`, `notas`, `usuario`) VALUES
(1, 'J.r.r. Tolkien', 'El Hobbit', '', 'Minotauro', 'Londres', 1937, 'Reino Unido', 'hobbit', 'Ficción', '', 'Un gran clásico moderno y el preludio de las vastas y poderosas mitologías de El Señor de los Anillos', '&#60;h2&#62;Un gran clásico moderno y el preludio de las vastas y poderosas mitologías de El Señor de los Anillos&#60;/h2&#62;&#60;p&#62;Smaug parecía profundamente dormido cuando Bilbo espió una vez más desde la entrada. ¡Pero fingía estar dormido! ¡Estaba vigilando la entrada del túnel!... Sacado de su cómodo agujero-hobbit por Gandalf y una banda de enanos, Bilbo se encuentra de pronto en medio de una conspiración que pretende apoderarse del tesoro de Smaug el Magnífico, un enorme y muy peligroso dragón…&#60;/p&#62;', 1),
(2, 'Bram Stoker', 'Drácula', '', 'Alma', 'Reino Unido', 0000, 'Reino Unido', 'dracula', 'Novela', '', 'Drácula es un clásico de la novela de terror; quizá el clásico por excelencia de este género. En la obra de Bram Stoker, la figura del vampiro, inspirada en una creencia popular, encontró su forma perfecta.', '&#60;p&#62;La obra comienza con Jonathan Harker, un joven abogado &#60;a href=&#34;https://es.wikipedia.org/wiki/Londres&#34;&#62;londinense&#60;/a&#62; comprometido con Wilhemina Murray (Mina), el cual se encuentra en la ciudad de &#60;a href=&#34;https://es.wikipedia.org/wiki/Bistritz&#34;&#62;Bistritz&#60;/a&#62; como parte de una viaje de negocios, que continuará a través del &#60;a href=&#34;https://es.wikipedia.org/wiki/Desfiladero_del_Borgo&#34;&#62;desfiladero del Borgo&#60;/a&#62; hasta el remoto castillo de su cliente, el &#60;a href=&#34;https://es.wikipedia.org/wiki/Conde_Dr%C3%A1cula&#34;&#62;conde Drácula&#60;/a&#62;, en una de las regiones más lejanas de la &#60;a href=&#34;https://es.wikipedia.org/wiki/Rumania&#34;&#62;Rumania&#60;/a&#62; de la época, los &#60;a href=&#34;https://es.wikipedia.org/wiki/Montes_C%C3%A1rpatos&#34;&#62;Montes Cárpatos&#60;/a&#62; de &#60;a href=&#34;https://es.wikipedia.org/wiki/Transilvania&#34;&#62;Transilvania&#60;/a&#62;, para cerrar unas ventas con él. En una posada, los aldeanos locales le advierten que, al ser la víspera del &#60;a href=&#34;https://es.wikipedia.org/wiki/D%C3%ADa_de_San_Jorge&#34;&#62;día de San Jorge&#60;/a&#62;, las fuerzas del mal tienen completo poder. Tras instarle sin éxito a quedarse, la dueña de la posada le regala a Jonathan un &#60;a href=&#34;https://es.wikipedia.org/wiki/Rosario_(catolicismo)&#34;&#62;rosario&#60;/a&#62; con esperanzas de protegerlo de las influencias malignas. Convirtiéndose durante un breve período de tiempo en huésped del conde, el joven inglés va descubriendo que la personalidad de Drácula es extraña comparada a sus costumbres inglesas: no se refleja en los espejos, no come nunca en su presencia, y hace vida nocturna. Poco a poco va descubriendo que es un ser despreciable, ruin y despiadado que acabará convirtiéndole en un rehén en el propio castillo. En el mismo también viven tres jóvenes y bellas mujeres, que posteriormente serán reveladas como vampiresas novias de Drácula, las cuales una noche seducen a Jonathan y tratan de chuparle la sangre, cosa que evita el conde al irrumpir inesperadamente. Para evitarlo, Drácula les entrega un niño que ha secuestrado para que se beban su sangre. La madre del bebé no tarda en llegar al castillo para reclamarlo, pero el conde ordena a los lobos que la devoren.&#60;/p&#62;&#60;p&#62;Teniendo al joven Harker prisionero en su castillo, el Conde decide viajar a Londres, haciéndolo oculto en una caja con tierra de Transilvania, ya que debe descansar en la tierra sagrada de su patria. Para alcanzar su destino, viaja en carruaje hasta un puerto cercano al estrecho del &#60;a href=&#34;https://es.wikipedia.org/wiki/B%C3%B3sforo&#34;&#62;Bósforo&#60;/a&#62;, y desde allí prosigue en barco desde &#60;a href=&#34;https://es.wikipedia.org/wiki/Varna_(Bulgaria)&#34;&#62;Varna&#60;/a&#62; hasta &#60;a href=&#34;https://es.wikipedia.org/wiki/Whitby&#34;&#62;Whitby&#60;/a&#62;, en la costa de Inglaterra, atravesando el estrecho de los &#60;a href=&#34;https://es.wikipedia.org/wiki/Dardanelos&#34;&#62;Dardanelos&#60;/a&#62;. Dentro del navío, El Demeter, mata a toda la tripulación, hombre por hombre, para alimentarse. El capitán decide amarrarse al timón para evitar encallar el barco, llegando la nave a puerto sin ningún tripiulante vivo. Al mismo tiempo, para encontrar un poco de descanso, la joven Mina Murray decide pasar una temporada veraniega con su amiga íntima de infancia, Lucy Westenra, en la casa solariega que esta posee en &#60;a href=&#34;https://es.wikipedia.org/wiki/Whitby&#34;&#62;Whitby&#60;/a&#62;, en la costa de &#60;a href=&#34;https://es.wikipedia.org/wiki/Yorkshire&#34;&#62;Yorkshire&#60;/a&#62;. Lucy es una hermosa joven de clase acomodada que vive en una lujosa mansión junto a su madre viuda, la señora Westenra. La joven padece de sonambulismo y Drácula, que huyó del barco transformado en lobo al atracar, se aprovecha de ello para chuparle la sangre por primera vez en el cementerio de Whitby, siendo Mina testigo de ello, recogiendo luego a Lucy y llevándola de vuelta a su casa.&#60;/p&#62;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#60;p&#62;Portada de la primera edición de El invitado de Drácula y otras historias de terror.&#60;/p&#62;&#60;p&#62;Mientras, Jonathan sigue recluido en el castillo de Drácula, pero su cautiverio finaliza cuando logra huir descendiendo por sus muros, cayendo al río que bordea la fortaleza y siendo arrastrado por la corriente. Lo encuentran unas monjas en una abadía cercana, y posteriormente se aloja en un hospital de &#60;a href=&#34;https://es.wikipedia.org/wiki/Budapest&#34;&#62;Budapest&#60;/a&#62;, donde se recupera de una fiebre cerebral sufrida a raíz de los terribles hechos vividos en la morada de Drácula. Una monja del hospital se pone en contacto con Mina por carta, detallándole la situación de su prometido, y pidiéndole que se desplace hasta ese lugar para cuidar de Harker, donde, según resuelve Mina, contraerán matrimonio.&#60;/p&#62;&#60;p&#62;Mientras, en Whitby, Lucy sufre unos extraños síntomas: palidez extrema, debilidad y aparición de dos pequeños orificios en el cuello, producidos por una supuesta enfermedad; pero lo que en realidad le sucede es que está convirtiéndose en vampiresa o no-muerta, debido a que Drácula le succiona la sangre, que necesita para sobrevivir y rejuvenecer. Los síntomas de Lucy se van agravando tras su regreso a &#60;a href=&#34;https://es.wikipedia.org/wiki/Londres&#34;&#62;Londres&#60;/a&#62;. Al no mejorar la salud de Lucy, su prometido &#60;a href=&#34;https://es.wikipedia.org/wiki/Arthur_Holmwood&#34;&#62;Lord Arthur Holmwood&#60;/a&#62; (posteriormente Lord Godalming) y su amigo Quincey Morris, anterior pretendiente de Lucy, piden consejo al doctor John Seward, anterior pretendiente también. Este médico es el director del &#60;a href=&#34;https://es.wikipedia.org/wiki/Manicomio&#34;&#62;manicomio&#60;/a&#62; en el que se encuentra el paciente &#60;a href=&#34;https://es.wikipedia.org/wiki/Renfield&#34;&#62;Renfield&#60;/a&#62;, un interno sometido a la influencia de Drácula y practicante de la zoofagia a raíz de su culto al vampirismo. Al observar que la salud de Lucy empeora, Seward decide pedir consejo al doctor &#60;a href=&#34;https://es.wikipedia.org/wiki/Abraham_van_Helsing&#34;&#62;Abraham Van Helsing&#60;/a&#62;, un &#60;a href=&#34;https://es.wikipedia.org/wiki/M%C3%A9dico&#34;&#62;médico&#60;/a&#62; &#60;a href=&#34;https://es.wikipedia.org/wiki/Pa%C3%ADses_Bajos&#34;&#62;neerlandés&#60;/a&#62; experto en &#60;a href=&#34;https://es.wikipedia.org/wiki/Enfermedad_rara&#34;&#62;enfermedades misteriosas&#60;/a&#62;, que fue su profesor durante sus años de carrera. Tras realizar numerosos tratamientos y transfusiones, Lucy y su madre mueren (esta última de un ataque cardíaco) y son sepultadas.&#60;/p&#62;&#60;p&#62;Días más tarde, unas noticias publicadas en el periódico de la ciudad hablan de una &#34;hermosa señora de sangre&#34; que muerde a los niños pequeños. El doctor Van Helsing sospecha que Lucy se ha convertido en &#60;a href=&#34;https://es.wikipedia.org/wiki/No_muerto&#34;&#62;no-muerta&#60;/a&#62;, y él y sus compañeros, —Arthur, Quincey y John— montan guardia frente al mausoleo familiar en el que ha sido sepultada la joven. A medianoche descienden armados al recinto en el que reposa el cuerpo de Lucy; al correr la tapa del sarcófago se percatan que el cuerpo no está dentro del féretro; entretanto llega Lucy, convertida en una No-muerta, cargando con un niño al cual le está bebiendo la sangre. Van Helsing sella el sepulcro de Lucy con hostia consagrada, de manera que esta no puede huir, y se sitúa detrás de la vampiresa con un crucifijo de oro. Todos se horrorizan ante la revelación. El doctor Van Helsing le pide autorización a Arthur para &#34;matar&#34; al monstruo. El joven, destrozado por la transformación de su amada, acepta. Así, los dos completan el rito para que la joven pueda descansar en paz: le clavan una estaca en el corazón, la decapitan y le llenan la boca de &#60;a href=&#34;https://es.wikipedia.org/wiki/Ajo&#34;&#62;ajo&#60;/a&#62;. De esta manera Lucy Westenra deja de ser una vampiresa. El tormento abandona su alma, por lo que ya puede descansar en paz.&#60;/p&#62;&#60;p&#62;Mina Murray, ahora Mina Harker al casarse con Jonathan, tras volver de su boda se entera de la muerte del Sr. Hawkins, que era un gran amigo de ella y de Jonathan; ambos lo consideraban un padre. Al regresar del entierro, Jonathan descubre que el conde Drácula ya está en Londres, y además rejuvenecido. Al llegar a la casa que el Sr. Hawkins les dejó como herencia, Mina recibe un telegrama de Van Helsing y, con gran dolor, se entera de la muerte de su amiga Lucy y la madre de esta. Preocupado por su propia salud mental, Jonathan le pide a Mina que lea el diario que él escribió durante su estadía en el castillo de Drácula, en Transilvania. Mina lo lee y queda consternada, tras lo cual comparte esa experiencia con el doctor Van Helsing, contándole todo lo que sospecha. Este averigua finalmente que el conde Drácula es el vampiro responsable de la enfermedad, muerte y transformación de Lucy, por lo que deciden darle muerte, dejando a Mina en la supuesta seguridad del manicomio.&#60;/p&#62;&#60;p&#62;Primero intentan acabar con él en Londres, buscando y purificando todos sus refugios, sin conseguir darle muerte. El conde hábilmente convence a Renfield para que le abra la ventana, ofreciéndole ratas, debido a que Drácula no podía introducirse en un edificio donde no le hubieran permitido el paso. Aprovechando que los hombres se encuentran entretenidos buscándole, entra y le chupa la sangre a Mina. Al saber esto Renfield, que antes consideraba al conde su maestro y señor, decide luchar en su contra, porque además no ha cumplido la promesa de entregarle a los animales, pero Drácula lo mata acusándolo de traición. Renfield, agonizante, confiesa sus actos a Van Helsing y luego muere. Seguidamente, Drácula vuelve a morder a Mina y le hace beber de su sangre, para que quede de esta manera ligada a él, en lo que más tarde denomina Van Helsing como &#34;el bautismo de sangre del vampiro&#34;. Poco más tarde, Drácula se enfrenta a los hombres, pero al no poder derrotarlos pese a su gran poder, huye de ellos y parte hacia su castillo en &#60;a href=&#34;https://es.wikipedia.org/wiki/Transilvania&#34;&#62;Transilvania&#60;/a&#62;, fracasando así su intento de asentarse en Inglaterra para conseguir víctimas femeninas que incrementen su harén de novias vampiresas.&#60;/p&#62;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#60;p&#62;Bela Lugosi interpretando a Drácula, 1931. Estudios Universal&#60;/p&#62;&#60;p&#62;Todos los que querían acabar con Drácula —Jonathan, John Seward, Van Helsing, Quincey Morris, Lord Godalming (prometido de la fallecida Lucy) y Mina Harker—, marchan tras él, pues saben que ha huido gracias a las sesiones de hipnosis que le practica van Helsing a Mina, quien ha caído bajo el influjo de Drácula, aunque no del todo. Tras varios días de viaje llegan a &#60;a href=&#34;https://es.wikipedia.org/wiki/Galatz&#34;&#62;Galatz&#60;/a&#62;, donde se desvió el conde con el barco Zarina Catalina gracias a su poder de controlar los vientos y la niebla, y posteriormente llegan al castillo. Esa noche las tres vampiresas se les aparecen a Mina y a Van Helsing durante un alto en su viaje en &#60;a href=&#34;https://es.wikipedia.org/wiki/Calesa&#34;&#62;calesa&#60;/a&#62; y tratan de que Mina se les una, pero Van Helsing logra ahuyentarlas con la hostia. Al amanecer, el doctor entra al castillo y las mata del mismo modo que a Lucy; luego sale del castillo, vuelve con Mina, y se van tanto a la búsqueda de Drácula como de sus amigos. Todos confluyen cerca del anochecer, durante una tormenta de nieve y acechados por los lobos. Drácula viajaba dormido y metido en una caja de tierra, llevado y flanqueado por los &#60;a href=&#34;https://es.wikipedia.org/wiki/C%C3%ADngaro&#34;&#62;cíngaros&#60;/a&#62; leales, quienes también lo habían llevado hasta el puerto en su viaje a Londres. Se libra una batalla, la cual termina cuando el &#60;a href=&#34;https://es.wikipedia.org/wiki/Kukri&#34;&#62;kukri&#60;/a&#62; de Jonathan corta el cuello del conde, al tiempo que Quincey atraviesa el corazón del &#60;a href=&#34;https://es.wikipedia.org/wiki/Vampiro&#34;&#62;vampiro&#60;/a&#62; antes de morir víctima de la puñalada mortal propinada momentos antes por un zíngaro. Drácula muere y se convierte instantáneamente en polvo. Mina, cuando está siendo destruido, observa la paz que asoma al pálido rostro del vampiro tras abrírsele el camino al cielo. La cicatriz que la hostia consagrada había dejado en la frente de Mina desaparece tras la muerte del conde.&#60;/p&#62;&#60;p&#62;El epílogo es la reflexión de Jonathan Harker, siete años después de los hechos.Arthur se ha vuelto a casar, Mina y Johnatan tienen un hijo, llamado Quincey en honor a su amigo, y Van Helsing, padrino del niño, sentencia que los diarios no serán necesarios para legitimar su historia: su hijo debería sentirse orgulloso de ellos.&#60;/p&#62;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#60;p&#62;&#60;a href=&#34;https://es.wikipedia.org/wiki/Castillo_de_Bran&#34;&#62;Castillo de Bran&#60;/a&#62;, el cual se presume fue usado por Bram Stoker como modelo para el castillo de Drácula.&#60;/p&#62;&#60;p&#62;En algunas ediciones, la novela va precedida del cuento terrorífico &#60;a href=&#34;https://es.wikipedia.org/wiki/El_invitado_de_Dr%C3%A1cula&#34;&#62;&#60;i&#62;El invitado de Drácula&#60;/i&#62;&#60;/a&#62; o &#60;a href=&#34;https://es.wikipedia.org/w/index.php?title=El_hu%C3%A9sped_de_Dr%C3%A1cula&#38;amp;action=edit&#38;amp;redlink=1&#34;&#62;&#60;i&#62;El huésped de Drácula&#60;/i&#62;&#60;/a&#62;. En él, Jonathan Harker, un joven abogado inglés que está de viaje rumbo a Transilvania, se encuentra aún en &#60;a href=&#34;https://es.wikipedia.org/wiki/M%C3%BAnich&#34;&#62;Múnich&#60;/a&#62;, desde donde habrá de tomar un tren que lo llevará a &#60;a href=&#34;https://es.wikipedia.org/wiki/Viena&#34;&#62;Viena&#60;/a&#62; y después a &#60;a href=&#34;https://es.wikipedia.org/wiki/Budapest&#34;&#62;Budapest&#60;/a&#62;. Una tarde, desde Múnich, sale de paseo en un coche de caballos. Al no faltar mucho para acabarse el día, el cochero quiere regresar porque esa es la &#60;a href=&#34;https://es.wikipedia.org/wiki/Noche_de_Walpurgis&#34;&#62;Noche de Walpurgis&#60;/a&#62;. Como buen inglés, Jonathan despide al cochero y continúa el paseo a solas y a pie por un camino misterioso que se desviaba del camino principal. Siguiendo esa senda por un par de horas, se interna en un bosque tenebroso que comienza a tornarse hostil con cada paso que da. Se hace de noche y comienza a nevar, mientras el joven percibe una presencia malévola a su alrededor. La tormenta se hace más fuerte y Jonathan es arrastrado a lo que parece ser un cementerio abandonado. Buscando refugio para los truenos se dirige a una capilla de mármol blanco que cree segura. En su exterior, tallado en la piedra se lee: &#60;i&#62;Condesa Dolingen de &#60;/i&#62;&#60;a href=&#34;https://es.wikipedia.org/wiki/Graz&#34;&#62;&#60;i&#62;Graz&#60;/i&#62;&#60;/a&#62;&#60;i&#62;, en &#60;/i&#62;&#60;a href=&#34;https://es.wikipedia.org/wiki/Estiria&#34;&#62;&#60;i&#62;Estiria&#60;/i&#62;&#60;/a&#62;&#60;i&#62; buscó y halló la muerte. 1801&#60;/i&#62; y otra inscripción en alemán que reza: &#60;i&#62;&#34;Denn die Toten reiten schnell&#34;&#60;/i&#62; (&#34;Porque los muertos viajan de prisa&#34;, fragmento citado por Bram Stoker del poema &#60;a href=&#34;https://es.wikipedia.org/wiki/Lenore_(1773)&#34;&#62;Lenore&#60;/a&#62;, escrito por &#60;a href=&#34;https://es.wikipedia.org/wiki/Gottfried_August_B%C3%BCrger&#34;&#62;Gottfried August Bürger&#60;/a&#62;). El asustado joven abre la puerta y encuentra que sobre un catafalco de piedra se halla en reposo el cuerpo de una hermosa joven con los labios manchados de sangre. En ese instante un rayo cae sobre la capilla y esta comienza a incendiarse. Lo que parecía ser el cadáver de la suicida se levanta de su lecho y empieza a dar horribles gritos de dolor en medio del fuego que la consume. El asustado joven corre ante lo que le parece imposible y se cae en la nieve mientras la tormenta se hace más fuerte. Cuando recobra el sentido siente que un lobo le está olfateando el cuello y calentándolo. El animal huye cuando una partida de hombres con antorchas lo encuentran, pues habían salido a buscarlo habiendo informado el cochero de que el joven se había internado solo en el bosque. Cuando el protagonista finalmente es devuelto a su hotel, le espera un telegrama de Drácula, con el que va a reunirse en Transilvania, y en el que le advierte de los peligros de la nieve y los lobos en la noche.&#60;/p&#62;&#60;p&#62;No está clara la autoría de esa historia. Según algunos, se trata del principio de la novela, que fue eliminado de la primera edición por considerar el editor que, de no hacerlo, la novela habría resultado demasiado larga. Según otros, la autora sería la viuda de Stoker; según otros más, el propio editor.&#60;/p&#62;&#60;p&#62;La novela, publicada en mayo de &#60;a href=&#34;https://es.wikipedia.org/wiki/1897&#34;&#62;1897&#60;/a&#62; (&#60;a href=&#34;https://es.wikipedia.org/wiki/Ciudad_de_Westminster&#34;&#62;Westminster&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/w/index.php?title=Archibald_Constable_and_Company&#38;amp;action=edit&#38;amp;redlink=1&#34;&#62;Archibald Constable and Company&#60;/a&#62;), despliega &#60;a href=&#34;https://es.wikipedia.org/wiki/Erudito&#34;&#62;erudición&#60;/a&#62; sobre &#60;a href=&#34;https://es.wikipedia.org/wiki/Vampirismo&#34;&#62;vampirismo&#60;/a&#62;. El vampiro ha logrado conquistar la muerte, más que la &#60;a href=&#34;https://es.wikipedia.org/wiki/Inmortalidad&#34;&#62;inmortalidad&#60;/a&#62;, puesto que está condenado a vivir casi como un &#60;a href=&#34;https://es.wikipedia.org/wiki/Fantasma&#34;&#62;espectro&#60;/a&#62;. El término vampiro es &#60;a href=&#34;https://es.wikipedia.org/wiki/Lenguas_eslavas&#34;&#62;eslavo&#60;/a&#62;: proviene del &#60;a href=&#34;https://es.wikipedia.org/wiki/Idioma_serbio&#34;&#62;serbio&#60;/a&#62; &#34;vampir&#34; y del &#60;a href=&#34;https://es.wikipedia.org/wiki/Idioma_ruso&#34;&#62;ruso&#60;/a&#62; &#34;upir&#34;. No existe en rumano una palabra para designar al vampiro. Algunos traducen el término rumano &#34;strigoi&#34; como vampiro, pero este vocablo se refiere a una &#60;a href=&#34;https://es.wikipedia.org/wiki/Bruja&#34;&#62;bruja&#60;/a&#62; o a un &#60;a href=&#34;https://es.wikipedia.org/wiki/Fantasma&#34;&#62;espectro&#60;/a&#62;. Algunos dicen que &#34;nosferatu&#34; es la palabra rumana que significa &#34;vampiro&#34;; pero, según otros, en realidad proviene del &#60;a href=&#34;https://es.wikipedia.org/wiki/Griego_cl%C3%A1sico&#34;&#62;griego&#60;/a&#62; &#34;nosophoro&#34;, que significa &#34;portador del mal&#34;; según otros más, la escritora Emily Gerard confundió dos palabras usadas en Transilvania para referirse a &#60;a href=&#34;https://es.wikipedia.org/wiki/Criatura&#34;&#62;criaturas&#60;/a&#62; o &#60;a href=&#34;https://es.wikipedia.org/wiki/Ser_espiritual&#34;&#62;espíritus&#60;/a&#62; malignos de tal suerte que ofreció el híbrido &#34;nosferatu&#34;, que nada significaba. La verdad es que la tradición europea de los vampiros como los que aparecen en la novela ni siquiera proviene de Transilvania, sino principalmente de &#60;a href=&#34;https://es.wikipedia.org/wiki/Hungr%C3%ADa&#34;&#62;Hungría&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Serbia&#34;&#62;Serbia&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Moldavia&#34;&#62;Moldavia&#60;/a&#62; y los países &#60;a href=&#34;https://es.wikipedia.org/wiki/Eslavos&#34;&#62;eslavos&#60;/a&#62;. El vampiro es conocido «en todos los lugares en que ha existido el hombre», le hace decir Stoker a su personaje, el doctor V&#60;a href=&#34;https://es.wikipedia.org/wiki/Abraham_van_Helsing&#34;&#62;an Helsing&#60;/a&#62;, un médico experto en enfermedades oscuras. «Ha seguido el rastro del &#60;a href=&#34;https://es.wikipedia.org/wiki/Berserker&#34;&#62;berserker&#60;/a&#62; &#60;a href=&#34;https://es.wikipedia.org/wiki/Islandia&#34;&#62;islandés&#60;/a&#62;, del &#60;a href=&#34;https://es.wikipedia.org/wiki/Huno&#34;&#62;huno&#60;/a&#62; (engendrado por el &#60;a href=&#34;https://es.wikipedia.org/wiki/Diablo&#34;&#62;diablo&#60;/a&#62;), del &#60;a href=&#34;https://es.wikipedia.org/wiki/Lenguas_eslavas&#34;&#62;eslavo&#60;/a&#62;, del &#60;a href=&#34;https://es.wikipedia.org/wiki/Saj%C3%B3n_antiguo&#34;&#62;sajón&#60;/a&#62;, del &#60;a href=&#34;https://es.wikipedia.org/wiki/Magiares&#34;&#62;magiar&#60;/a&#62;».&#60;/p&#62;&#60;p&#62;En las primeras páginas de su novela, Stoker insinúa la &#60;a href=&#34;https://es.wikipedia.org/wiki/Seducci%C3%B3n&#34;&#62;seducción&#60;/a&#62; horrorosa del vampiro. En un castillo decadente, rodeado de un paisaje invernal y solitario, un hombre cultivado, &#60;a href=&#34;https://es.wikipedia.org/wiki/Aristocracia&#34;&#62;aristocrático&#60;/a&#62; y atemorizante acaba de franquear la entrada a un joven inglés con la frase clave: «Entre usted libremente y por su propia voluntad».&#60;/p&#62;&#60;p&#62;El conde Drácula no refleja su imagen en los &#60;a href=&#34;https://es.wikipedia.org/wiki/Espejos&#34;&#62;espejos&#60;/a&#62;, y por eso en su castillo no hay ninguno; Jonathan se dio cuenta de esa extraña propiedad del conde en su propio espejo. Y es que la &#60;a href=&#34;https://es.wikipedia.org/wiki/Superstici%C3%B3n&#34;&#62;superstición&#60;/a&#62; decía que el vampiro había perdido su &#60;a href=&#34;https://es.wikipedia.org/wiki/Alma&#34;&#62;alma&#60;/a&#62; (las antiguas culturas relacionan la imagen reflejada con el &#60;a href=&#34;https://es.wikipedia.org/wiki/Ser_espiritual&#34;&#62;espíritu&#60;/a&#62;). Drácula es &#60;a href=&#34;https://es.wikipedia.org/wiki/Peligroso&#34;&#62;peligroso&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Repugnante&#34;&#62;repugnante&#60;/a&#62; y veladamente sensual. Pronto se verá que convive con tres jóvenes vampiresas de figura voluptuosa. Esta imagen del vampiro no es un invento de Stoker: se había desarrollado ampliamente con anterioridad, desde la publicación del relato &#60;a href=&#34;https://es.wikipedia.org/wiki/El_vampiro_(1819)&#34;&#62;&#60;i&#62;El vampiro&#60;/i&#62;&#60;/a&#62; de &#60;a href=&#34;https://es.wikipedia.org/wiki/Polidori&#34;&#62;Polidori&#60;/a&#62; en &#60;a href=&#34;https://es.wikipedia.org/wiki/1816&#34;&#62;1816&#60;/a&#62; hasta la publicación de &#60;a href=&#34;https://es.wikipedia.org/wiki/La_buena_Lady_Ducayne&#34;&#62;&#60;i&#62;La buena Lady Ducayne&#60;/i&#62;&#60;/a&#62;: esta última obra, en &#60;a href=&#34;https://es.wikipedia.org/wiki/1896&#34;&#62;1896&#60;/a&#62;, un año antes de la publicación de &#34;Drácula&#34;. El vampiro había tomado varios nombres: Lord Ruthven, Lord Seymour, sir Francis Varney; y había tenido muchos éxitos en todas &#60;a href=&#34;https://es.wikipedia.org/wiki/Europa&#34;&#62;Europa&#60;/a&#62; en espectáculos de &#60;a href=&#34;https://es.wikipedia.org/wiki/Circo&#34;&#62;circo&#60;/a&#62;, obras de &#60;a href=&#34;https://es.wikipedia.org/wiki/Teatro&#34;&#62;teatro&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Melodrama&#34;&#62;melodramas&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/%C3%93pera&#34;&#62;óperas&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Novela&#34;&#62;novelas&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Cuento&#34;&#62;cuentos&#60;/a&#62; y &#60;a href=&#34;https://es.wikipedia.org/wiki/Follet%C3%ADn&#34;&#62;folletines&#60;/a&#62;.&#60;/p&#62;&#60;p&#62;Mediante los diarios que escriben los personajes principales (excepto el propio Drácula), cartas que se intercambian, telegramas, noticias de prensa, &#60;a href=&#34;https://es.wikipedia.org/wiki/Albar%C3%A1n&#34;&#62;albaranes&#60;/a&#62; y facturas, Stoker desarrolla una historia, con pequeños saltos en el tiempo, en la que se revela la desmesurada ambición de poder de Drácula, quien se traslada a Londres y mueve ejércitos de ratas, niebla, lobos, murciélagos y tormentas para lograr su objetivo.&#60;/p&#62;&#60;p&#62;Stoker conocía los detalles de la superstición y atribuye a Drácula los rasgos peculiares del vampiro, tales como:&#60;/p&#62;&#60;ul&#62;&#60;li&#62;Lograr obediencia de seres repulsivos, como las &#60;a href=&#34;https://es.wikipedia.org/wiki/Rata&#34;&#62;ratas&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Mosca&#34;&#62;moscas&#60;/a&#62;, &#60;a href=&#34;https://es.wikipedia.org/wiki/Ara%C3%B1as&#34;&#62;arañas&#60;/a&#62; y los &#60;a href=&#34;https://es.wikipedia.org/wiki/Murci%C3%A9lagos&#34;&#62;murciélagos&#60;/a&#62;, pero también de los &#60;a href=&#34;https://es.wikipedia.org/wiki/Canis_lupus&#34;&#62;lobos&#60;/a&#62;, los &#60;a href=&#34;https://es.wikipedia.org/wiki/Dingo&#34;&#62;dingos&#60;/a&#62; y los &#60;a href=&#34;https://es.wikipedia.org/wiki/Vulpini&#34;&#62;zorros&#60;/a&#62;.&#60;/li&#62;&#60;li&#62;&#60;a href=&#34;https://es.wikipedia.org/wiki/Telepat%C3%ADa&#34;&#62;Telepatía&#60;/a&#62;, control mental.&#60;/li&#62;&#60;li&#62;Fuerza sobrehumana.&#60;/li&#62;&#60;li&#62;Convertirse en animal o en &#60;a href=&#34;https://es.wikipedia.org/wiki/Niebla&#34;&#62;niebla&#60;/a&#62;.&#60;/li&#62;&#60;li&#62;Perder facultades durante el día, el amanecer y el atardecer. El vampiro huye de la luz diurna, que lo destruye&#60;/li&#62;&#60;li&#62;Dormir sobre tierra, traída de su lugar natal, en el interior de un &#60;a href=&#34;https://es.wikipedia.org/wiki/F%C3%A9retro&#34;&#62;féretro&#60;/a&#62;.&#60;/li&#62;&#60;li&#62;Beber &#60;a href=&#34;https://es.wikipedia.org/wiki/Sangre&#34;&#62;sangre&#60;/a&#62; humana (su único alimento) y convertir en vampiros a quienes aseste su mordedura fatídica y bautice con su propia sangre haciéndoles beberla. Si únicamente son mordidos, no se transforman en vampiros.&#60;/li&#62;&#60;li&#62;Aversión a los &#60;a href=&#34;https://es.wikipedia.org/wiki/Crucifijo&#34;&#62;crucifijos&#60;/a&#62;, ristras o flores de &#60;a href=&#34;https://es.wikipedia.org/wiki/Ajo&#34;&#62;ajo&#60;/a&#62;, la &#60;a href=&#34;https://es.wikipedia.org/wiki/Hostia_consagrada&#34;&#62;Sagrada Forma&#60;/a&#62; consagrada y &#60;a href=&#34;https://es.wikipedia.org/wiki/Agua_bendita&#34;&#62;agua bendita&#60;/a&#62;, elementos que le pueden mantener alejado; pero para que muera realmente, se le ha de clavar una estaca en el corazón o se lo ha de &#60;a href=&#34;https://es.wikipedia.org/wiki/Decapitar&#34;&#62;decapitar&#60;/a&#62;.&#60;/li&#62;&#60;li&#62;También &#60;a href=&#34;https://es.wikipedia.org/wiki/Abraham_van_Helsing&#34;&#62;Van Helsing&#60;/a&#62; menciona que si, cuando está dentro del féretro, se coloca una rosa sobre la tapa del mismo no podrá salir; aunque Harker y sus colegas no tienen ocasión de hacerlo.&#60;/li&#62;&#60;/ul&#62;&#60;p&#62;El Drácula de Stoker tiene todos los elementos de los vampiros que lo precedieron, más algunas características tomadas del &#60;a href=&#34;https://es.wikipedia.org/wiki/Hombre_lobo&#34;&#62;hombre lobo&#60;/a&#62;, cuya historia había sido publicada poco antes.&#60;/p&#62;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasena`, `nombre`, `apellidos`) VALUES
(1, 'admin@gmail.com', '$2y$10$uD81nk2SL1d6NVB.oypmIOupRC.k9MBAos9Vy6meWSo3hmg2yx4fm', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
