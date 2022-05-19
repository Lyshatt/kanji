<?php

namespace App\Spiders\ItemProcessors;

use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class JishoKanjiProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function processItem(ItemInterface $item): ItemInterface
    {
        dd($item);
        return $item;
    }

//    private function defaultOptions(): array
//    {
//        // If not overwritten by the user, the default threshold
//        // is 4. Any game with fewer goals than that will get
//        // dropped.
//        return [
//            'threshold' => 4
//        ];
//    }
}
