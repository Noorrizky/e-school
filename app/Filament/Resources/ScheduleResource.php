<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Grouping agar rapi
                Section::make('Informasi Akademik')->schema([
                    Select::make('academic_year_id')
                        ->relationship('academicYear', 'name')
                        ->label('Tahun Ajaran')
                        ->required(),
                    
                    Select::make('classroom_id')
                        ->relationship('classroom', 'name')
                        ->label('Kelas')
                        ->required(),

                    Select::make('subject_id')
                        ->relationship('subject', 'name')
                        ->label('Mata Pelajaran')
                        ->required(),

                    Select::make('teacher_id')
                        ->relationship('teacher', 'name') // Menampilkan nama user
                        // Filter: Hanya tampilkan user dengan role 'teacher'
                        ->options(fn () => \App\Models\User::where('role', 'teacher')->pluck('name', 'id'))
                        ->label('Guru Pengampu')
                        ->required()
                        ->searchable(),
                ])->columns(2),

                Section::make('Waktu')->schema([
                    Select::make('day')
                        ->options([
                            'Senin' => 'Senin',
                            'Selasa' => 'Selasa',
                            'Rabu' => 'Rabu',
                            'Kamis' => 'Kamis',
                            'Jumat' => 'Jumat',
                            'Sabtu' => 'Sabtu',
                        ])
                        ->required(),
                    
                    TimePicker::make('start_time')
                        ->label('Jam Mulai')
                        ->seconds(false) // Hapus detik agar bersih
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('academicYear.name')->label('T.A')->sortable(),
                TextColumn::make('classroom.name')->label('Kelas')->sortable()->searchable(),
                TextColumn::make('subject.name')->label('Mapel')->sortable()->searchable(),
                TextColumn::make('teacher.name')->label('Guru')->sortable()->searchable(),
                TextColumn::make('day')->label('Hari'),
                TextColumn::make('start_time')->label('Jam'),
            ])
            ->filters([
                // Filter bawaan Filament agar admin mudah mencari data
                SelectFilter::make('classroom')->relationship('classroom', 'name'),
                SelectFilter::make('teacher')->relationship('teacher', 'name'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
