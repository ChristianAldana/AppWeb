use ccr;

-- Ingresamos el nombre de las carreras -- 
INSERT INTO carrera (nombre) VALUES
('BACHILLERATO EN COMPUTACION'),
('MAGISTERIO INFANTIL INTERCULTURAL'),
('PERITO EN ADMINISTRACIÓN DE EMPRESAS'),
('SECRETARIADO BILINGÜE INGLÉS-ESPAÑOL');

-- Ingresamos los niveles para cada carrera-- 
INSERT INTO nivel (nivel) VALUES
('4to'),
('5to'),
('6to');


-- Ingresamos si el curso se esta impartiendo o no -- 
INSERT INTO estado (estado) VALUES
('Activo'),
('Inactivo'); 

-- Verificamos los ids de cada uno de los niveles -- 
SELECT id FROM nivel WHERE nivel = '4to';   -- Suponiendo que obtienes id = 1
SELECT id FROM nivel WHERE nivel = '5to';   -- Suponiendo que obtienes id = 2
SELECT id FROM nivel WHERE nivel = '6to';   -- Suponiendo que obtienes id = 3


-- Insertar cursos para 4to año de BACHILLERATO EN COMPUTACIÓN
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(1, 'Fundamentos de Programación I', 'Introducción a los conceptos básicos de programación.', 1, 1),
(1, 'Algoritmos Básicos', 'Desarrollo y comprensión de algoritmos básicos.', 1, 1),
(1, 'Matemáticas para Programadores', 'Conceptos matemáticos aplicados a la programación.', 1, 1),
(1, 'Estructuras de Datos I', 'Estudio de estructuras de datos fundamentales.', 1, 1),
(1, 'Introducción a las Bases de Datos', 'Fundamentos de bases de datos y su gestión.', 1, 1),
(1, 'Desarrollo Web I', 'Introducción al desarrollo web y sus tecnologías.', 1, 1),
(1, 'Sistemas Operativos I', 'Conceptos básicos de sistemas operativos.', 1, 1),
(1, 'Redes de Computadoras I', 'Fundamentos de redes y su funcionamiento.', 1, 1),
(1, 'Programación Orientada a Objetos I', 'Principios básicos de programación orientada a objetos.', 1, 1),
(1, 'Ingeniería de Software I', 'Introducción a la ingeniería de software y metodologías.', 1, 1),
(1, 'Seguridad en Redes', 'Fundamentos y técnicas de seguridad en redes.', 1, 1),
(1, 'Desarrollo de Aplicaciones de Escritorio', 'Creación de aplicaciones para sistemas operativos de escritorio.', 1, 1),
(1, 'Arquitectura de Software', 'Estudio de arquitecturas de software y diseño de sistemas.', 1, 1),
(1, 'Interacción Humano-Computadora', 'Principios y diseño de interfaces de usuario.', 1, 1),
(1, 'Computación en la Nube', 'Fundamentos y servicios de computación en la nube.', 1, 1),
(1, 'Desarrollo de APIs', 'Creación y gestión de interfaces de programación de aplicaciones.', 1, 1),
(1, 'Programación Funcional', 'Principios y técnicas de programación funcional.', 1, 1),
(1, 'Bases de Datos NoSQL', 'Introducción a bases de datos NoSQL y sus aplicaciones.', 1, 1),
(1, 'Computación Paralela y Distribuida', 'Conceptos y técnicas en computación paralela y distribuida.', 1, 1),
(1, 'Desarrollo de Software en Equipos', 'Metodologías y herramientas para el desarrollo de software en equipo.', 1, 1),
(1, 'Introducción a la Programación', 'Fundamentos básicos de programación en diversos lenguajes.', 1, 1),
(1, 'Desarrollo Web Frontend', 'Creación de interfaces de usuario para aplicaciones web.', 1, 1),
(1, 'Desarrollo Web Backend', 'Programación de servidores y bases de datos para aplicaciones web.', 1, 1),
(1, 'Programación de Sistemas Operativos', 'Desarrollo y manejo de sistemas operativos.', 1, 1),
(1, 'Algoritmos y Estructuras de Datos', 'Estudio de algoritmos y estructuras para la programación eficiente.', 1, 1),
(1, 'Redes de Computadoras', 'Diseño y gestión de redes de computadoras.', 1, 1),
(1, 'Ingeniería de Software', 'Principios y metodologías para el desarrollo de software de calidad.', 1, 1),
(1, 'Fundamentos de Ciberseguridad', 'Conceptos básicos de seguridad en el entorno digital.', 1, 1),
(1, 'Matemáticas para la Computación', 'Aplicación de conceptos matemáticos en la programación.', 1, 1),
(1, 'Desarrollo de Aplicaciones Móviles', 'Creación de aplicaciones para dispositivos móviles.', 1, 1);







