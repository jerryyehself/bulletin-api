<?php

namespace App\Traits;

use App\Models\Customer;

trait hasCustomer
{
    public function customerInfo()
    {
        return $this
            ->belongsTo(Customer::class, 'cust_id', 'cust_id')
            ->select('id', 'cust_id', 'cust_name');
    }
}
