<?php

namespace App\Observers;

use App\OrderItem;

class OrderItemObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param OrderItem $orderItem
     */
    public function created ( OrderItem $orderItem )
    {

    }

    /**
     * Handle the product "creating" event.
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function creating ( OrderItem $orderItem )
    {

    }
    /**
     * Handle the product "updated" event.
     *
     * @param OrderItem $orderItem
     */
    public function updated ( OrderItem $orderItem )
    {

    }

    /**
     * Handle the product "updating" event.
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function updating ( OrderItem $orderItem )
    {

    }
}