-- Insertar cursos para 5to año de BACHILLERATO EN COMPUTACIÓN
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(1, 'Computación en el Internet de las Cosas', 'Desarrollo de aplicaciones para el Internet de las Cosas (IoT).', 2, 1),
(1, 'Tendencias Tecnológicas', 'Exploración de las últimas tendencias en tecnología.', 2, 1),
(1, 'Desarrollo de Sistemas de Información', 'Diseño y gestión de sistemas de información.', 2, 1),
(1, 'Programación en JavaScript', 'Avanzado en técnicas y frameworks de JavaScript.', 2, 1),
(1, 'Desarrollo de Software para Movilidad', 'Creación de aplicaciones para dispositivos móviles.', 2, 1),
(1, 'Análisis y Diseño de Algoritmos', 'Técnicas avanzadas de análisis y diseño de algoritmos.', 2, 1),
(1, 'Desarrollo de Aplicaciones en la Nube', 'Diseño y despliegue de aplicaciones en entornos de nube.', 2, 1),
(1, 'Programación Concurrente', 'Fundamentos y técnicas de programación concurrente.', 2, 1),
(1, 'Desarrollo de Juegos', 'Principios y técnicas en el desarrollo de videojuegos.', 2, 1),
(1, 'Gestión de Proyectos de TI', 'Metodologías y herramientas para la gestión de proyectos tecnológicos.', 2, 1),
(1, 'Arquitectura de Sistemas Distribuidos', 'Diseño y manejo de sistemas distribuidos.', 2, 1),
(1, 'Inteligencia Artificial', 'Fundamentos y aplicaciones de la inteligencia artificial.', 2, 1),
(1, 'Desarrollo de Software de Realidad Virtual', 'Creación de aplicaciones para entornos de realidad virtual.', 2, 1),
(1, 'Desarrollo de Software de Realidad Aumentada', 'Creación de aplicaciones para entornos de realidad aumentada.', 2, 1),
(1, 'Seguridad en Aplicaciones Web', 'Técnicas para asegurar aplicaciones web contra ataques.', 2, 1),
(1, 'Desarrollo de Software con Machine Learning', 'Implementación de técnicas de machine learning en el desarrollo de software.', 2, 1),
(1, 'Programación de Interfaces Gráficas', 'Diseño y programación de interfaces gráficas de usuario.', 2, 1),
(1, 'Mantenimiento y Soporte de Sistemas', 'Técnicas para el mantenimiento y soporte de sistemas informáticos.', 2, 1),
(1, 'Computación Ubicua', 'Fundamentos y aplicaciones de la computación ubicua.', 2, 1),
(1, 'Robótica y Automatización', 'Introducción a la robótica y técnicas de automatización.', 2, 1),
(1, 'Fundamentos de Programación II', 'Avanzado en conceptos de programación.', 2, 1),
(1, 'Algoritmos Avanzados', 'Desarrollo de algoritmos complejos y eficientes.', 2, 1),
(1, 'Matemáticas Discretas', 'Conceptos matemáticos aplicados a la informática.', 2, 1),
(1, 'Estructuras de Datos II', 'Estudio avanzado de estructuras de datos.', 2, 1),
(1, 'Bases de Datos Relacionales', 'Diseño y gestión de bases de datos relacionales.', 2, 1),
(1, 'Desarrollo Web II', 'Avanzado en desarrollo web y frameworks.', 2, 1),
(1, 'Sistemas Operativos II', 'Avanzado en administración y gestión de sistemas operativos.', 2, 1),
(1, 'Redes de Computadoras II', 'Estudio avanzado de redes y su configuración.', 2, 1),
(1, 'Programación Orientada a Objetos II', 'Avanzado en programación orientada a objetos.', 2, 1),
(1, 'Ingeniería de Software II', 'Metodologías avanzadas en ingeniería de software.', 2, 1);




