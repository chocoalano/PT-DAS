<?php

namespace App\Livewire\Panels\Components\Tables;

use App\Models\PermissionGroup;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
class PermissionTables extends DataTableComponent
{
    public string $tableName = 'permission_groups';
    public array $table = [];
    public array $bulkActions = [
        'selected' => 'selected',
    ];
 
    public $columnSearch = [
        'name' => null,
        'guard_name' => null,
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
            Column::make('Created At', 'created_at')
                ->sortable()
                ->collapseOnTablet(),
            Column::make('Updated At', 'updated_at')
                ->sortable()
                ->collapseOnTablet(),
            Column::make('Action', 'id')
                ->sortable()
                ->searchable()
                ->view('tables.permissions.actions', fn($row) => $row->id)
                ->html(),
        ];
    }
 
    public function filters(): array
    {
        return [
            DateFilter::make('Created At From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => date('Y-m-d'),
                ])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('created_at', '>=', $value);
                }),
            DateFilter::make('Created At To')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('created_at', '<=', $value);
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'delete' => 'Delete Data',
        ];
    }

    public function delete()
    {
        PermissionGroup::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
    }
 
    public function builder(): Builder
    {
        return PermissionGroup::query()
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('permission_groups.name', 'like', '%' . $name . '%'));
    }
}
