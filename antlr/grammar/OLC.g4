grammar OLC;

/*
|--------------------------------------------------------------------------
| PROGRAMA
|--------------------------------------------------------------------------
*/

program
    : declaration* EOF
    ;

/*
|--------------------------------------------------------------------------
| DECLARACIONES
|--------------------------------------------------------------------------
*/

declaration
    : varDcl
    | shortVarDcl
    | constDcl
    | functionDcl
    | assignmentStmt
    | ifStmt
    | switchStmt
    | forStmt
    | breakStmt
    | continueStmt
    | returnStmt
    | block
    ;

/*
|--------------------------------------------------------------------------
| FUNCIONES
|--------------------------------------------------------------------------
*/

functionDcl
    : FUNC IDENTIFIER '(' params? ')' result? block
    ;

params
    : param (',' param)*
    ;

param
    : IDENTIFIER type
    ;

result
    : type
    | '(' type (',' type)* ')'
    ;

/*
|--------------------------------------------------------------------------
| BLOQUES
|--------------------------------------------------------------------------
*/

block
    : '{' declaration* '}'
    ;

/*
|--------------------------------------------------------------------------
| VARIABLES
|--------------------------------------------------------------------------
*/

varDcl
    : VAR id_list type
    | VAR id_list type '=' exp_list
    ;

shortVarDcl
    : id_list ':=' exp_list
    ;

constDcl
    : CONST IDENTIFIER type '=' expression
    ;

/*
|--------------------------------------------------------------------------
| ASIGNACIONES
|--------------------------------------------------------------------------
*/

assignmentStmt
    : primaryExpr assignOp expression
    | primaryExpr ('++' | '--')
    ;

assignOp
    : '='
    | '+='
    | '-='
    | '*='
    | '/='
    ;

/*
|--------------------------------------------------------------------------
| IF
|--------------------------------------------------------------------------
*/

ifStmt
    : IF (simpleStmt ';')? expression block (ELSE (ifStmt | block))?
    ;

/*
|--------------------------------------------------------------------------
| SWITCH
|--------------------------------------------------------------------------
*/

switchStmt
    : SWITCH expression '{' caseClause* defaultClause? '}'
    ;

caseClause
    : CASE exp_list ':' declaration*
    ;

defaultClause
    : DEFAULT ':' declaration*
    ;

/*
|--------------------------------------------------------------------------
| FOR
|--------------------------------------------------------------------------
*/

forStmt
    : FOR forClause block
    | FOR expression block
    | FOR block
    ;

forClause
    : (simpleStmt)? ';' (expression)? ';' (simpleStmt)?
    ;

/*
|--------------------------------------------------------------------------
| TRANSFERENCIA
|--------------------------------------------------------------------------
*/

breakStmt
    : BREAK
    ;

continueStmt
    : CONTINUE
    ;

returnStmt
    : RETURN exp_list?
    ;

/*
|--------------------------------------------------------------------------
| SIMPLE STMT
|--------------------------------------------------------------------------
*/

simpleStmt
    : shortVarDcl
    | assignmentStmt
    ;

/*
|--------------------------------------------------------------------------
| LISTAS
|--------------------------------------------------------------------------
*/

id_list
    : IDENTIFIER (',' IDENTIFIER)*
    ;

exp_list
    : expression (',' expression)*
    ;

/*
|--------------------------------------------------------------------------
| EXPRESIONES CON PRECEDENCIA
|--------------------------------------------------------------------------
*/

expression
    : logicalOrExpr
    ;

logicalOrExpr
    : logicalAndExpr ('||' logicalAndExpr)*
    ;

logicalAndExpr
    : equalityExpr ('&&' equalityExpr)*
    ;

equalityExpr
    : relationalExpr (('==' | '!=') relationalExpr)*
    ;

relationalExpr
    : additiveExpr (('>' | '>=' | '<' | '<=') additiveExpr)*
    ;

additiveExpr
    : multiplicativeExpr (('+' | '-') multiplicativeExpr)*
    ;

multiplicativeExpr
    : unaryExpr (('*' | '/' | '%') unaryExpr)*
    ;

unaryExpr
    : '!' unaryExpr
    | '-' unaryExpr
    | '*' unaryExpr          // desreferenciación
    | '&' unaryExpr          // referencia
    | primaryExpr
    ;

/*
|--------------------------------------------------------------------------
| PRIMARY EXPR
|--------------------------------------------------------------------------
*/

primaryExpr
    : literal
    | IDENTIFIER
    | NIL
    | '(' expression ')'
    | primaryExpr '[' expression ']'
    | primaryExpr '(' exp_list? ')'      // llamada a función
    | arrayLiteral
    ;

/*
|--------------------------------------------------------------------------
| LITERALES
|--------------------------------------------------------------------------
*/

literal
    : INT_LITERAL
    | FLOAT_LITERAL
    | STRING_LITERAL
    | RUNE_LITERAL
    | TRUE
    | FALSE
    ;

/*
|--------------------------------------------------------------------------
| ARREGLOS
|--------------------------------------------------------------------------
*/

arrayLiteral
    : type '{' elementList? '}'
    ;

elementList
    : element (',' element)* ','?
    ;

element
    : expression
    | arrayLiteral
    ;

/*
|--------------------------------------------------------------------------
| TIPOS
|--------------------------------------------------------------------------
*/

type
    : pointerType
    | arrayType
    | baseType
    ;

pointerType
    : '*' type
    ;

arrayType
    : '[' expression ']' type
    ;

baseType
    : INT32
    | FLOAT32
    | BOOL
    | RUNE
    | STRING
    ;

/*
|--------------------------------------------------------------------------
| PALABRAS RESERVADAS
|--------------------------------------------------------------------------
*/

FUNC     : 'func';
VAR      : 'var';
CONST    : 'const';
IF       : 'if';
ELSE     : 'else';
SWITCH   : 'switch';
CASE     : 'case';
DEFAULT  : 'default';
FOR      : 'for';
BREAK    : 'break';
CONTINUE : 'continue';
RETURN   : 'return';
NIL      : 'nil';

INT32   : 'int32';
FLOAT32 : 'float32';
BOOL    : 'bool';
RUNE    : 'rune';
STRING  : 'string';

TRUE    : 'true';
FALSE   : 'false';

/*
|--------------------------------------------------------------------------
| IDENTIFICADORES
|--------------------------------------------------------------------------
*/

IDENTIFIER
    : LETTER (LETTER | DIGIT)*
    ;

/*
|--------------------------------------------------------------------------
| LITERALES
|--------------------------------------------------------------------------
*/

INT_LITERAL
    : [0-9]+
    ;

FLOAT_LITERAL
    : [0-9]+ '.' [0-9]+
    ;

STRING_LITERAL
    : '"' (~["\\] | '\\' .)* '"'
    ;

RUNE_LITERAL
    : '\'' (~['\\] | '\\' .) '\''
    ;

/*
|--------------------------------------------------------------------------
| FRAGMENTOS
|--------------------------------------------------------------------------
*/

fragment LETTER
    : [_\p{L}]
    ;

fragment DIGIT
    : [0-9]
    ;

/*
|--------------------------------------------------------------------------
| COMENTARIOS
|--------------------------------------------------------------------------
*/

LINE_COMMENT
    : '//' ~[\r\n]* -> skip
    ;

BLOCK_COMMENT
    : '/*' .*? '*/' -> skip
    ;

/*
|--------------------------------------------------------------------------
| ESPACIOS
|--------------------------------------------------------------------------
*/

WS
    : [ \t\r\n]+ -> skip
    ;