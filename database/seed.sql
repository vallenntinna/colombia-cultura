-- =====================================================================
--  Proyecto : Cultura de Colombia
--  Archivo  : seed.sql  (datos iniciales / contenido)
-- =====================================================================

-- ---------------------------------------------------------------------
-- REGIONES
-- ---------------------------------------------------------------------
INSERT INTO regiones (nombre, slug, subtitulo, descripcion, departamentos, capital, emoji, color_ini, color_fin, orden) VALUES
('Región Caribe', 'caribe', 'Sol, tambores y carnaval',
 'La puerta de Colombia al mar Caribe. Tierra de ritmos afrocaribeños como la cumbia, el porro y la champeta, de ciudades amuralladas y de una gastronomía colorida. Aquí se vive el carnaval más importante del país y se mezclan tradiciones indígenas, africanas y europeas.',
 'Atlántico, Bolívar, Cesar, Córdoba, La Guajira, Magdalena, Sucre, San Andrés',
 'Barranquilla', '🌊', '#0ea5e9', '#003893', 1),

('Región Andina', 'andina', 'El corazón de las montañas',
 'Recorre las tres cordilleras andinas y concentra la mayor parte de la población colombiana. Es la cuna del bambuco, del ajiaco y de los grandes centros culturales del país. Paisajes de café, ciudades históricas y una riqueza artística y literaria enorme.',
 'Antioquia, Boyacá, Caldas, Caquetá, Cundinamarca, Huila, Nariño, Quindío, Risaralda, Norte de Santander, Santander, Tolima',
 'Bogotá', '🏔️', '#059669', '#003893', 2),

('Región Pacífica', 'pacifica', 'Selva, mar y marimba',
 'Una de las regiones más ricas en biodiversidad y expresión cultural afrocolombiana. Su música, con el currulao y la marimba de chonta, es Patrimonio de la Humanidad. Playas, manglares, ballenas jorobadas y una cocina única a base de coco y pescado.',
 'Chocó, Valle del Cauca, Cauca, Nariño',
 'Quibdó', '🐋', '#0891b2', '#065f46', 3),

('Región Orinoquía', 'orinoquia', 'Los llanos infinitos',
 'La gran llanura oriental donde el horizonte no termina. Tierra del joropo, el arpa, los cuatro y las maracas. Ganadería, atardeceres dorados, trabajo del llano y una fuerte identidad cultural en torno al caballo y la copla.',
 'Arauca, Casanare, Meta, Vichada',
 'Villavicencio', '🐎', '#f59e0b', '#b45309', 4),

('Región Amazonía', 'amazonia', 'La selva que respira',
 'El pulmón verde del planeta. Habitada por decenas de pueblos indígenas que conservan lenguas, saberes ancestrales y una profunda relación con la selva. Ríos inmensos, medicina tradicional y una biodiversidad sin igual.',
 'Amazonas, Caquetá, Guainía, Guaviare, Putumayo, Vaupés',
 'Leticia', '🌿', '#15803d', '#065f46', 5),

('Región Insular', 'insular', 'Islas de dos mares',
 'Territorios insulares en el mar Caribe y el océano Pacífico. San Andrés y Providencia aportan una cultura raizal afro-anglo-antillana con el creole, el reggae y el raizal; Malpelo y Gorgona son santuarios naturales de enorme valor.',
 'Archipiélago de San Andrés, Providencia y Santa Catalina',
 'San Andrés', '🏝️', '#06b6d4', '#003893', 6);

