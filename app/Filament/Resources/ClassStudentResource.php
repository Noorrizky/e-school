<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassStudentResource\Pages;
use App\Filament\Resources\ClassStudentResource\RelationManagers;
use App\Models\ClassStudent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class ClassStudentResource extends Resource
{
    protected static ?string $model = ClassStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Penempatan Siswa';
    protected static ?string $modelLabel = 'Siswa Kelas';
    protected static ?string $navigationGroup = 'Akademik';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('academic_year_id')
                    ->relationship('academicYear', 'name')
                    ->label('Tahun Ajaran')
                    ->default(fn () => \App\Models\AcademicYear::where('is_active', true)->first()?->id) // Auto pilih tahun aktif
                    ->required(),

                Select::make('classroom_id')
                    ->relationship('classroom', 'name')
                    ->label('Kelas')
                    ->required(),

                Select::make('student_id')
                    ->relationship('student', 'name')
                    // Filter: Hanya tampilkan user role student
                    ->options(fn () => \App\Models\User::where('role', 'student')->pluck('name', 'id'))
                    ->label('Siswa')
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('academicYear.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListClassStudents::route('/'),
            'create' => Pages\CreateClassStudent::route('/create'),
            'edit' => Pages\EditClassStudent::route('/{record}/edit'),
        ];
    }
}
