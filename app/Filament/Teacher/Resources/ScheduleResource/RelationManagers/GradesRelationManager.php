<?php

namespace App\Filament\Teacher\Resources\ScheduleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use App\Models\ClassStudent;
use App\Models\Grade;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class GradesRelationManager extends RelationManager
{
    protected static string $relationship = 'grades';
    protected static ?string $title = 'Daftar Nilai Siswa';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('score')
                ->required()
                ->numeric(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('score')
            ->columns([
                TextColumn::make('student.name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('student.nidn')
                    ->label('NIS'),

                // FITUR KEREN: Edit langsung di tabel
                TextInputColumn::make('score')
                    ->label('Nilai')
                    ->rules(['numeric', 'min:0', 'max:100'])
                    ->type('number'),
                    
                TextInputColumn::make('notes')
                    ->label('Catatan Guru'),
            ])
            ->headerActions([
                // TOMBOL UNTUK GENERATE DATA NILAI
                Tables\Actions\Action::make('create_grade_sheets')
                    ->label('Buat Lembar Nilai')
                    ->icon('heroicon-o-arrow-path')
                    ->action(function () {
                        $schedule = $this->getOwnerRecord();
                        
                        // 1. Ambil semua siswa yang ada di kelas & tahun ajaran jadwal ini
                        $studentIds = ClassStudent::where('classroom_id', $schedule->classroom_id)
                            ->where('academic_year_id', $schedule->academic_year_id)
                            ->pluck('student_id');

                        $count = 0;
                        foreach ($studentIds as $studentId) {
                            // 2. Buat data nilai default (0) jika belum ada
                            $grade = Grade::firstOrCreate([
                                'schedule_id' => $schedule->id,
                                'student_id' => $studentId,
                            ], [
                                'score' => 0,
                                'notes' => '-'
                            ]);
                            
                            if ($grade->wasRecentlyCreated) $count++;
                        }
                        
                        Notification::make()
                            ->title("$count Siswa ditambahkan ke lembar nilai")
                            ->success()
                            ->send();
                    })
            ])
            ->actions([]) 
            ->bulkActions([]);
    }
}