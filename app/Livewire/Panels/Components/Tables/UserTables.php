<?php

namespace App\Livewire\Panels\Components\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
 
class UserTables extends DataTableComponent
{
    public string $tableName = 'users';
    public array $users = [];
    public array $bulkActions = [
        'selected' => 'selected',
    ];
 
    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];
 
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->setFilterLayoutSlideDown()
            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }
 
                return ['default' => true];
            })
            ->setFooterTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function(Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }
 
                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();
    }
 
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->deselected()
                ->sortable()
                ->setSortingPillTitle('Key')
                ->setSortingPillDirections('0-9', '9-0'),
            Column::make('Name', 'name')
                ->searchable(),
            Column::make('E-mail', 'email')
                ->searchable(),
            Column::make('Verified', 'email_verified_at')
                ->sortable()
                ->collapseOnTablet(),
            Column::make('Action', 'id')
                ->sortable()
                ->searchable()
                ->view('tables.users.actions', fn($row) => $row->id)
                ->html(),
        ];
    }
 
    public function filters(): array
    {
        return [
            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    ''    => 'Any',
                    'yes' => 'Yes',
                    'no'  => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            DateFilter::make('Verified From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Verified To')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'delete' => 'Delete Data',
            'export' => 'Export Data',
        ];
    }

    public function delete()
    {
        User::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
    }
 
    public function export()
    {
        $this->clearSelected();
    }
 
    public function builder(): Builder
    {
        return User::query()
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('users.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn ($query, $email) => $query->where('users.email', 'like', '%' . $email . '%'));
    }
}