use ccr;


-- Insertar cursos para 4to año magisterio infantil intercultural
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(2, 'Desarrollo Infantil', 'Estudio de las etapas del desarrollo infantil.', 1, 1),
(2, 'Educación Intercultural', 'Metodologías para la enseñanza en contextos interculturales.', 1, 1),
(2, 'Psicología Infantil', 'Fundamentos de la psicología aplicada a la infancia.', 1, 1),
(2, 'Didáctica Infantil', 'Métodos y técnicas de enseñanza para niños.', 1, 1),
(2, 'Tecnología Educativa', 'Uso de tecnologías en el ámbito educativo infantil.', 1, 1),
(2, 'Metodologías de Evaluación', 'Técnicas para evaluar el aprendizaje en la infancia.', 1, 1),
(2, 'Comunicación Infantil', 'Estrategias para una comunicación efectiva con niños.', 1, 1),
(2, 'Educación Emocional', 'Desarrollo de habilidades emocionales en la infancia.', 1, 1),
(2, 'Educación Inclusiva', 'Prácticas para una educación inclusiva y adaptativa.', 1, 1),
(2, 'Cultura y Tradiciones', 'Estudio de la diversidad cultural y sus implicaciones en la educación.', 1, 1),
(2, 'Técnicas de Enseñanza en Ciencias', 'Metodologías para enseñar ciencias a niños.', 1, 1),
(2, 'Desarrollo de Habilidades Sociales', 'Técnicas para promover habilidades sociales en la infancia.', 1, 1),
(2, 'Educación Artística Infantil', 'Enseñanza de artes y manualidades a niños.', 1, 1),
(2, 'Pedagogía Social', 'Estudio de la pedagogía aplicada a contextos sociales.', 1, 1),
(2, 'Psicopedagogía Infantil', 'Aplicación de técnicas psicopedagógicas en la enseñanza.', 1, 1),
(2, 'Manejo del Comportamiento Infantil', 'Estrategias para gestionar el comportamiento en el aula.', 1, 1),
(2, 'Aprendizaje Basado en Proyectos', 'Metodología de aprendizaje a través de proyectos en la infancia.', 1, 1),
(2, 'Cuentos y Literatura Infantil', 'Uso de la literatura y cuentos en la educación infantil.', 1, 1),
(2, 'Metodología de la Lectura', 'Técnicas para enseñar la lectura a niños.', 1, 1),
(2, 'Matemáticas para Niños', 'Métodos para enseñar matemáticas a la infancia.', 1, 1);


