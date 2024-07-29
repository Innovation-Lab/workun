<?php

namespace App\Repositories;

use App\Models\SelfCheckSheet;
use Illuminate\Http\Request;

interface SelfCheckSheetRepositoryInterface
{
    public function answerSelfCheckSheets($user, string $term, bool $pagenate = false);
    public function ratingSelfCheckSheets($user, string $term, bool $pagenate = false);
    public function approvingSelfCheckSheets($user, string $term, bool $pagenate = false);
    public function setAnswerAttributes(SelfCheckSheet $self_check_sheet, $user, string $term, bool $with_histories = false);
    public function setRatingAttributes(SelfCheckSheet $self_check_sheet, $user, string $term, bool $with_histories = false);
    public function setApprovingAttributes(SelfCheckSheet $self_check_sheet, $user, string $term, bool $with_histories = false);
    public function answer(SelfCheckSheet $self_check_sheet, $user, string $term, Request $request);
}
