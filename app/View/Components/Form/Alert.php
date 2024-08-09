<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type
    )
    {
        if (preg_match('/\[(.*?)\]/', $type)) {
            $this->type = preg_replace('/\[(.*?)\]/', '.$1', $type);
        } else {
            $this->type = $type;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.alert');
    }
}
