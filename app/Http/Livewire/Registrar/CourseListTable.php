<?php

namespace App\Http\Livewire\Registrar;

use App\Models\CourseList;
use App\Helpers\FunctionHelper;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CourseListTable extends DataTableComponent
{
    protected $model = CourseList::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("SN", "id")
            ->sortable()
            ->format(function(){
                return ++$this->index;
            }),
            Column::make("Course name", "course_name")
                ->sortable(),
            Column::make("Course code", "course_code")
                ->sortable(),
            Column::make("Course duration", "course_duration")
                ->sortable(),
            Column::make("Created By", "user.username")
                ->sortable(),
            Column::make("Created at", "created_at")
            ->sortable()
            ->format(function($value){
                return FunctionHelper::formatDate($value);
            }),
            Column::make("Action", "id")
            ->format(function($value,$row,$column){
             
                return view('layouts.includes._action-update-delete', [
                    'updateLink' => route('registrar.course-list.edit', $value),
                    'deleteLink' => route('registrar.course-list.delete', $value),
                ]);
            }),
    ];
    // 
}
public function builder() :Builder{
    $this->index=0;
    return CourseList::query()->latest();
}
}
