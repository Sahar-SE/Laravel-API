<?php
namespace App\Filters\V1;

// To access the Request we import it from Illuminate\Http\Request
use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class   InvoiceFilter extends ApiFilter {
  // because user can write anything in input search so we have to allow specific columns to be searched
  protected $safeParams = [
    'customerId' => ['eq'],
    'amount' => ['eq', 'gt', 'lt'],
    'status' => ['eq', 'ne'],
    'billedDate' => ['eq'],
    'paidDate' => ['eq', 'gt', 'lt'],
  ];
  // Transform the fields to Db columns because we have changed it to postalCode from postal_code

  protected $columnMap = [
    'costomerId' => 'costomer_id',
    'billedDate' => 'billed_date',
    'paidDate' => 'paid_date',
  ];

  protected $opratorsMap = [
    'eq' => '=',
    'gt' => '>',
    'lt' => '<',
    'ne' => '!='
  ];

 
  
}