-- Insertar cursos para 5to año magisterio infantil intercultural
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(2, 'Desarrollo del Lenguaje', 'Estudio del desarrollo del lenguaje en la infancia.', 2, 1),
(2, 'Metodología de Proyectos Educativos', 'Diseño y gestión de proyectos educativos infantiles.', 2, 1),
(2, 'Didáctica de la Matemática', 'Métodos para enseñar matemáticas a niños.', 2, 1),
(2, 'Estrategias de Aprendizaje', 'Técnicas para promover el aprendizaje en la infancia.', 2, 1),
(2, 'Educación en Valores', 'Enseñanza de valores y principios morales en la infancia.', 2, 1),
(2, 'Diversidad y Educación', 'Manejo de la diversidad en el aula infantil.', 2, 1),
(2, 'Diseño Curricular Infantil', 'Creación y gestión de currículos educativos para niños.', 2, 1),
(2, 'Neuroeducación', 'Aplicación de principios neurológicos en la enseñanza infantil.', 2, 1),
(2, 'Psicología del Aprendizaje', 'Estudio de cómo los niños aprenden y desarrollan habilidades.', 2, 1),
(2, 'Actividades Recreativas Educativas', 'Diseño de actividades recreativas que fomenten el aprendizaje.', 2, 1),
(2, 'Aprendizaje Cooperativo', 'Metodología de aprendizaje en grupo para niños.', 2, 1),
(2, 'Diseño de Material Didáctico', 'Creación y uso de materiales educativos para la infancia.', 2, 1),
(2, 'Educación para la Salud', 'Promoción de hábitos de salud y bienestar en la infancia.', 2, 1),
(2, 'Creatividad en la Enseñanza', 'Fomento de la creatividad en el aula infantil.', 2, 1),
(2, 'Didáctica del Juego', 'Importancia y métodos del juego en el aprendizaje infantil.', 2, 1),
(2, 'Investigación Educativa', 'Métodos y técnicas de investigación en educación infantil.', 2, 1),
(2, 'Desarrollo de Habilidades Cognitivas', 'Estrategias para el desarrollo de habilidades cognitivas en niños.', 2, 1),
(2, 'Acompañamiento Familiar', 'Técnicas para colaborar con familias en la educación infantil.', 2, 1),
(2, 'Metodología de la Ciencia en la Infancia', 'Enseñanza de conceptos científicos a niños.', 2, 1),
(2, 'Educación Ambiental Infantil', 'Incorporación de temas ambientales en la educación infantil.', 2, 1);


-- Insertar cursos para 6to año magisterio infantil intercultural
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(2, 'Desarrollo Psicomotor', 'Estudio del desarrollo psicomotor en la niñez y su impacto en el aprendizaje.', 3, 1),
(2, 'Educación Intercultural Bilingüe', 'Técnicas y metodologías para la enseñanza en un contexto intercultural bilingüe.', 3, 1),
(2, 'Práctica Profesional Supervisada', 'Desarrollo de prácticas pedagógicas en entornos educativos.', 3, 1),
(2, 'Psicología Educativa Avanzada', 'Estudio avanzado de la psicología aplicada a la educación infantil.', 3, 1),
(2, 'Planificación Curricular Avanzada', 'Desarrollo de planes curriculares adaptados a diferentes contextos educativos.', 3, 1),
(2, 'Evaluación del Aprendizaje Infantil', 'Métodos y técnicas para evaluar el aprendizaje en la primera infancia.', 3, 1),
(2, 'Taller de Material Didáctico', 'Creación y uso de material didáctico para la enseñanza infantil.', 3, 1),
(2, 'Políticas Educativas', 'Análisis de las políticas educativas actuales en contextos interculturales.', 3, 1),
(2, 'Pedagogía Crítica', 'Estudio de enfoques pedagógicos críticos para la educación inclusiva.', 3, 1),
(2, 'Orientación Vocacional', 'Metodologías para orientar a los estudiantes en la elección de carreras futuras.', 3, 1),
(2, 'Investigación Educativa', 'Metodologías de investigación aplicadas al campo de la educación.', 3, 1),
(2, 'Educación para la Paz', 'Enseñanza de valores de paz y resolución de conflictos en el aula.', 3, 1),
(2, 'Desarrollo Socioemocional', 'Estudio del desarrollo socioemocional y su importancia en la educación infantil.', 3, 1),
(2, 'Didáctica de las Ciencias Naturales', 'Métodos de enseñanza para las ciencias naturales en la educación infantil.', 3, 1),
(2, 'Tecnología en la Educación Infantil', 'Uso de la tecnología para mejorar el proceso de enseñanza-aprendizaje en niños.', 3, 1),
(2, 'Educación Ambiental', 'Desarrollo de proyectos educativos orientados a la protección del medio ambiente.', 3, 1),
(2, 'Educación Física Infantil', 'Metodologías y actividades para el desarrollo físico infantil.', 3, 1),
(2, 'Prácticas de Inclusión Educativa', 'Técnicas para la inclusión de estudiantes con necesidades especiales.', 3, 1),
(2, 'Mediación y Resolución de Conflictos', 'Estrategias para la mediación y resolución de conflictos en el aula.', 3, 1),
(2, 'Educación Emocional', 'Promoción de la inteligencia emocional y el bienestar en la educación infantil.', 3, 1);



