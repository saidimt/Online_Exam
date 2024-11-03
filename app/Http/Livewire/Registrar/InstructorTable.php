<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Instructor;
use App\Helpers\FunctionHelper;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class InstructorTable extends DataTableComponent
{
    protected $model = Instructor::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->sortable(),
            Column::make("Sur name", "sur_name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("", "user_id")
            ->format(function($value,$row,$column){
                return view('layouts.includes.user',['image'=>$row->user->picture]);
            }),
            Column::make("Created By", "createdBy.username")
                ->sortable(),
            Column::make("Created at", "created_at")
            ->sortable()
            ->format(function($value){
                return FunctionHelper::formatDate($value);
            }),
            Column::make("Action", "id")
            ->format(function($value,$row,$column){
             
                return view('layouts.includes._action-update-delete', [
                    'updateLink' => route('registrar.instructors.edit', $value),
                    'deleteLink' => route('registrar.instructors.delete', $value),
                ]);
            }),
        ];
    }
}