-- ---------------------------------------------------------------------
-- GASTRONOMÍA
-- ---------------------------------------------------------------------
INSERT INTO gastronomia (region_id, nombre, slug, descripcion, ingredientes, emoji, color_ini, color_fin, orden) VALUES
(2, 'Ajiaco santafereño', 'ajiaco', 'El plato insignia de Bogotá: una sopa espesa y reconfortante de tres tipos de papa, pollo y mazorca, aromatizada con guascas y servida con crema y alcaparras.', 'Papa criolla, pastusa y sabanera, pollo, guascas, mazorca, crema de leche, alcaparras, aguacate', '🍲', '#059669', '#003893', 1),
(2, 'Bandeja paisa', 'bandeja-paisa', 'El plato más abundante de Antioquia. Una explosión de sabores montañeros que reúne frijoles, carne, chorizo, chicharrón, huevo, arepa y más en un solo plato.', 'Frijoles, chicharrón, carne molida, chorizo, morcilla, huevo, plátano, arepa, aguacate', '🍛', '#b45309', '#ce1126', 2),
(1, 'Arepa de huevo', 'arepa-de-huevo', 'Ícono de la cocina caribe en Sincelejo y Barranquilla: arepa frita rellena con huevo, crujiente por fuera y cremosa por dentro.', 'Maíz, huevo, sal, aceite', '🥚', '#f59e0b', '#ce1126', 3),
(1, 'Sancocho de guandú', 'sancocho', 'Sopa de guandú con carne y plátano, preparada en fiestas y celebraciones del Caribe colombiano.', 'Guandú, carne de res o cerdo, yuca, plátano, papa, cebolla, achiote', '🍜', '#ca8a04', '#ce1126', 4),
(1, 'Mote de queso', 'mote-de-queso', 'Una sopa tradicional del interior del Caribe, con ñame y queso costeño que se derrite en cada cucharada.', 'Ñame, queso costeño, cebolla, ajo, achiote, suero atollabuey', '🧀', '#eab308', '#f59e0b', 5),
(3, 'Cazuela de mariscos', 'cazuela-de-mariscos', 'Guiso costeño del Pacífico con camarones, calamar, pescado y cangrejo en una salsa de coco y especias.', 'Camarón, calamar, pescado, jaiba, leche de coco, plátano, cebolla, cilantro', '🦐', '#0891b2', '#065f46', 6),
(4, 'Carne a la llanera', 'carne-a-la-llanera', 'La tradicional mamona asada al calor de la brasa, servida con yuca, plátano y el infaltable ají llanero.', 'Carne de ternera, yuca, plátano, ají, cebolla, limón', '🥩', '#b45309', '#7c2d12', 7),
(2, 'Lechona tolimense', 'lechona-tolimense', 'Cerdo entero relleno de arroz, arveja y especias, horneado lentamente. La estrella de las fiestas en el Tolima.', 'Carne de cerdo, arroz, arveja, cebolla, especias, piel de cerdo', '🐖', '#b45309', '#ce1126', 8),
(2, 'Pandebono y buñuelos', 'pandebono', 'Panecillos de almidón de yuca y queso, y buñuelos dorados de queso y maíz. Compañeros eternos del chocolate caliente.', 'Almidón de yuca, queso, huevo, maíz, queso costeño', '🧆', '#eab308', '#f59e0b', 9),
(2, 'Hormigas culonas', 'hormigas-culonas', 'Delicatessen de Santander: hormigas gigantes tostadas con sal, consideradas un manjar afrodisíaco y tradicional.', 'Hormigas culonas, sal', '🐜', '#78350f', '#451a03', 10);

-- ---------------------------------------------------------------------
-- MÚSICA
-- ---------------------------------------------------------------------
INSERT INTO musica (region_id, nombre, slug, descripcion, instrumentos, emoji, color_ini, color_fin, orden) VALUES
(1, 'Cumbia', 'cumbia', 'El ritmo más representativo de Colombia y símbolo del mestizaje. Nació en el Caribe del encuentro entre comunidades indígenas, africanas y europeas.', 'Tambor llamador, tambor alegre, guache, acordeón, flauta de millo', '🥁', '#f59e0b', '#ce1126', 1),
(1, 'Vallenato', 'vallenato', 'La música del Valle de Uptré y la Costa Caribe. Patrimonio Inmaterial de la Humanidad por la UNESCO, con aires de paseo, merengue, son y puya.', 'Acordeón, caja vallenata, guacharaca', '🪗', '#003893', '#ce1126', 2),
(1, 'Porro', 'porro', 'Ritmo orquestado y festivo de las bandas de vientos del Caribe, también conocido como "porro palitiao".', 'Clarinete, trompeta, trombón, bombardino, tambores', '🎺', '#1d4ed8', '#f59e0b', 3),
(1, 'Champeta', 'champeta', 'Fusión urbana de Cartagena que mezcla ritmos africanos con sonidos antillanos y producción electrónica.', 'Guitarra, sintetizador, percusión, bajo', '🎧', '#db2777', '#7c3aed', 4),
(3, 'Currulao', 'currulao', 'El ritmo emblema del Pacífico afrocolombiano, lleno de tambores y marimba de chonta. Patrimonio Cultural de la Nación.', 'Marimba de chonta, tambor conuno, tambor mayor, guasá, maracas', '🪘', '#0891b2', '#065f46', 5),
(3, 'Marimba de chonta', 'marimba-de-chonta', 'Instrumento símbolo del Pacífico, declarado Patrimonio de la Humanidad junto a las músicas tradicionales del Pacífico Sur.', 'Chonta, tablas de madera, resonadores de guadua', '🎼', '#0e7490', '#065f46', 6),
(4, 'Joropo', 'joropo', 'El ritmo de los Llanos Orientales. Veloz, virtuoso y con coplas improvisadas, se baila zapateando al pie de la música.', 'Arpa llanera, cuatro, maracas, bandola', '🐎', '#f59e0b', '#b45309', 7),
(2, 'Bambuco', 'bambuco', 'Baile y música tradicional de la región Andina, considerado por muchos el "aire nacional". Romántico y de ritmo sincopado.', 'Tiple, bandola, guitarra, requinto', '🎻', '#059669', '#003893', 8),
(1, 'Mapalé', 'mapale', 'Baile de origen afrocaribeño, de movimientos rápidos y percusión intensa, símbolo de la herencia africana.', 'Tambores, guache, palmoteo y voz', '💃', '#dc2626', '#78350f', 9),
(1, 'Reggae raizal', 'reggae-raizal', 'Expresión musical del archipiélago de San Andrés y Providencia, con influencia antillana, creole e inglesa.', 'Guitarra, bajo, teclado, percusión', '🏝️', '#06b6d4', '#059669', 10);

