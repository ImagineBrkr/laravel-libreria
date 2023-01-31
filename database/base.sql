DROP DATABASE IF EXISTS datos;
CREATE DATABASE datos;
USE datos;

CREATE TABLE autores (
	idAutor INT AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	biografia VARCHAR(2000) NOT NULL,
	imagen VARCHAR(20) NOT NULL,
	PRIMARY KEY(idAutor)
);

CREATE TABLE libros (
	idLibro INT AUTO_INCREMENT NOT NULL,
	titulo VARCHAR(50) NOT NULL,
	idAutor INT NOT NULL,
	descripcion VARCHAR(1000) NOT NULL,
	precio DECIMAL(10,2) NOT NULL,
	imagen VARCHAR(20) NOT NULL,
	PRIMARY KEY(idlibro),
	FOREIGN KEY(idAutor) REFERENCES autores(idAutor)
);

CREATE TABLE tiposUsuario (
	idTipoUsuario INT AUTO_INCREMENT NOT NULL,
	tipo VARCHAR(30),
	PRIMARY KEY(idTipoUsuario)
);

CREATE TABLE usuarios (
	idUsuario INT AUTO_INCREMENT NOT NULL,
	usuario VARCHAR(25) NOT NULL,
	email VARCHAR(50) NOT NULL,
	contraseña VARCHAR(25) NOT NULL,
	saldo DECIMAL(10,2) NOT NULL,
	idTipoUsuario INT NOT NULL,
	PRIMARY KEY(idUsuario),
	FOREIGN KEY(idTipoUsuario) REFERENCES tiposUsuario(idTipoUsuario)	 
);

CREATE TABLE compras (
	idCompra INT AUTO_INCREMENT NOT NULL,
	idUsuario INT NOT NULL,
	idLibro INT NOT NULL,
	fechaCompra DATE NOT NULL,
	PRIMARY KEY(idCompra),
	FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario),
	FOREIGN KEY(idLibro) REFERENCES libros(idLibro)
);

CREATE TABLE deseados (
	idDeseado INT AUTO_INCREMENT NOT NULL,
	idUsuario INT NOT NULL,
	idLibro INT NOT NULL,
	fechaAgregado DATE NOT NULL,
	PRIMARY KEY(idDeseado),
	FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario),
	FOREIGN KEY(idLibro) REFERENCES libros(idLibro)
);

CREATE TABLE comentarios (
	idComentario INT AUTO_INCREMENT NOT NULL,
	idLibro INT NOT NULL,
	apodo VARCHAR(50) NOT NULL,
	comentario VARCHAR(200) NOT NULL,
	nota INTEGER NOT NULL,
	PRIMARY KEY (idComentario),
	FOREIGN KEY (idLibro) REFERENCES libros(idLibro)
);

