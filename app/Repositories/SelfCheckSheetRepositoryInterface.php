<?php

namespace App\Repositories;

interface SelfCheckSheetRepositoryInterface
{
    public function answerSelfCheckSheets($user, string $term);
    public function ratingSelfCheckSheets($user, string $term);
    public function approvingSelfCheckSheets($user, string $term);
}
