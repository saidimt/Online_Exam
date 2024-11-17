<?php

namespace App\Http\Livewire\Registrar;

use index;
use App\Models\Student;
use App\Helpers\FunctionHelper;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class StudentTable extends DataTableComponent
{
    protected $model = Student::class;

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
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->sortable(),
            Column::make("Sur name", "sur_name")
                ->sortable(),
            Column::make("Registration no", "registration_no")
                ->sortable(),
                Column::make("Course", "id")
                ->sortable()
                ->format(function($value,$row,$column){
                    return $row->studentCourse->course->courseList->course_code.' ' . $row->studentCourse->course->course_number;
                }),
                Column::make("", "user_id")
                ->format(function($value,$row,$column){
                    return view('layouts.includes.user',['image'=>$row->user->picture]);
                }),
                Column::make("Created at", "created_at")
                ->sortable()
                ->format(function($value){
                    return FunctionHelper::formatDate($value);
                }),
                Column::make("Action", "id")
                ->format(function($value,$row,$column){

                    return view('layouts.includes._action-update-delete', [
                        'updateLink' => route('registrar.students.edit', $value),
                        'deleteLink' => route('registrar.students.delete', $value),
                    ]);
                }),
        ];
        //
    }
    public function builder() :Builder{
        $this->index=0;
        return Student::query()->latest();
    }
}