-- ---------------------------------------------------------------------
-- FESTIVIDADES
-- ---------------------------------------------------------------------
INSERT INTO festividades (region_id, nombre, slug, descripcion, ciudad, mes, es_patrimonio, emoji, color_ini, color_fin, orden) VALUES
(1, 'Carnaval de Barranquilla', 'carnaval-barranquilla', 'La fiesta más grande de Colombia y una de las más importantes del mundo. Cuatro días de danzas, disfraces, cumbiambas y desfiles como la Batalla de Flores.', 'Barranquilla', 'Febrero / Marzo', 1, '🎭', '#f59e0b', '#ce1126', 1),
(2, 'Carnaval de Negros y Blancos', 'carnaval-negros-blancos', 'Patrimonio Inmaterial de la Humanidad. En Pasto, el 2 y 3 de enero el color y la pintura toman las calles en un mestizaje alegre y simbólico.', 'Pasto', 'Enero', 1, '🎨', '#111827', '#ffffff', 2),
(2, 'Feria de las Flores', 'feria-de-las-flores', 'Medellín se llena de color con los silleteros, quienes cargan sobre sus espaldas enormes y artísticas silletas de flores.', 'Medellín', 'Agosto', 0, '🌺', '#db2777', '#15803d', 3),
(1, 'Festival de la Leyenda Vallenata', 'festival-leyenda-vallenata', 'El encuentro más importante del vallenato, donde se corona al Rey Vallenato en la plaza Alfonso López de Valledupar.', 'Valledupar', 'Abril / Mayo', 0, '🪗', '#003893', '#f59e0b', 4),
(3, 'Festival Petronio Álvarez', 'festival-petronio-alvarez', 'La fiesta de las músicas del Pacífico en Cali: marimba, currulao, cocina tradicional y moda afro.', 'Cali', 'Agosto', 0, '🪘', '#0891b2', '#065f46', 5),
(2, 'Festival Iberoamericano de Teatro', 'festival-teatro', 'Bogotá se convierte en el epicentro mundial del teatro cada dos años, con compañías de todo el planeta.', 'Bogotá', 'Marzo / Abril', 0, '🎭', '#7c3aed', '#003893', 6),
(2, 'Semana Santa de Popayán', 'semana-santa-popayan', 'Patrimonio Inmaterial de la Humanidad. Las procesiones nocturnas de Popayán son un referente de devoción y arte religioso.', 'Popayán', 'Marzo / Abril', 1, '✝️', '#6d28d9', '#312e81', 7),
(2, 'Feria de Cali', 'feria-de-cali', 'Cierre de año a ritmo de salsa: desfiles, cabalgata, conciertos y la mejor rumba del Pacífico colombiano.', 'Cali', 'Diciembre', 0, '🎊', '#dc2626', '#f59e0b', 8),
(4, 'Encuentro Mundial del Joropo', 'encuentro-joropo', 'Villavicencio celebra el folclor llanero con torneos de baile, arpa y coplas que reúnen cultores de toda la Orinoquía.', 'Villavicencio', 'Junio / Julio', 0, '🐎', '#f59e0b', '#b45309', 9),
(6, 'Carnaval de San Andrés', 'carnaval-san-andres', 'Colorida celebración raizal y antillana con desfiles, música en vivo y la cultura isleña en su máxima expresión.', 'San Andrés', 'Marzo', 0, '🏝️', '#06b6d4', '#003893', 10);

