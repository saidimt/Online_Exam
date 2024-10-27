<?php

namespace App\Http\Livewire\Academic;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Student;

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
            Column::make("Id", "id")
                ->sortable(),
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->sortable(),
            Column::make("Sur name", "sur_name")
                ->sortable(),
            Column::make("Registration no", "registration_no")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
           
        ];
    }
}
