<?php

return function ($page) {

    if (str_contains($page->url(), '/grants')){
        $x = "grant";
    } elseif (str_contains($page->url(), '/jobs')){
        $x = "job";
    } elseif (str_contains($page->url(), '/papers')){
        $x = "paper";
    } elseif (str_contains($page->url(), '/entries')){
        $x = "entry";
    } else {
        $x = "all";
    }

    if ($x != "all"){

        $opportunities = $page->parent()
                                ->children()
                                ->filterBy('category', $x)
                                ->sortBy('date', 'desc') 
                                ->paginate(9);
    } else {

        $opportunities = $page->children()
                            ->listed()
                            ->sortBy('date', 'desc') 
                            ->paginate(9);
    }     

  // pass $opportunities to the template
  return [
    'opportunities' => $opportunities
  ];

};