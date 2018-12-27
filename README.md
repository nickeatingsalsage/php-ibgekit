# Php IBGE Kit

## Introduction

> PHP-IBGEKIT é um conjunto de ferramentas para automatização da api do IBGE, mais detalhes desta api podem ser encontrados em https://servicodados.ibge.gov.br/api/docs/.



## Code Samples

> Outros exemplos de  podem ser encontrados em src/examples

``` php
    // Realizar consulta em todos os estados.
     
   <?php   
   
   use PhpIbgeKit\Src\Kits\StateSearch;
   
   $search = new StateSearch();
   echo json_encode($search->getAll());
```
## Installation

> Ainda não é possível instalar esta biblioteca pois nem tudo que você quer pode ser feito.