CREATE TABLE `Rol` (
  `idRol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `Usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `contrasenya` varchar(100) NOT NULL,
  `codigoRegistro` varchar(15) NOT NULL,
  `confirmado` tinyint NOT NULL,
  `idRol` int NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `codigoRegistro_UNIQUE` (`codigoRegistro`),
  KEY `fk_Usuario_Rol_idx` (`idRol`),
  CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `Rol` (`idRol`) ON DELETE RESTRICT ON UPDATE CASCADE
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci; 

CREATE TABLE `Marca` (
  `idMarca` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  PRIMARY KEY (`idMarca`)
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `Modelo` (
  `idModelo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(4000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precioHora` float NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `idMarca` int NOT NULL,
  PRIMARY KEY (`idModelo`),
  KEY `fk_Modelo_Marca_idx` (`idMarca`),
  CONSTRAINT `fk_Modelo_Marca` FOREIGN KEY (`idMarca`) REFERENCES `Marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci; 

CREATE TABLE `Patin` (
  `idPatin` int NOT NULL AUTO_INCREMENT,
  `idMarca` int NOT NULL,
  `idModelo` int NOT NULL,
  PRIMARY KEY (`idPatin`),
  KEY `fk_Patin_Marca_idx` (`idMarca`),
  KEY `fk_Patin_Modelo_idx` (`idModelo`),
  CONSTRAINT `fk_Patin_Marca` FOREIGN KEY (`idMarca`) REFERENCES `Marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Patin_Modelo` FOREIGN KEY (`idModelo`) REFERENCES `Modelo` (`idModelo`) ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci; 

CREATE TABLE `Servicio` (
  `idServicio` varchar(20) NOT NULL,
  `totalPrecio` float NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFinal` time NOT NULL,
  `idUsuario` int NOT NULL,
  `idPatin` int DEFAULT NULL,
  PRIMARY KEY (`idServicio`),
  UNIQUE KEY `idServicio_UNIQUE` (`idServicio`),
  KEY `fk_Servicio_Usuario_idx` (`idUsuario`),
  KEY `fk_Servicio_Patin_idx` (`idPatin`),
  CONSTRAINT `fk_Servicio_Patin` FOREIGN KEY (`idPatin`) REFERENCES `Patin` (`idPatin`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `fk_Servicio_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci; 

INSERT INTO Rol (nombre) VALUES ("admin");
INSERT INTO Rol (nombre) VALUES ("usuario");

INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user1@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","abc001",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user2@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","f5fcag",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user3@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","dfc121",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user4@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","7uhvda",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user5@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","bvcxs1",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user6@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","01234g",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user7@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","hgfdsa",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user8@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","12dsa31",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user9@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","abc12u",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user10@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","abf123",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user11@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","12c123",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user12@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","zdc1d2",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user13@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","cjb12n",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user14@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","43vc2s",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user15@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","a3c123",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user16@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","1ybc123",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user17@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","abc241",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user18@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","cba123",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user19@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","123gfa",0,2);
INSERT INTO Usuario (nombre,apellidos,telefono,email,fechaRegistro,contrasenya,codigoRegistro,confirmado,idRol) VALUES ("User","Example","987654321","user20@gmail.com","2022-05-11","$2y$10$2i.PfgGXm7uKJYErWlrkSuysGuiXzTKHBrjqwj61CGWuwaGMUC9HC","fdcxaz",0,2);
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Razor","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("HomCom","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Xiaomi","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Hiboy","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("ZWHEEL","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Segway","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Cecotec","2022-05-12");
INSERT INTO Marca (nombre,fechaRegistro) VALUES ("Smartgyro","2022-05-12");
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca) VALUES ("Power Core E90","Gracias a la larga duración de su batería, de 12 V, el Razor E90 está pensado para aguantarle el ritmo al niño más hiperactivo, a partir de ocho años.Hasta 80 minutos de uso continuo, que en la práctica suponen una tarde completa en el parque con la batería operativa. Es uno de los rasgos más valorados por los usuarios, que también aprecian el hecho de que, si la energía se acaba, se puede seguir usando como un patinete normal.Al estar enfocado al mercado infantil, el uso de este modelo de Razor es sencillo e intuitivo. El arranque es mediante una patada inicial, la aceleración se controla con un botón situado en el manillar y cuenta, como toque extra, con un freno trasero en el pie, muy útil en caso de emergencia.La amortiguación es escasa, pero para un usuario de corta edad notar las irregularidades del terreno es hasta entretenido; y su planteamiento es urbano, es decir, para uso en asfalto o, como mucho, pista de tierra en un parque.Las ruedas, de uretano, pueden resultar un poco ruidosas dependiendo del terreno. La velocidad llega hasta casi 15 km/hora, con un reprise al que es necesario acostumbrarse, sobre todo en arranque. El motor de cubo es eficiente y no necesita apenas mantenimiento. El Razor E90 necesita montaje parcial, muy sencillo, y la pata de cabra no es plegable. Si se quiere guardar en el coche o en un espacio pequeño, hay que desmontar la horquilla.El componente principal de este Razor E90 es el acero, lo que quizá aumenta un poco el peso, pero garantiza la dureza y durabilidad de un dispositivo que previsiblemente va a ser “maltratado” por su dueño. Un patinete duro, firme y estable, que contenta a niños y padres.","marca1modelo1.jpg",7.50,"2022-05-12",1);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca) VALUES ("Plegable","HomCom es una marca de origen chino con distribución internacional, especializada en accesorios para el hogar. Aunque a priori un scooter no entra en esta categoría, sus patinetes suelen estar en la lista de los más vendidos, quizá porque su planteamiento es más doméstico que otra cosa. Es decir, los patinetes HomCom están más pensados para ocio que como medio de transporte.
Es el caso de este modelo: se trata de un patín que pueden usar niños a partir de 7 años, lo que se nota en el peso máximo que aguanta (50 kg) y en la baja potencia de su motor (120W). Por lógica, si eres un adulto dentro del peso recomendado también puedes usarlo, aunque probablemente tengas que “pelear” con los niños de la casa para que te lo dejen.
Si tu objetivo es evitar el uso de otros vehículos, es posible que las prestaciones se te queden cortas con el tiempo. Sobre todo porque la potencia se queda justa en las cuestas, si el conductor ronda el peso máximo. Aún así, para desplazamientos cortos que se ajusten a las características técnicas, el funcionamiento es correcto.En este HomCom la conducción es similar a la de una moto, es decir, girando el puño. Y el freno es tipo bicicleta, con una manilla que aprietas de forma instintiva cuando lo necesites.","marca2modelo2.jpg",6,"2022-05-12",2);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca) VALUES ("MI Electric Scooter Essential","Xiaomi es uno de los fabricantes de dispositivos eléctricos que más está creciendo en China, y que se encuentra en plena expansión en el mercado occidental.El Mi Electric Scooter Essential es el modelo más básico de este patinete eléctrico y ha despertado expectación entre los aficionados a este tipo de dispositivos, por la calidad de sus prestaciones a un precio sorprendentemente bueno. Puedes ver una comparativa con cada patinete Xiaomi que ha lanzado hasta el día de hoy el fabricante chino.La solidez de los acabados es una de las primeras cosas que sorprenden agradablemente, pero eso no es todo: poco a poco vamos descubriendo las muchas posibilidades de uso de este scooter eléctrico, que soporta un uso bastante intensivo pensado para trayectos medios.Gracias a una potencia de 500 W en la rueda trasera, consigue una velocidad máxima de hasta 20 km/h para un peso de 60 kg. Tiene además el modo peatonal a 5 km/h y el modo estándar, que alcanza los 15 km/h.Dispone de un sistema de recuperación de energía cinética, que se transforma en eléctrica al modo de las dinamos tradicionales para aumentar la vida de la batería. Otra de las ventajas es el tiempo de carga de la batería, de 42 V: cinco horas y media desde cero, algo más de tres horas partiendo de un 25%.","marca3modelo3.jpg",8.50,"2022-05-12",3);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES ("S2 Lite","El Hiboy S2 Lite es, como su propio nombre indica, pequeño en tamaño, aunque grande en prestaciones.
Lo hemos probado y nos parece ideal para usuarios jóvenes, aunque el fabricante también lo recomienda para adultos siempre y cuando no superen los 80kilos de peso.
El motor de 250 W nos ofrece una velocidad máxima de 21 km/h. Más que suficiente para desplazamientos cortos, y más si tenemos en cuenta que el conductor es novel, como, por ejemplo, un adolescente.
Sus ruedas tienen un tamaño de 6,5” y resultan buenas para asfalto. Son muy sólidas y antipinchazos, por lo que no es necesario zigzaguear para evitar las piedras u otros obstáculos punzantes que puedan aparecer durante el recorrido.
A pesar de que no dispone de amortiguadores, y esto evidentemente hace un poco más dura su conducción, quienes no hayan tenido antes un patinete no van a notarlo.
Nos agrada mucho su diseño ligero y futurista, con un peso muy manejable de solo 9,5 kilos. Está repleto de luces LED en el manillar y en la plataforma, una buena luz frontal y otra trasera que se activa al presionar el freno. Además, incorpora timbre.
Lógicamente, tal despliegue luminoso consume bastante batería, y esto disminuye su autonomía hasta los 17 km. A su favor, cabe mencionar que en 3-5 horas completa la carga para disfrutarlo de nuevo.
El plegado resulta fácil, con bloqueo de seguridad para mantenerlo cerrado durante cualquier desplazamiento.","marca4modelo4.jpg",5.50,"2022-05-12",4);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES ("E9 Basic","El ZWHEEL E9 Basic es un patinete eléctrico para quienes buscan potencia y tranquilidad para recorridos que no sean excesivamente largos.
Hay 3 características del apartado de mecánica que nos han gustado especialmente:
 Su motor de 300W es solvente, siendo capaz de alcanzar los 25 kilómetros por hora que marca la ley como velocidad máxima.
Que tenga ruedas macizas da mucha confianza frente a los clásicos neumáticos, ya que no tendrás que preocuparte por pinchazos o mantenerlas a punto.
Su freno de disco es una garantía si necesitas detener el patinete rápido.
Lo que no nos ha gustado tanto es que está recomendado para subir pendientes de 10º, algo menos de lo habitual, lo que no es necesariamente un problema si vives en ciudades sin grandes desniveles. Pero echarás en falta algo de punch en las cuestas.
Si te gustan las cosas fáciles y claras, agradecerás que solo tenga 2 modos de conducción:
El modo Eco alcanza hasta 20 km/h y te permitirá moverte a una velocidad suficiente para optimizar su batería.
 Si quieres llegar antes, exprime su motor y alcanza los 25 km/h activando el modo Sport.
","marca5modelo5.jpg",6.2,"2022-05-12",5);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES  ("Ninebot Kickscooter E22E","Seguramente Segway te suene de esos vehículos eléctricos, con dos grandes ruedas, que nacieron para revolucionar el transporte urbano y se han quedado como un reclamo para turistas. Sin embargo, hay que reconocerles el mérito: sin su trabajo, probablemente hoy no sería tan habitual ver patinetes eléctricos en la ciudad.El principio, desde luego, es el mismo: ofrecer un modo de transporte ecológico, silencioso y muy práctico para recorrer distancias cortas.De la unión de otra empresa clásica, Ninebot (en la que Xiaomi también tiene una parte) con Segway nos llega este Ninebot Kickscooter E22E, un patinete robusto, de funcionamiento impecable y a un precio bastante competitivo.Se pliega muy fácilmente (basta con un toque de pie) y es manejable. Ten cuenta que pesa 13,5 kg, que se notan si vas a tener que cargar con él a menudo. Con todo, su aspecto es minimalista gracias al buen hacer en el apartado de diseño, integrando algunos de sus componentes principales en la estructura.Cuenta con un motor de 300 vatios capaz de subir cuestas de hasta 15% de inclinación situado en una rueda. Tampoco verás su batería, integrada dentro del tubo delantero y no en la base como en otros modelos, así que no hay ningún cable a la vista. Usando una velocidad media (la máxima es de 5 km/hora), ofrece una autonomía aproximada de 22 kilómetros.","marca6modelo6.jpg",9,"2022-05-12",6);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES  ("Bongo Serie A","El Cecotec Bongo Serie A es la versión más popular de su catálogo, y la comparación con el Xiaomi Mijia M365 (o Mi Scooter) es inevitable.¿Cuáles son los principales pros y contras de uno y otro? Lo cierto es que ambos tienen características similares en precio y prestaciones, con pequeñas diferencias en el tiempo de carga o en el peso máximo, pero nada que nos haga inclinar la balanza por uno u otro.Si entramos más a fondo, el Cecotec tiene una impresionante potencia de 700 W (frente a los 250W del Xiaomi) algo que valoraremos especialmente en ciudades con cuestas. A cambio, el Mijia tiene muchas más posibilidades de programación y conectividad, además de cinco modos de conducción frente a los tres del Outsider.Pero lo que más llama la atención del Cecotec es la posibilidad de cambiar la batería sobre la marcha","marca7modelo7.jpg",7.5,"2022-05-12",7);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES  ("Mi Electric Scooter 1S","El nuevo Xiaomi Mi Electric Scooter 1S es la versión renovada y mejorada del M365, todo un éxito en ventas a nivel internacional.¿El motivo? La relación calidad-precio de este VMP firmado por la multinacional china ofrece un amplio desempeño a un precio muy competitivo.Continúa destacando su comportamiento en trayectos medios. El motor brushless con potencia de 500 W en la rueda trasera consigue una más que correcta velocidad máxima de hasta 25 km/h.Dispone de un sistema de recuperación de energía cinética que se transforma en eléctrica al modo de las dinamos tradicionales. Así aumenta la vida de la batería, por lo que con una conducción adecuada alcanza una autonomía de 30 km.Otra de las nuevas ventajas es el tiempo de carga: cinco horas y media desde cero y algo más de tres horas partiendo de un 25%.","marca3modelo8.jpg",9.7,"2022-05-12",3);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES  ("Outsider Demigod Makalu","Potente, robusto, fiable: el Outsider DemiGod Makalu de la marca española Cecotec es una apuesta firme por el patinete como medio de transporte.Efectivamente, aquí nos olvidamos del patinete como juguete para dar una vuelta: el DemiGod Makalu es un scooter en toda la regla. Algo que vamos a notar en el precio -ya avisamos de que no es barato- y en las prestaciones, que pueden competir perfectamente con una moto tradicional.Para empezar, el aspecto ya nos da una idea de que estamos ante un vehículo todo terreno. Impresionan los grandes neumáticos antipinchazos con tacos XL para movernos en cualquier tipo de suelo, ya sea asfalto o pista. La tabla también es extra grande, un tamaño pensado para poner los pies en paralelo y conseguir la máxima estabilidad.
Tiene amortiguación hidráulica, y una excelente potencia de frenada. El encendido se hace mediante llave, y la conducción es similar a la de una moto, con aceleración y freno en el manillar.","marca7modelo9.jpg",11.5,"2022-05-12",7);
INSERT INTO Modelo (nombre,descripcion,imagen,precioHora,fechaRegistro,idMarca)VALUES  ("Xtreme SpeedWay V2.0","Si estás buscando un patinete eléctrico versátil y que se comporte con máxima solvencia,el SMARTGYRO Xtreme SpeedWay V2.0 puede ser una buena elección.Estamos empezando a confiar en el producto tecnológico nacional, y una muestra de ello es la estupenda acogida en el mercado que ha tenido este modelo.Examinando las prestaciones que nos ofrece el Smartgyro observamos que puede cumplir las expectativas de los conductores de VMP más exigentes.Detalles por doquier como la doble suspensión reforzada, los frenos de disco, cuatro intermitentes, el manillar ajustable e incluso los neumáticos de 10”, convierten a este patinete en un bestseller en 2022.Posee un potente motor de 800 W, que cómo ya imaginas, sube las cuestas sin despeinarse. Con una única carga de entre 6-7 horas, permite recorrer hasta 45 km en modo eco. Una gran autonomía con la que podrás olvidarte de cargarlo a diario.","marca8modelo10.jpg",8.5,"2022-05-12",8);
INSERT INTO Patin (idMarca,idModelo) VALUES (1,1);
INSERT INTO Patin (idMarca,idModelo) VALUES (2,2);
INSERT INTO Patin (idMarca,idModelo) VALUES (3,3);
INSERT INTO Patin (idMarca,idModelo) VALUES (3,8);
INSERT INTO Patin (idMarca,idModelo) VALUES (4,4);
INSERT INTO Patin (idMarca,idModelo) VALUES (5,5);
INSERT INTO Patin (idMarca,idModelo) VALUES (6,6);
INSERT INTO Patin (idMarca,idModelo) VALUES (7,7);
INSERT INTO Patin (idMarca,idModelo) VALUES (7,9);
INSERT INTO Patin (idMarca,idModelo) VALUES (8,10);

INSERT INTO Patin (idMarca,idModelo) VALUES (1,1);
INSERT INTO Patin (idMarca,idModelo) VALUES (2,2);
INSERT INTO Patin (idMarca,idModelo) VALUES (3,3);
INSERT INTO Patin (idMarca,idModelo) VALUES (3,8);
INSERT INTO Patin (idMarca,idModelo) VALUES (4,4);
INSERT INTO Patin (idMarca,idModelo) VALUES (5,5);
INSERT INTO Patin (idMarca,idModelo) VALUES (6,6);
INSERT INTO Patin (idMarca,idModelo) VALUES (7,7);
INSERT INTO Patin (idMarca,idModelo) VALUES (7,9);
INSERT INTO Patin (idMarca,idModelo) VALUES (8,10);
