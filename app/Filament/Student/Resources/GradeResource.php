<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\GradeResource\Pages;
use App\Models\Grade;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Transkrip Nilai';

    // SECURITY: Hanya tampilkan nilai milik siswa yang sedang login
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('student_id', Auth::id());
    }

    // Form kosongkan saja (karena tidak ada aksi edit)
    public static function form(Form $form): Form
    {
        return $form->schema([]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schedule.academicYear.name')
                    ->label('Tahun Ajaran')
                    ->sortable(),
                
                TextColumn::make('schedule.subject.name')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('schedule.classroom.name')
                    ->label('Kelas'),

                TextColumn::make('schedule.teacher.name')
                    ->label('Guru Pengampu'),

                TextColumn::make('score')
                    ->label('Nilai Akhir')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state >= 90 => 'success', // Hijau
                        $state >= 75 => 'warning', // Kuning
                        default => 'danger',       // Merah
                    })
                    ->sortable(),
                
                TextColumn::make('notes')
                    ->label('Catatan')
                    ->limit(30),
            ])
            ->actions([]) // Hapus semua aksi (Edit/View/Delete)
            ->bulkActions([]); // Hapus bulk actions
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
        ];
    }
    
    // Matikan fitur create
    public static function canCreate(): bool
    {
        return false;
    }
}