-- Insertar cursos para 4to año perito en administracion de empresas.
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(3, 'Fundamentos de Administración', 'Principios básicos de administración y gestión empresarial.', 1, 1),
(3, 'Contabilidad Financiera', 'Estudio de los principios y prácticas de la contabilidad financiera.', 1, 1),
(3, 'Administración de Recursos Humanos', 'Técnicas para la gestión y administración del capital humano.', 1, 1),
(3, 'Marketing y Ventas', 'Estrategias y técnicas de marketing y ventas.', 1, 1),
(3, 'Economía Empresarial', 'Fundamentos económicos aplicados a la administración de empresas.', 1, 1),
(3, 'Administración Financiera', 'Gestión y planificación de los recursos financieros de una empresa.', 1, 1),
(3, 'Gestión de Proyectos', 'Metodologías y herramientas para la gestión de proyectos.', 1, 1),
(3, 'Planificación Estratégica', 'Desarrollo y ejecución de estrategias a largo plazo para empresas.', 1, 1),
(3, 'Legislación Empresarial', 'Normativas y leyes que afectan a las empresas.', 1, 1),
(3, 'Administración de Operaciones', 'Gestión de las operaciones diarias en una empresa.', 1, 1),
(3, 'Técnicas de Negociación', 'Estrategias y técnicas para la negociación efectiva en el ámbito empresarial.', 1, 1),
(3, 'Gestión de Calidad', 'Métodos para asegurar la calidad en productos y servicios.', 1, 1),
(3, 'Comportamiento Organizacional', 'Estudio de cómo el comportamiento de las personas afecta a las organizaciones.', 1, 1),
(3, 'Análisis Financiero', 'Técnicas para evaluar la situación financiera de una empresa.', 1, 1),
(3, 'Costos y Presupuestos', 'Gestión y análisis de costos y presupuestos empresariales.', 1, 1),
(3, 'Tecnologías de la Información en la Administración', 'Uso de TI para mejorar la gestión empresarial.', 1, 1),
(3, 'Gestión de Recursos', 'Administración de los recursos físicos y financieros de una empresa.', 1, 1);


