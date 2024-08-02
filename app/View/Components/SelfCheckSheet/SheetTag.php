<?php

namespace App\View\Components\SelfCheckSheet;

use Closure;
use App\Services\SelfCheckSheet\SelfCheckSheetService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SheetTag extends Component
{
    public $type;
    public $show_only_answer;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheetService $self_check_sheet_service,
        $type
    )
    {
        $sheets = $this
            ->self_check_sheet_service
            ->fetchSelfCheckSheetsForTodoTask(auth()->user());
        $this->show_only_answer = $sheets['show_only_answer'];
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.sheet-tag');
    }
}
