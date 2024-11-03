<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Course;
use App\Helpers\FunctionHelper;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CourseTable extends DataTableComponent
{
    protected $model = Course::class;

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
            Column::make("Course Name", "courseList.course_name")
                ->sortable(),
                Column::make("Course code", "courseList.course_code")
                ->sortable(),
            Column::make("Course number", "course_number")
                ->sortable(),
            Column::make("course start date", "course_start_date")
                ->sortable()
                ->format(function($value){
                    return FunctionHelper::formatDateInfo($value);
                }),
                Column::make("Course end date", "course_end_date")
                ->sortable()
                ->format(function($value){
                    return FunctionHelper::formatDateInfo($value);
                }),
                Column::make("Course status", "course_status_id")
                ->format(function($value,$row,$column){
                    return view('layouts.includes._course-status',['status'=>$row->courseStatus->status]);
                }),
            Column::make("created By", "user.username")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->format(function($value){
                    return FunctionHelper::formatDate($value);
                }),
                Column::make("Action", "id")
                ->format(function($value,$row,$column){
                 
                    return view('layouts.includes._action-update-delete', [
                        'updateLink' => route('registrar.course.edit', $value),
                        'deleteLink' => route('registrar.course.delete', $value),
                    ]);
                }),
        ];
        // 
    }
    public function builder() :Builder{
        $this->index=0;
        return Course::query()->latest();
    }
}
