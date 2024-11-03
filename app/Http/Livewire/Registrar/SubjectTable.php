<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Subject;
use App\Helpers\FunctionHelper;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class SubjectTable extends DataTableComponent
{
    protected $model = Subject::class;

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
                Column::make("Subject name", "subject_name")
                    ->sortable(),
                Column::make("Subject code", "subject_code")
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
    public function builder() :Builder{
        $this->index=0;
        return Subject::query()->latest();
    }
    }