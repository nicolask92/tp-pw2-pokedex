DROP DATABASE IF EXISTS pokedex;

CREATE DATABASE pokedex;

USE pokedex;

CREATE TABLE pokemons(
    id int NOT NULL AUTO_INCREMENT,
    id_manual int,
    imagen varchar(255),
    tipo varchar(255),
    nombre varchar(255),
    descripcion LONGTEXT,
    PRIMARY KEY (id)
);

INSERT INTO pokemons(id_manual, imagen, tipo, nombre, descripcion) values (1,"/recursos/pokemones-cargados/pokemon1.png","/recursos/tipo/fuego.png","Charmander","Charmander es un Pokémon de tipo fuego introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región Kanto, junto a Bulbasaur y Squirtle, excepto en Pokémon Amarillo y Pokémon: Let's Go, Pikachu! y Pokémon: Let's Go, Eevee!");

INSERT INTO pokemons(id_manual, imagen, tipo, nombre, descripcion) values (2,"/recursos/pokemones-cargados/pokemon2.png","/recursos/tipo/fuego.png","Charmeleon","Charmeleon es un Pokémon de tipo fuego introducido en la primera generación. Es la evolución de Charmander, uno de los Pokémon iniciales de los entrenadores que comienzan su aventura en la región de Kanto.");

INSERT INTO pokemons(id_manual, imagen, tipo, nombre, descripcion) values (3,"/recursos/pokemones-cargados/pokemon3.png","/recursos/tipo/fuego.png","Charizard","Charizard es un Pokémon de tipo fuego/volador, introducido en la primera generación. Es la evolución de Charmeleon y, a partir de la sexta generación, puede megaevolucionar en Mega-Charizard X o en Mega-Charizard Y. En la Octava generación puede realizar Gigamax y transformarse en Charizard Gigamax.");

INSERT INTO pokemons(id_manual, imagen, tipo, nombre, descripcion) values (4,"/recursos/pokemones-cargados/pokemon4.png","/recursos/tipo/agua.png","Squirtle","Squirtle es un Pokémon de tipo agua introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región Kanto, junto a Bulbasaur y Charmander, excepto en Pokémon Amarillo.");

CREATE TABLE usuarios(
    id int NOT NULL AUTO_INCREMENT,
    usuario varchar(255),
    contraseña varchar(255),
    PRIMARY KEY (id)
);

insert into usuarios(usuario, contraseña) values("admin", "admin123");
