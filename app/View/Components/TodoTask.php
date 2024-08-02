<?php

namespace App\View\Components;

use Closure;
use App\Services\SelfCheckSheet\SelfCheckSheetService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoTask extends Component
{
    public $answer_self_check_sheets;
    public $approving_self_check_sheets;
    public $rating_self_check_sheets;
    public $show_only_answer;
    public $term;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheetService $self_check_sheet_service
    )
    {
        // 今月のタスクを取得
        $sheets = $this
            ->self_check_sheet_service
            ->fetchSelfCheckSheetsForTodoTask(auth()->user());
        $this->answer_self_check_sheets = $sheets['answer_self_check_sheets'];
        $this->approving_self_check_sheets = $sheets['approving_self_check_sheets'];
        $this->rating_self_check_sheets = $sheets['rating_self_check_sheets'];
        $this->show_only_answer = $sheets['show_only_answer'];
        $this->term = $sheets['term'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todo-task');
    }
}
