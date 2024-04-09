<?php

namespace Basmak\LivewireDatatables\Tests\Classes;

use Illuminate\Database\Eloquent\Model;
use Basmak\LivewireDatatables\BooleanColumn;
use Basmak\LivewireDatatables\Column;
use Basmak\LivewireDatatables\DateColumn;
use Basmak\LivewireDatatables\Livewire\LivewireDatatable;
use Basmak\LivewireDatatables\NumberColumn;
use Basmak\LivewireDatatables\Tests\Models\DummyModel;

class DummyTable extends LivewireDatatable
{
    public int $perPage = 10;
    public string|null|Model $model = DummyModel::class;

    public function getColumns(): array|Model
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('dummy_model', 6),

            Column::name('subject')
                ->filterable(),

            Column::name('category')
                ->filterable(['A', 'B', 'C']),

            Column::name('body')
                ->truncate()
                ->filterable(),

            BooleanColumn::name('flag')
                ->filterable(),

            DateColumn::name('expires_at')
                ->label('Expiry')
                ->format('jS F Y')
                ->hide(),

            Column::name('dummy_has_one.name')
                ->label('Relation'),

            Column::name('subject AS string')
                    ->label('BooleanFilterableSubject')
                    ->booleanFilterable()
                    ->hide(),
        ];
    }
}
