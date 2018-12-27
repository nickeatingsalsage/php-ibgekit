# Php IBGE Kit

## Introdução

> PHP-IBGEKIT é um conjunto de ferramentas para automatização da api do IBGE, mais detalhes desta api podem ser encontrados em https://servicodados.ibge.gov.br/api/docs/.

## Introduction
> PHP-IBGEKIT is a bunch of tools for current IBGE Api, for further details go to https://servicodados.ibge.gov.br/api/docs/

## Exemplos/Examples

> Outros exemplos de  podem ser encontrados em src/examples

``` php
    //  Realiza consulta em todos os estados consulta em todos os estados.
    //  Search for all states. 
   <?php
   
   require __DIR__ . '/../../vendor/autoload.php';
   
   $search = new \IbgeKit\src\kits\StateSearch();
   echo json_encode($search->getAll());
   
   
   <?php
      
      //  Realiza consulta nos estados com id 33 e 34.
      //  Search only with state 33 or 34.
      
      require __DIR__ . '/../../vendor/autoload.php';
      
      $search = new \IbgeKit\src\kits\StateSearch();
      echo json_encode($search->getAll([33,34]));
  
  <?php
  
     // Realiza consulta em apenas um estado.
     // Search only one state.
     
      require __DIR__ . '/../../vendor/autoload.php';
      
      $search = new \IbgeKit\src\kits\StateSearch();
      echo json_encode($search->getOne(33));
      
  <?php
        
        //  Verifica se determinado estado existe.
        // Verifies if an state exists.
        
        require __DIR__ . '/../../vendor/autoload.php';
        
        $search = new \IbgeKit\src\kits\StateSearch();
        if ($search->exists(33))
            echo "Record exists.";
        else
            echo "Record not found.");
```
## Instalação/Installation

> Just run on terminal: composer require nickeatingsalsage/php-ibgekit.