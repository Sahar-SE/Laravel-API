<?php

namespace App\Filters;

// To access the Request we import it from Illuminate\Http\Request
use Illuminate\Http\Request;


class ApiFilter {
  // because user can write anything in input search so we have to allow specific columns to be searched
  protected $safeParams = [];
  // Transform the fields to Db columns speciallly for postalCode because we have changed it to postalCode from postal_code

  protected $columnMap = [];

  protected $opratorsMap = [];

  public function transform(Request $request) {
    // eloquect query array
    $eloQuery = [];
    // param is the field name
    foreach ($this->safeParams as $param => $operators) {
      $query = $request->query($param);

      if(!isset($query)) {
        continue;
      }

      $column = $this->columnMap[$param] ?? $param;
      foreach ($operators as $operator) {
        $eloQuery[] = [$column, $this->opratorsMap[$operator], $query];
      }
    }

    return $eloQuery;
  }
  
}