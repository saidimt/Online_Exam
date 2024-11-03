<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Course;
use App\Models\Subject;
use App\Models\SubjectCourse;
use App\Helpers\FunctionHelper;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CourseSubjectTable extends DataTableComponent
{
    protected $model = SubjectCourse::class;

    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(true);
      
    }
    public function filters(): array
    {
        return [
            DateFilter::make('Start Date')
            ->config([
                'min' => '2024-01-01',
                'max' => '2040-12-31',
            ])
            ->filter(function(Builder $builder, string $value) {
                $builder->whereDate('subject_courses.created_at', '>=', $value);
            }),
            DateFilter::make('End Date')
            ->filter(function(Builder $builder, string $value) {
                $builder->whereDate('subject_courses.created_at', '<=', $value);
            }),
            // SelectFilter::make('Financial Year')
            //     ->options(
            //         // '' => 'All',
            //         Course::query()
            //         ->latest()
            //         ->orderBy('financial_year')
            //         ->pluck('financial_year', 'id')
            //         ->prepend('All', '')
            //         ->toArray(),
            //     )
            //     ->filter(function(Builder $builder, string $value) {
            //         $builder->where('account_financial_years.id', $value);
            //     }),

            // SelectFilter::make('Ledger Group')
            // ->options(
            //     // '' => 'All',
            //     Subject::query()
            //         ->orderBy('group_name')
            //         ->get()
            //         ->pluck('group_name', 'id')
            //         ->prepend('All', '')
            //         ->toArray(),
            // )
            // ->filter(function(Builder $builder, string $value) {
            //     if ($value !== '') {
            //         $builder->whereHas('account_list', function($q) use ($value)
            //         {
            //             return $q->whereHas('account_sub_type', function($q) use($value)
            //             {
            //                 return $q->whereHas('account_type', function($q) use($value)
            //                 {
            //                     return $q->where('account_group_id',$value);
            //                 });
            //             });
            //         });
            //     }
            // }),
            // SelectFilter::make('Company Branch')
            // ->options(
            //     SubjectCourse::query()
            //         ->orderBy('name')
            //         ->get()
            //         ->pluck('name', 'id')
            //         ->prepend('None', '')
            //         ->toArray()
            // )
            // ->filter(function (Builder $builder, string $value) {
            //     if ($value !== '') {
            //         $builder->where('company_branches.id', $value);
            //     }
            // }),
        
        ];
    }
    public function columns(): array
    {
        return [
          
                Column::make("SN", "id")
                ->sortable()
                ->format(function(){
                    return ++$this->index;
                }),
                Column::make("Subject name", "subject.subject_name")
                ->searchable()
                ->sortable(),
                Column::make("Subject code", "subject.subject_code")
                ->searchable()
                ->sortable(),
                Column::make("Course name", "course.courseList.course_name")
                ->searchable()
                ->sortable(),
                Column::make("Course code", "course.courseList.course_code")
                ->searchable()
                ->sortable(),
                Column::make("Course number", "course.course_number")
                ->searchable()
                ->sortable(),
                   
                Column::make("Created at", "created_at")
                ->sortable()
                ->format(function($value){
                    return FunctionHelper::formatDate($value);
                }),
                Column::make("Action", "id")
                ->format(function($value,$row,$column){
                 
                    return view('layouts.includes._action-update-delete', [
                        'updateLink' => route('registrar.subject.edit', $value),
                        'deleteLink' => route('registrar.subject.delete', $value),
                    ]);
                }),
        ];
        // 
    }
    public function builder(): Builder
    {
        $this->index = 0;
        return SubjectCourse::query()->with(['subject', 'course.courseList'])->latest();
    }
    
    }