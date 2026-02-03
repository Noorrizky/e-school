<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\ScheduleResource\Pages;
use App\Filament\Teacher\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;
    
    // Ganti icon biar beda
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Jadwal Mengajar Saya';

    // FILTER WAJIB: Hanya tampilkan jadwal milik guru yang sedang login
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('teacher_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        // Form kita kosongkan saja atau buat ReadOnly karena Guru hanya View
        return $form->schema([]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('academicYear.name')->label('Tahun Ajaran'),
                TextColumn::make('classroom.name')->label('Kelas')->searchable(),
                TextColumn::make('subject.name')->label('Mapel')->searchable(),
                TextColumn::make('day')->label('Hari'),
                TextColumn::make('start_time')->label('Jam'),
            ])
            ->actions([
                // Kita ganti tombol Edit jadi "Input Nilai" nanti
                Tables\Actions\ViewAction::make()->label('Detail & Nilai'),
            ])
            ->bulkActions([]); // Hapus bulk action delete agar aman
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            // Kita arahkan create ke index saja karena guru tidak boleh buat jadwal
            'view' => Pages\ViewSchedule::route('/{record}'),
        ];
    }
    public static function getRelations(): array
    {
        return [
            RelationManagers\GradesRelationManager::class,
        ];
    }
}