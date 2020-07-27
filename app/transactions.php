<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    //
    protected $fillable = [
      'id','CustomerEmail','payable_id','payable_type','member_id','InvoiceValue','UnitPrice','ExtendedAmount','status','PaymentGateway','Invoiceid','InvoiceReference','TransactionId','TrackId','OrderId','Currency','ProductName','Quantity','ExpireDate','CreatedDate','InvoiceDisplayValue','PaidCurrency','PaidCurrencyValue','TransationValue','CustomerServiceCharge','DueValue','PaymentId','AuthorizationId','TransactionDate',
        
    ];

}
