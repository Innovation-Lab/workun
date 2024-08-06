<?php

namespace App\Services\SelfCheckSheet;

use App\Repositories\SelfCheckSheetRepositoryInterface;
use Carbon\Carbon;

class SelfCheckSheetService
{
    protected $selfCheckSheetRepository;

    public function __construct(
        SelfCheckSheetRepositoryInterface $selfCheckSheetRepository,
    )
    {
        $this->selfCheckSheetRepository = $selfCheckSheetRepository;
    }

    public function fetchSelfCheckSheetsForTodoTask($user)
    {
        $term = Carbon::now()->format('Y-m');
        $answer_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->answerSelfCheckSheets($user, $term);
        $rating_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->ratingSelfCheckSheets($user, $term);
        $approving_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->approvingSelfCheckSheets($user, $term);

        $show_only_answer = false;
        if (
            $rating_self_check_sheets->isEmpty() &&
            $approving_self_check_sheets->isEmpty()
        ) {
            $show_only_answer = true;
        }

        return [
            'answer_self_check_sheets' => $answer_self_check_sheets,
            'rating_self_check_sheets' => $rating_self_check_sheets,
            'approving_self_check_sheets' => $approving_self_check_sheets,
            'show_only_answer' => $show_only_answer,
            'term' => $term,
        ];
    }
}
