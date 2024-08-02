<?php

namespace App\View\Components;

use Closure;
use Carbon\Carbon;
use App\Repositories\SelfCheckSheetRepositoryInterface;
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
        public SelfCheckSheetRepositoryInterface $selfCheckSheetRepository,
    )
    {
        $user = auth()->user();
        $this->term = Carbon::now()->format('Y-m');

        // それぞれの今月のタスクを取得
        $this->answer_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->answerSelfCheckSheets($user, $this->term);
        $this->rating_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->ratingSelfCheckSheets($user, $this->term);
        $this->approving_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->approvingSelfCheckSheets($user, $this->term);

        $this->show_only_answer = false;
        if (
            $this->rating_self_check_sheets->isEmpty() &&
            $this->approving_self_check_sheets->isEmpty()
        ) {
            $this->show_only_answer = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todo-task');
    }
}
