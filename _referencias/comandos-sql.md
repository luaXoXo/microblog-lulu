# operações CRUD usando SQL


## Resumo

c: criar/Inserir dados  -> INSERT
r: (R) Ler dados        -> SELECT
u: (U) Atualizar dados  -> UPDATE
d: (D) excluir dados    -> DELETE

## Exemplos para tabela "usuarios"

### Inserindo usuarios

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Lua', 'luamoreirasantos@gmail.com', '12345', 'admin');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('vladimir', 'bolsonaro@gmail.com', '12345', 'editor');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Pddy', 'lovechildrem@gmail.com', '12345', 'editor');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('bleckoutz', 'strooo@gmail.com', '12345', 'editor');


## inserindo noticias


INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Meu amigo jogou como o robinho e foi preso',
    'daniel alves, abusou muito na lateral do brasil',
    'neymar nao trai nem o brasil imagina a esposa tudo mentira',
    'copa2028.jpg',
    1
);




INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'tava fazendo refill de sup e tomei stomp',
    'tava de kangaru ematei tres com meu amigo de fishman',
    'o first deu spanw do meu lado peguei full iron',
    'mine.jpg',
    9
);


## leitura de dados da tabela "noticias"

SELECT data, titulo FROM noticias;

SELECT * FROM noticias;


## Leitura de dados da tabela "usuarios"

SELECT nome, email, tipo FROM usuarios;

SELECT nome, email, tipo FROM usuarios WHERE tipo = 'editor';


## Atualização de dados dos usuarios

UPDATE usuarios SET email = 'bleble@gmail.com' 
WHERE  id = 9;


## Excluindo dados da tabela "noticias"


DELETE FROM noticias WHERE id = 1;

## SELECT COM JOIN