-- ---------------------------------------------------------------------
-- PERSONAJES
-- ---------------------------------------------------------------------
INSERT INTO personajes (nombre, slug, profesion, descripcion, nacimiento, fallecimiento, emoji, color_ini, color_fin, orden) VALUES
('Gabriel García Márquez', 'garcia-marquez', 'Escritor y Premio Nobel', 'Autor de "Cien años de soledad" y máximo exponente del realismo mágico. Premio Nobel de Literatura 1982 y orgullo de Aracataca.', 1927, 2014, '📚', '#f59e0b', '#ce1126', 1),
('Fernando Botero', 'botero', 'Pintor y escultor', 'Creador de un estilo inconfundible: figuras volumétricas y rotundas que retratan con humor e ironía la vida y la cultura colombiana.', 1932, 2023, '🎨', '#dc2626', '#f59e0b', 2),
('Shakira', 'shakira', 'Cantante y compositora', 'Barranquillera de fama mundial que llevó el sonido del Caribe colombiano a los escenarios más grandes del planeta.', 1977, NULL, '🎤', '#db2777', '#f59e0b', 3),
('Débora Arango', 'debora-arango', 'Pintora', 'Pionera de la pintura moderna en Colombia, valiente y crítica, retrató la realidad social y política de su época.', 1907, 2005, '🖌️', '#7c3aed', '#db2777', 4),
('Juanes', 'juanes', 'Cantante y guitarrista', 'Músico antioqueño de proyección internacional, embajador del rock y el pop colombiano y activista por la paz.', 1972, NULL, '🎸', '#003893', '#1d4ed8', 5),
('Doris Salcedo', 'doris-salcedo', 'Artista visual', 'Escultora bogotana de reconocimiento mundial, su obra aborda la memoria y el dolor de la violencia en Colombia.', 1958, NULL, '🗿', '#334155', '#0f172a', 6),
('Rafael Escalona', 'rafael-escalona', 'Compositor vallenato', 'El gran maestro del vallenato clásico, autor de legendarias composiciones que retratan el alma del Caribe colombiano.', 1926, 2009, '🪗', '#003893', '#f59e0b', 7),
('Lucho Bermúdez', 'lucho-bermudez', 'Músico y compositor', 'El gran maestro de la música tropical colombiana, llevó la cumbia y el porro a las grandes orquestas del mundo.', 1912, 1994, '🎺', '#f59e0b', '#ce1126', 8);

-- ---------------------------------------------------------------------
-- SÍMBOLOS
-- ---------------------------------------------------------------------
INSERT INTO simbolos (nombre, slug, categoria, descripcion, emoji, color_ini, color_fin, orden) VALUES
('La Bandera', 'bandera', 'Símbolo patrio', 'Tres franjas horizontales: amarillo (la mitad) por la riqueza y el sol; azul por los dos océanos; rojo por la sangre de los héroes.', '🇨🇴', '#fcd116', '#003893', 1),
('El Escudo Nacional', 'escudo', 'Símbolo patrio', 'Contiene la granada, los cuernos de la abundancia, el gorro frigio y el cóndor. Representa la libertad y la riqueza del país.', '🛡️', '#003893', '#ce1126', 2),
('El Himno Nacional', 'himno', 'Símbolo patrio', 'Compuesto por Rafael Núñez y Oreste Sindici (1887). Un canto que exalta la independencia y la libertad de la nación.', '🎼', '#003893', '#ce1126', 3),
('El Cóndor de los Andes', 'condor', 'Fauna nacional', 'El ave emblema de Colombia y de los Andes, símbolo de libertad y poderío. Su silueta preside el escudo nacional.', '🦅', '#1f2937', '#0f172a', 4),
('La Orquídea Cattleya', 'orquidea', 'Flora nacional', 'La flor nacional, la Cattleya trianae, fue nombrada en honor al botánico colombiano José Jerónimo Triana.', '🌸', '#db2777', '#a21caf', 5),
('La Palma de Cera', 'palma-de-cera', 'Flora nacional', 'El árbol nacional y la palma más alta del mundo, en peligro de extinción. Crece en el Valle de Cocora.', '🌴', '#15803d', '#065f46', 6),
('Sombrero vueltiao', 'sombrero-vueltiao', 'Símbolo cultural', 'Tejido de la cultura zenú (Córdoba y Sucre) elaborado con caña flecha. Considerado obra maestra del patrimonio inmaterial.', '👒', '#b45309', '#78350f', 7);