-- Insertar cursos para 5to año perito en administracion de empresas.
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(3, 'Gestión del Cambio', 'Técnicas para gestionar y liderar el cambio organizacional.', 2, 1),
(3, 'Auditoría Interna', 'Principios y técnicas de auditoría interna en las empresas.', 2, 1),
(3, 'Innovación y Emprendimiento', 'Fomento de la innovación y el espíritu emprendedor en el entorno empresarial.', 2, 1),
(3, 'Gestión de la Cadena de Suministro', 'Administración de la cadena de suministro y logística empresarial.', 2, 1),
(3, 'Desarrollo Organizacional', 'Métodos para el desarrollo y mejora de las organizaciones.', 2, 1),
(3, 'Planificación Financiera a Largo Plazo', 'Desarrollo de planes financieros para el futuro de la empresa.', 2, 1),
(3, 'Gestión del Riesgo', 'Identificación y manejo de riesgos en la empresa.', 2, 1),
(3, 'Marketing Digital', 'Estrategias de marketing en el entorno digital.', 2, 1),
(3, 'Responsabilidad Social Empresarial', 'Conceptos y prácticas de responsabilidad social en las empresas.', 2, 1),
(3, 'Gestión de la Información Empresarial', 'Manejo y análisis de la información en la empresa.', 2, 1),
(3, 'Estrategias de Crecimiento Empresarial', 'Técnicas y estrategias para el crecimiento y expansión de las empresas.', 2, 1),
(3, 'Gestión de Eventos Corporativos', 'Planificación y gestión de eventos en el entorno empresarial.', 2, 1),
(3, 'Control de Inventarios', 'Métodos para la administración y control de inventarios.', 2, 1),
(3, 'Negocios Internacionales', 'Estudio de la gestión y operación de empresas en el mercado internacional.', 2, 1),
(3, 'Técnicas de Ventas Avanzadas', 'Estrategias avanzadas para mejorar las ventas en la empresa.', 2, 1),
(3, 'Administración de Proyectos Avanzada', 'Metodologías avanzadas para la gestión de proyectos complejos.', 2, 1),
(3, 'Gestión de Relaciones con Clientes', 'Técnicas para gestionar y mantener relaciones efectivas con los clientes.', 2, 1),
(3, 'Finanzas Corporativas', 'Estudio de finanzas a nivel corporativo y su impacto en la empresa.', 2, 1),
(3, 'Ética en los Negocios', 'Principios éticos aplicados a la gestión empresarial.', 2, 1),
(3, 'Gestión de Talento', 'Métodos para atraer, desarrollar y retener talento en las empresas.', 2, 1);


-- Insertar cursos para 6to año perito en administracion de empresas.
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(3, 'Dirección Estratégica', 'Conceptos avanzados de dirección estratégica para empresas.', 3, 1),
(3, 'Finanzas Internacionales', 'Estudio de finanzas en un contexto internacional.', 3, 1),
(3, 'Gestión del Cambio Organizacional', 'Técnicas y estrategias para implementar cambios organizacionales.', 3, 1),
(3, 'Gestión de Proyectos Internacionales', 'Administración de proyectos en un entorno global.', 3, 1),
(3, 'Innovación en Modelos de Negocio', 'Desarrollo e implementación de modelos de negocio innovadores.', 3, 1),
(3, 'Gestión Avanzada de Operaciones', 'Métodos avanzados para la gestión de operaciones empresariales.', 3, 1),
(3, 'Estrategias Financieras Internacionales', 'Estrategias para la gestión financiera en mercados internacionales.', 3, 1),
(3, 'Dirección de Recursos Humanos', 'Técnicas avanzadas en la gestión de recursos humanos.', 3, 1),
(3, 'Gestión de Crisis', 'Estrategias para la gestión y resolución de crisis empresariales.', 3, 1),
(3, 'Planificación Financiera Estratégica', 'Desarrollo de estrategias financieras para la planificación a largo plazo.', 3, 1),
(3, 'Administración de Empresas Familiares', 'Manejo y gestión de empresas familiares.', 3, 1),
(3, 'Gestión de la Calidad Total', 'Implementación de sistemas de calidad total en las empresas.', 3, 1),
(3, 'Planificación y Control Estratégico', 'Métodos para la planificación y control de estrategias empresariales.', 3, 1),
(3, 'Gestión de Innovación y Tecnología', 'Implementación de innovaciones tecnológicas en la empresa.', 3, 1),
(3, 'Administración de la Sostenibilidad', 'Prácticas para la gestión sostenible en las empresas.', 3, 1),
(3, 'Dirección de Marketing Estratégico', 'Técnicas avanzadas en la dirección de marketing y ventas.', 3, 1),
(3, 'Gestión de Relaciones Internacionales', 'Manejo de relaciones y negociaciones en el ámbito internacional.', 3, 1),
(3, 'Auditoría Financiera Avanzada', 'Técnicas avanzadas de auditoría en finanzas.', 3, 1),
(3, 'Gestión de Proyectos de Innovación', 'Administración de proyectos enfocados en la innovación empresarial.', 3, 1),
(3, 'Desarrollo y Gestión de Marca', 'Estrategias para el desarrollo y gestión de marcas empresariales.', 3, 1);


