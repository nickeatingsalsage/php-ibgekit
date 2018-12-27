# Php IBGE Kit

## Introduction
> PHP-IBGEKIT is a bunch of tools for current IBGE Api, for further details go to https://servicodados.ibge.gov.br/api/docs/

## Examples

> Outros exemplos de  podem ser encontrados em src/examples

``` php     
   <?php
       //  Search for all states.
       require __DIR__ . '/../../vendor/autoload.php';
       
       $search = new \IbgeKit\src\kits\StateSearch();
       echo json_encode($search->getAll());
   
   
   <?php        
        //  Search only with state id equal to 33 or 34.      
        require __DIR__ . '/../../vendor/autoload.php';
        
        $search = new \IbgeKit\src\kits\StateSearch();
        echo json_encode($search->getAll([33,34]));
  
  <?php    
      // Search only one state.
      require __DIR__ . '/../../vendor/autoload.php';
      
      $search = new \IbgeKit\src\kits\StateSearch();
      echo json_encode($search->getOne(33));
      
  <?php               
      // Verifies if an state exists.
      require __DIR__ . '/../../vendor/autoload.php';
      $search = new \IbgeKit\src\kits\StateSearch();
      if ($search->exists(33))
         echo "Record exists.";
      else
         echo "Record not found.");
```
## Installation

> Just run on terminal: composer require "nickeatingsalsage/php-ibgekit"  