-- ---------------------------------------------------------------------
-- SITIOS Y DESTINOS
-- ---------------------------------------------------------------------
INSERT INTO sitios (region_id, nombre, slug, categoria, ciudad, descripcion, emoji, color_ini, color_fin, orden) VALUES
(1, 'Ciudad Amurallada de Cartagena', 'cartagena-amurallada', 'Patrimonio de la Humanidad', 'Cartagena de Indias', 'Las murallas coloniales mejor conservadas de América, con calles coloridas, plazas y fortalezas del siglo XVI.', '🏰', '#f59e0b', '#003893', 1),
(2, 'Valle de Cocora', 'valle-de-cocora', 'Paisaje natural', 'Salento, Quindío', 'El hogar de la palma de cera, en medio de montañas, niebla y cafetales. Un paisaje andino único en el mundo.', '🌴', '#059669', '#065f46', 2),
(2, 'Monserrate', 'monserrate', 'Santuario y mirador', 'Bogotá', 'El cerro que vigila Bogotá desde 3.152 msnm. Santuario, gastronomía y una vista panorámica de la capital.', '⛰️', '#059669', '#003893', 3),
(4, 'Caño Cristales', 'cano-cristales', 'Maravilla natural', 'La Macarena, Meta', 'El río "de los cinco colores". Durante meses, algas únicas tiñen el agua de rojo, amarillo y verde.', '💧', '#06b6d4', '#ef4444', 4),
(1, 'Parque Nacional Tayrona', 'tayrona', 'Parque natural', 'Santa Marta, Magdalena', 'Playas vírgenes, selva y montaña que caen al mar Caribe. Guardián del corazón del mundo, el pueblo kogui.', '🏖️', '#0ea5e9', '#059669', 5),
(2, 'Santuario de Las Lajas', 'las-lajas', 'Patrimonio religioso', 'Ipiales, Nariño', 'Una iglesia de estilo neogótico construida sobre el cañón del río Guáitara. Una de las más bellas del mundo.', '⛪', '#6d28d9', '#003893', 6),
(1, 'Cabo de la Vela', 'cabo-de-la-vela', 'Paisaje cultural', 'Uribia, La Guajira', 'Dunas, mar turquesa y la sabiduría del pueblo wayuu en el extremo norte del continente.', '🐪', '#f59e0b', '#06b6d4', 7),
(3, 'Bahía Málaga', 'bahia-malaga', 'Santuario natural', 'Buenaventura, Valle', 'Cuna de las ballenas jorobadas, manglares y comunidades afrocolombianas que viven del mar.', '🐋', '#0891b2', '#065f46', 8);

-- ---------------------------------------------------------------------
-- DATOS CURIOSOS
-- ---------------------------------------------------------------------
INSERT INTO datos_curiosos (icono, valor, titulo, descripcion, orden) VALUES
('🗣️', '68', 'Lenguas indígenas', 'En Colombia se hablan más de 68 lenguas indígenas y dos criollas, además del español.', 1),
('🌍', '≈ 1.140.000 km²', 'Extensión', 'Es el cuarto país más grande de Sudamérica y posee costas en el Caribe y el Pacífico.', 2),
('🦜', '2º', 'País más biodiverso', 'Colombia es el segundo país con mayor biodiversidad del mundo, después de Brasil.', 3),
('☕', '1º', 'Suavidad del café', 'Es uno de los mayores productores de café suave del mundo, con el Paisaje Cultural Cafetero como Patrimonio.', 4),
('🐦', '~1.950', 'Especies de aves', 'Colombia alberga cerca del 20% de las especies de aves del planeta: el país de las aves.', 5),
('🎉', '2', 'Patrimonios UNESCO', 'El Carnaval de Barranquilla y las músicas del Pacífico sur son Patrimonio Inmaterial de la Humanidad.', 6);