INSERT INTO autores(nombre, biografia, imagen) VALUES('George Orwell', '<p>Eric Arthur Blair (Motihari, Raj Británico, 25 de junio de 1903-Londres, Reino Unido, 21 de enero de 1950),1​ más conocido por el pseudónimo de George Orwell, fue un escritor y periodista británico.</p>
<p>Su obra lleva la marca de las experiencias personales vividas por el autor en tres etapas de su vida: su posición en contra del imperialismo británico que lo llevó al compromiso como representante de las fuerzas del orden colonial en Birmania durante su juventud; a favor del socialismo democrático, después de haber observado y sufrido las condiciones de vida de las clases sociales de los trabajadores de Londres y París; y en contra de los totalitarismos nazi y estalinista tras su participación en la guerra civil española. </p>
<p>Además de cronista, crítico de literatura y novelista, es uno de los ensayistas en lengua inglesa más destacados de las décadas de 1930 y de 1940. Sin embargo, es más conocido por sus críticas al totalitarismo en su novela corta alegórica Rebelión en la granja (1945) y su novela distópica 1984 (1949), escrita en sus últimos años de vida y publicada poco antes de su fallecimiento, y en la que crea el concepto de «Gran Hermano», que desde entonces pasó al lenguaje común de la crítica de las técnicas modernas de vigilancia. </p>
<p>El adjetivo «orwelliano» es frecuentemente utilizado en referencia al distópico universo totalitarista imaginado por el escritor británico.</p>', 'autor1.jpg'),
('Fiodor Dostoievski', '<p>Fiódor Mijáilovich Dostoyevski (en ruso, Фёдор Миха́йлович Достое́вский; Moscú, 11 de noviembre de 1821 – San Petersburgo, 9 de febrero de 1881) fue uno de los principales escritores de la Rusia zarista, cuya literatura explora la psicología humana en el complejo contexto político, social y espiritual de la sociedad rusa del siglo xix.</p>
<p>Es considerado uno de los más grandes escritores de Occidente y de la literatura universal. De él dijo Friedrich Nietzsche: «Dostoyevski, el único psicólogo, por cierto, del cual se podía aprender algo, es uno de los accidentes más felices de mi vida».​ Y José Ortega y Gasset escribió: «En tanto que otros grandes declinan, arrastrados hacia el ocaso por la misteriosa resaca de los tiempos, Dostoyevski se ha instalado en lo más alto».​ </p>
<p>La obra de Dostoievski influyó en la literatura mundial, en particular en los ganadores del Premio Nobel de Literatura , los filósofos Friedrich Nietzsche y Jean-Paul Sartre, así como en la aparición del Existencialismo y el Freudismo.</p>', 'autor2.jpg'),
('Sofocles', '<p>Sófocles fue un autor de origen griego y uno de los mayores poetas clásicos de la antigüedad. </p>
<p>Aunque no existen muchos datos referentes a su bibliografía, de él se conservan obras que siguen representándose hoy día a nivel mundial.</p>
<p>Al autor se le asigna una extensa producción literaria, pero del más del centenar de tragedias que pudo dejar como legado, solo siete obras se mantienen completas en la actualidad. Asimismo, contribuyó al teatro de la época e introdujo elementos que vinieron a enriquecer y transformar el género.</p>
<p>Las obras de Sófocles se caracterizan por presentar un lenguaje doloroso. Asimismo, en sus tragedias los dioses aplican la justicia divina e influyen significativamente en el devenir del ser humano. El hombre está condenado a enfrentarse al destino y siempre pierde en la batalla.</p>
<p>Sófocles escribió entorno a 123 tragedias de las cuales solo se conservan 7 íntegras: Edipo rey, Antígona, Áyax, Las Traquinias, Electra, Filoctetes y Edipo en Colono.</p>', 'autor3.jpg'),
('Alejandro Dumas', '<p>Alexandre Dumas Davy de la Pailleterie (Villers-Cotterêts, 24 de julio de 1802-Puys, cerca de Dieppe, 5 de diciembre de 1870), más conocido como Alexandre Dumas, y en los países hispanohablantes como Alejandro Dumas, fue un novelista y dramaturgo francés.</p>
<p>Su hijo Alejandro Dumas fue también un escritor conocido. Las obras de Dumas padre han sido traducidas a casi cien idiomas y es uno de los franceses más leídos. Varias de sus novelas históricas de aventuras se publicaron en formato de series, como El conde de Montecristo, Los tres mosqueteros, Veinte años después y El vizconde de Bragelonne. Sus novelas han sido adaptadas desde principios del siglo xx en casi doscientas películas. Escritor prolífico en diversos géneros, comenzó su carrera escribiendo obras de teatro. Escribió artículos en revistas y libros de viaje. Sus trabajos suman casi 100 000 páginas. </p>
<p>A pesar de estar casado, y en consonancia con la tradición de los franceses de clase alta de la época, Dumas tuvo decenas de amantes y al menos cuatro hijos ilegítimos. Uno de ellos, Alejandro Dumas (hijo), llegó a ser también un escritor de gran renombre gracias en parte al apoyo de su padre. El dramaturgo inglés Watts Phillips, que conoció a Dumas al final de su vida, describió al escritor francés como «el ser humano más generoso y con el corazón más grande del mundo. Era la criatura más deliciosa y egoísta sobre la faz de la Tierra: su lengua era como un molino de viento, una vez que se ponía en marcha, nunca sabías cuando iba a parar, especialmente si el tema era él mismo».</p>', 'autor4.jpg'),
('J. D. Salinger', '<p>(Jerome David Salinger; Nueva York, 1919 - Cornish, New Hampshire, 2010) Escritor estadounidense. Empezó su carrera literaria en 1940, con la publicación en diversas revistas de su país de relatos y piezas teatrales, que había escrito durante una estancia en Europa. En 1942 se alistó en el ejército y participó en diversas acciones bélicas de la Segunda Guerra Mundial, entre ellas el desembarco de Normandía.  </p>
<p>Durante su época de combatiente inició la redacción de su obra más conocida, El guardián entre el centeno (1951), novela escrita desde el punto de vista de un adolescente enfrentado a la hipocresía del mundo adulto, y que contiene grandes dosis de ironía. La obra obtuvo un éxito espectacular y fue rápidamente traducida a diversos idiomas. Le siguieron algunos volúmenes de relatos (Fanny y Zooey, 1961; Levantad, carpinteros, la viga del tejado, 1963; Seymour: una introducción, 1963), escritos desde un buscado aislamiento en una granja, donde vivió junto con su esposa y sus hijos.</p>', 'autor5.jpg'),
('Ciro Alegría', '<p>Ciro Alegría Bazán, más conocido como Ciro Alegría (Sartimbamba, La Libertad, 4 de noviembre de 1909. </p>
<p>Chaclacayo, Lima, 17 de febrero de 1967) fue un escritor, político y periodista peruano. Es uno de los máximos representantes de la narrativa indigenista, marcada por la creciente conciencia sobre el problema de la opresión indígena y por el afán de dar a conocer esta situación, cuyas obras representativas son las llamadas “novelas de la tierra”. En ese sentido es autor de las siguientes novelas: La serpiente de oro (1935), Los perros hambrientos (1939) y El mundo es ancho y ajeno (1941), su obra cumbre y una de las novelas más notables de la literatura hispanoamericana, con numerosas ediciones y traducida a muchos idiomas. </p>
<p>Al margen de sus méritos literarios, se le recuerda por su calidad humana y su bonhomía, salpicada de un humor muy peculiar. Hijo de hacendados, desde pequeño interactuó con el personal a cargo de las actividades agrícolas. De ese recuerdo de su infancia y de los relatos que oyó entonces nacieron sus grandes novelas indigenistas. De sus padres recibió una educación liberal, que contrastaba con aquel ambiente en que creció. Ciro Alegría es uno de los representantes más destacados del Grupo Norte que surgiera en la primera mitad del siglo XX en la ciudad de Trujillo.</p>', 'autor6.jpg'),
('Gunter Grass', '<p>Günter Wilhelm Grass (Ciudad libre de Dánzig, actual Polonia, 16 de octubre de 1927-Lubeca, Alemania, 13 de abril de 2015)1​ fue un escritor y artista alemán, galardonado con el Premio Nobel de Literatura y el Premio Príncipe de Asturias de las Letras, en 1999.</p>
<p>Llamó poderosamente la atención su extensa novela El tambor de hojalata, de 1959, sobre la Alemania de su infancia y asimismo Años de perro de 1963. Desde entonces se convirtió en una de las voces narrativas más conocidas de su país por su tono ácido e implacable sobre el pasado inmediato.</p>
<p>En 1968 publicó en Berlín una colección de relatos cortos, Historias (Geschichten), bajo el pseudónimo de "Artur Knoff", utilizando el apellido de su madre.​ </p>
<p>Escribió luego El rodaballo (1977), novela que recoge sus saberes culinarios; un breve y denso Encuentro en Telgte (1981), sobre los escritores alemanes del barroco. Luego La Ratesa (1986) y tres libros sobre la historia de su país, que han tenido mucha resonancia: Es cuento largo (1996), sobre la caída del muro de Berlín, Mi siglo (1999), que va año a año por el siglo XX (y fue publicada en el año de su Nobel), y A paso de cangrejo (2002), pues "es necesario retroceder para avanzar, como los cangrejos", según dice Grass. En esta novela, A paso de cangrejo, recuerda el destino de millones de alemanes que fueron víctimas de la Segunda Guerra Mundial. La pieza central del libro es el hundimiento del barco MV Wilhelm Gustloff, el 30 de enero de 1945, con miles de refugiados de la Prusia Oriental a bordo; muchos de ellos, niños. </p>', 'autor7.jpg'),
('William Shakespeare', '<p>William Shakespeare fue un dramaturgo, poeta y actor inglés. Conocido en ocasiones como el Bardo de Avon (o simplemente el Bardo), Shakespeare es considerado el escritor más importante en lengua inglesa y uno de los más célebres de la literatura universal.​</p>
<p>Según la Encyclopædia Britannica, «Shakespeare es generalmente reconocido como el más grande de los escritores de todos los tiempos, figura única en la historia de la literatura. La fama de otros poetas, tales como Homero y Dante Alighieri, o de novelistas tales como León Tolstoy o Charles Dickens, ha trascendido las barreras nacionales, pero ninguno de ellos ha llegado a alcanzar la reputación de Shakespeare, cuyas obras hoy se leen y representan con mayor frecuencia y en más países que nunca. La profecía de uno de sus grandes contemporáneos, Ben Jonson, se ha cumplido por tanto: "Shakespeare no pertenece a una sola época sino a la eternidad"».​ </p>
<p>El crítico estadounidense Harold Bloom sitúa a Shakespeare junto a Dante Alighieri, en la cúspide de su «canon occidental»: «Ningún otro escritor ha tenido nunca tantos recursos lingüísticos como Shakespeare, tan profusos en Trabajos de amor perdidos que tenemos la impresión de que, de una vez por todas, se han alcanzado muchos de los límites del lenguaje. Sin embargo, la mayor originalidad de Shakespeare reside en la representación de personajes: Bottom es un melancólico triunfo; Shylock, un problema permanentemente equívoco para todos nosotros; pero sir John Falstaff es tan original y tan arrollador que, con él, Shakespeare da un giro de ciento ochenta grados a lo que es crear a un hombre por medio de palabras».</p>', 'autor8.jpg'),
('Edgar Allan Poe', '<p>Edgar Allan Poe (Boston, Estados Unidos, 19 de enero de 1809-Baltimore, Estados Unidos, 7 de octubre de 1849) fue un escritor, poeta, crítico y periodista romántico estadounidense, generalmente reconocido como uno de los maestros universales del relato corto, del cual fue uno de los primeros practicantes en su país. Fue renovador de la novela gótica, recordado especialmente por sus cuentos de terror. Considerado el inventor del relato detectivesco, contribuyó asimismo con varias obras al género emergente de la ciencia ficción.​ Por otra parte, fue el primer escritor estadounidense de renombre que intentó hacer de la escritura su modus vivendi, lo que tuvo para él lamentables consecuencias.​ </p>
<p>Fue bautizado como Edgar Poe en Boston, Massachusetts, y sus padres murieron cuando era niño. Fue recogido por un matrimonio adinerado de Richmond, Virginia, Frances y John Allan, aunque nunca fue adoptado oficialmente. Pasó un curso académico en la Universidad de Virginia y posteriormente se enroló, también por breve tiempo, en el ejército. Sus relaciones con los Allan se rompieron en esa época, debido a las continuas desavenencias con su padrastro, quien a menudo desoyó sus peticiones de ayuda y acabó desheredándolo. Su carrera literaria se inició con un libro de poemas, Tamerlane and Other Poems (1827).</p>', 'autor9.jpg'),
('Ricardo Palma', '<p>Ricardo Palma (Lima, 7 de febrero de 1833-Ib., 6 de octubre de 1919) fue un escritor romántico, costumbrista, tradicionalista, periodista y político peruano, famoso principalmente por sus relatos cortos de ficción histórica reunidos en el libro Tradiciones peruanas. Cultivó prácticamente todos los géneros: poesía, novela, drama, sátira, crítica, crónicas y ensayos de diversa índole. Sus hijos Clemente y Angélica siguieron sus pasos como escritores. En 1883, fue nombrado director de la Biblioteca Nacional. Su abnegada labor de reconstruir dicha institución (solicitó libros a distintos países) le valió el apelativo de "El Bibliotecario Mendigo". En 1892 representó al Perú en el cuarto centenario del Descubrimiento de América realizado en España. </p>
<p>Solo dos piezas de este periodo han sobrevivido: el drama Rodil (1851), redescubierdo cien años después de su publicación (Palma había destruido la mayoría de los ejemplares) y la comedia El santo de Panchita, que escribió junto con Manuel Ascencio Segura. </p>
<p>Su primer libro de prosa, Corona patriótica, apareció en 1853. Dos años más tarde sale Poesías y en 1865, Armonías. Libro de un desterrado. </p>
<p>Su obra poética no estuvo exenta de polémica: en 1890 publicó A San Martín, poema que provocó la protesta del gobierno chileno, que lo consideró ofensivo para su país. El último poemario de Palma, Filigranas. Aguinaldo a mis amigos, apareció dos años más tarde. En 1865, compiló la antología Lira americana. Colección de poesías de los mejores poetas del Perú, Chile y Bolivia.</p>', 'autor10.jpg');

INSERT INTO libros(titulo, idAutor, descripcion, imagen, precio) VALUES ('1984', '1', 'Publicada en 1949, la distopía de George Orwell es considerada por muchos una obra visionaria de los tiempos que nos ha tocado vivir. Aborda temas como la manipulación de la información, la vigilancia masiva (introdujo el concepto de El Gran Hermano que todo lo ve) y la represión política y social.', 'libro6.jpg', 25.99),
('Crimen y Castigo', '2', 'Crimen y castigo es una novela publicada en 1866. Es obra del escritor y periodista ruso Fiódor Dostoyevski. Relata la historia de un crimen cometido por el exestudiante Rodión Ramanovich Raskolnikov y sus consecuencias.', 'libro3.jpg', 15.99),
('Edipo Rey', '3', 'Edipo Rey de Sófocles es una de las obras clásicas del teatro griego, cuya importancia es capital para la civilización occidental. Además de constituir una pieza maestra desde el punto de vista teatral, Edipo Rey representa una serie de conflictos humanos y valores sociales que son considerados arquetípicos desde el punto de vista psicológico y sociológico.', 'libro8.jpg', 16.99),
('El Conde de Montecristo', '4', 'Esta obra se suele considerar como el mejor trabajo de Dumas, y a menudo se incluye en las listas de las mejores novelas de todos los tiempos. El libro se terminó de escribir en 1844, y fue publicado en una serie de 18 entregas, como folletín, durante los dos años siguientes.', 'libro10.jpg', 15.99),
('El guardián entre el centeno', '5', 'La novela cuenta la historia de Holden Caulfield, un joven neoyorquino de 16 años que acaba de ser expulsado de Pencey Prep, su escuela preparatoria. Está narrada en la voz de Holden, un joven que se ha caracterizado por tener malos resultados en sus estudios (ya había sido expulsado de varios colegios) y quien cree que la mayoría de la gente es «falsa», salvo algunas excepciones.', 'libro1.jpg', 15.99),
('El mundo es ancho y ajeno', '6', 'El mundo es ancho y ajeno es una novela del escritor peruano Ciro Alegría, publicada en 1941, considerada como una de las obras representativas de la literatura indigenista o regionalista, y la obra maestra de su autor.', 'libro5.jpg', 24.99),
('El tambor de hojalata', '7', 'Sus páginas relatan la vida de Oscar Matzerath, un niño que vive durante la época de la Segunda Guerra Mundial (1939 - 1945), en una narración con tintes macabros e infantiles. El libro narra los momentos decisivos en la vida de Oscar, que lo llevarán, a los 29 años de edad, a ser internado en un sanatorio psiquiátrico.', 'libro4.jpg', 20.99),
('Hamlet', '8', 'La tragedia de Hamlet, príncipe de Dinamarca es una tragedia del dramaturgo inglés William Shakespeare.​ Su autor probablemente basó Hamlet en dos fuentes: la leyenda de Amleth y una perdida obra isabelina conocida hoy como Ur-Hamlet o Hamlet original (hecho que se deduce de otros textos).', 'libro7.jpg', 18.99),
('Narraciones extraordinarias', '9', 'Este volumen recoge una adaptación de cuatro de sus relatos, representativos de ambos géneros. Por un lado," El escarabajo de oro" , una original historia de intriga, y, por otro, dos de sus relatos de terror más conocidos (" El corazón delator" y" El gato negro" ) junto a" Hop-Frog" , escrito el mismo año de su prematura y misteriosa muerte.', 'libro2.jpg', 15.99),
('Tradiciones peruanas', '10', 'Se trata de relatos cortos de ficción histórica que narran, de forma entretenida y con el lenguaje propio de la época, sucesos basados en hechos históricos de mayor o menor importancia, propios de la vida de las diferentes etapas que pasó la historia del Perú, sea como leyenda o explicando costumbres existentes.', 'libro9.jpg', 10.99);

INSERT INTO tiposUsuario(tipo) VALUES('Administrador'), ('Cliente');

INSERT INTO usuarios(usuario, email, contraseña, saldo, idTipoUsuario) VALUES('admin', 'admin_123@hotmail.com', '1234', 0, '1');

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerVentaPorLibro`(IN `idLibro` INT)
SELECT C.idCompra, U.usuario, C.fechaCompra FROM compras C JOIN libros L ON C.idLibro = L.idLibro JOIN usuarios U ON C.idUsuario = U.idUsuario WHERE C.idLibro = idLibro ORDER by C.fechaCompra$$
DELIMITER ;