-- Insertar cursos para 4to año Secretariado bilingue.
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(4, 'Redacción Comercial', 'Técnicas de redacción para la comunicación comercial en el entorno empresarial.', 1, 1),
(4, 'Contabilidad Básica', 'Principios básicos de contabilidad para la gestión de documentos financieros.', 1, 1),
(4, 'Técnicas de Archivo', 'Métodos y técnicas para la organización y mantenimiento de archivos físicos y digitales.', 1, 1),
(4, 'Comunicación Oral y Escrita en Inglés', 'Desarrollo de habilidades de comunicación en inglés para entornos profesionales.', 1, 1),
(4, 'Ofimática', 'Manejo de herramientas de oficina como procesadores de texto y hojas de cálculo.', 1, 1),
(4, 'Atención al Cliente', 'Desarrollo de habilidades para la atención efectiva a clientes y usuarios.', 1, 1),
(4, 'Protocolos Empresariales', 'Normas de comportamiento y etiqueta en el entorno empresarial.', 1, 1),
(4, 'Técnicas de Traducción I', 'Introducción a la traducción de documentos comerciales y técnicos.', 1, 1),
(4, 'Fundamentos de Mercadeo', 'Principios básicos del mercadeo y estrategias comerciales.', 1, 1),
(4, 'Ética Profesional', 'Valores y principios éticos en el entorno laboral.', 1, 1),
(4, 'Inglés Conversacional I', 'Desarrollo de habilidades de conversación en inglés para situaciones cotidianas.', 1, 1),
(4, 'Comportamiento Organizacional', 'Estudio del comportamiento humano en organizaciones empresariales.', 1, 1),
(4, 'Legislación Laboral', 'Estudio de las leyes laborales aplicadas al entorno empresarial.', 1, 1),
(4, 'Estadística Básica', 'Conceptos básicos de estadística aplicada a los negocios.', 1, 1),
(4, 'Matemática Financiera', 'Aplicación de principios matemáticos a las finanzas.', 1, 1),
(4, 'Redacción y Traducción de Documentos', 'Técnicas de redacción y traducción de documentos oficiales y comerciales.', 1, 1),
(4, 'Inglés Técnico I', 'Introducción al vocabulario técnico y específico de negocios en inglés.', 1, 1),
(4, 'Administración de Recursos Humanos', 'Gestión básica de los recursos humanos en una empresa.', 1, 1),
(4, 'Procesos Administrativos', 'Estudio de los procesos administrativos en una empresa.', 1, 1),
(4, 'Traducción de Textos Comerciales', 'Técnicas de traducción aplicada a textos comerciales y empresariales.', 1, 1);


