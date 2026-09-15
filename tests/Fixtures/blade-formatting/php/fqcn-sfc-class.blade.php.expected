<?php

use Heritage\View\Component;

new class extends Component
{
    public function categories(): array
    {
        return \App\Models\Category::all()->all();
    }
};
?>

<div>{{ count($categories) }}</div>