-- Insertar cursos para 5to año Secretariado bilingue.
INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(4, 'Contabilidad Intermedia', 'Estudio avanzado de contabilidad y gestión financiera.', 2, 1),
(4, 'Traducción de Documentos Oficiales', 'Técnicas de traducción de documentos legales y oficiales.', 2, 1),
(4, 'Administración de Empresas', 'Introducción a la gestión empresarial y sus principios.', 2, 1),
(4, 'Inglés Conversacional II', 'Desarrollo avanzado de habilidades conversacionales en inglés.', 2, 1),
(4, 'Inglés Técnico II', 'Vocabulario técnico y específico para áreas profesionales.', 2, 1),
(4, 'Relaciones Públicas', 'Técnicas para mejorar la imagen empresarial y relaciones con el público.', 2, 1),
(4, 'Correspondencia Comercial', 'Redacción y gestión de correspondencia en el ámbito empresarial.', 2, 1),
(4, 'Traducción de Textos Técnicos', 'Traducción de textos técnicos en diferentes áreas profesionales.', 2, 1),
(4, 'Manejo de Conflictos', 'Estrategias y técnicas para resolver conflictos en el ámbito empresarial.', 2, 1),
(4, 'Protocolo Empresarial II', 'Estudio avanzado de las normas de etiqueta empresarial.', 2, 1),
(4, 'Gestión de Proyectos', 'Técnicas de planificación y ejecución de proyectos.', 2, 1),
(4, 'Técnicas de Negociación', 'Desarrollo de habilidades de negociación en contextos empresariales.', 2, 1),
(4, 'Aplicaciones Informáticas II', 'Manejo de software avanzado para la gestión administrativa.', 2, 1),
(4, 'Traducción de Textos Especializados', 'Técnicas de traducción avanzada en áreas especializadas.', 2, 1),
(4, 'Contabilidad Gerencial', 'Principios de contabilidad aplicada a la toma de decisiones gerenciales.', 2, 1),
(4, 'Introducción al Comercio Internacional', 'Estudio de los principios del comercio y negocios internacionales.', 2, 1),
(4, 'Comunicación Corporativa', 'Desarrollo de estrategias de comunicación en el entorno corporativo.', 2, 1),
(4, 'Ética Empresarial', 'Estudio de los valores éticos dentro de las organizaciones empresariales.', 2, 1),
(4, 'Recursos Humanos II', 'Gestión avanzada de los recursos humanos en las empresas.', 2, 1),
(4, 'Fundamentos de Traducción Simultánea', 'Introducción a la técnica de traducción simultánea.', 2, 1);



-- Insertar cursos para 6to año Secretariado bilingue.

INSERT INTO curso (carrera, nombre, descripcion, nivel, estado) VALUES
(4, 'Contabilidad Avanzada', 'Estudio avanzado de la contabilidad para la toma de decisiones estratégicas.', 3, 1),
(4, 'Traducción Técnica y Científica', 'Traducción de textos técnicos y científicos en inglés y español.', 3, 1),
(4, 'Prácticas Profesionales', 'Aplicación de los conocimientos adquiridos en un entorno laboral real.', 3, 1),
(4, 'Inglés Técnico III', 'Vocabulario técnico avanzado para contextos específicos.', 3, 1),
(4, 'Inglés Conversacional III', 'Desarrollo avanzado de habilidades orales en inglés.', 3, 1),
(4, 'Gestión de Documentos y Archivo', 'Organización y gestión avanzada de documentos empresariales.', 3, 1),
(4, 'Redacción Ejecutiva', 'Técnicas avanzadas de redacción para el entorno directivo.', 3, 1),
(4, 'Ética en los Negocios Internacionales', 'Estudio de los valores éticos en el contexto internacional.', 3, 1),
(4, 'Traducción Simultánea', 'Técnicas de traducción simultánea en situaciones empresariales.', 3, 1),
(4, 'Comercio Internacional Avanzado', 'Aspectos avanzados del comercio y negocios internacionales.', 3, 1),
(4, 'Interpretación Empresarial', 'Habilidades de interpretación para situaciones empresariales.', 3, 1),
(4, 'Correspondencia Internacional', 'Redacción de correspondencia en el entorno internacional.', 3, 1),
(4, 'Derecho Mercantil', 'Estudio de las leyes y normativas que regulan el comercio.', 3, 1),
(4, 'Administración Financiera', 'Gestión financiera avanzada para empresas internacionales.', 3, 1),
(4, 'Marketing Internacional', 'Principios y estrategias de marketing en mercados internacionales.', 3, 1),
(4, 'Negocios Bilingües', 'Gestión de negocios con enfoque bilingüe en mercados globales.', 3, 1),
(4, 'Traducción en Conferencias', 'Técnicas para la traducción simultánea en conferencias y eventos.', 3, 1),
(4, 'Redacción Técnica y Científica', 'Redacción especializada de textos técnicos y científicos.', 3, 1),
(4, 'Protocolo Internacional', 'Estudio del protocolo en el contexto de los negocios internacionales.', 3, 1),
(4, 'Tecnologías para la Traducción', 'Herramientas tecnológicas aplicadas a la traducción profesional.', 3, 1);




