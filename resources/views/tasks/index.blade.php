@extends('layouts.app') @section('content') <div class="container">
        <h1>Yapılacaklar Listesi</h1>

        <a href="{{ route('tasks.create') }}" class="add-task-link">Yeni Görev Ekle</a>

        @if ($tasks->isEmpty())
            <p class="no-tasks">Henüz hiç görev yok!</p>
        @else
            <ul>
                @foreach ($tasks as $task)
                    <li class="{{ $task->is_completed ? 'completed' : '' }}">
                        <span>{{ $task->title }}</span>
                        @if ($task->description)
                            <small style="margin-left: 10px; color: #666;">({{ $task->description }})</small>
                        @endif
                        @if ($task->reminder_at)
                            <small style="margin-left: 10px; color: #888;">(Hatırlatıcı: {{ $task->reminder_at->format('d.m.Y H:i') }})</small>
                        @endif

                        <div class="task-actions">
                            {{-- Görev durumu güncelleme formu --}}
                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_completed" value="{{ $task->is_completed ? '0' : '1' }}">
                                <input type="checkbox"
                                       class="task-checkbox"
                                       onchange="this.form.submit()"
                                       {{ $task->is_completed ? 'checked' : '' }}>
                            </form>

                            {{-- Görev düzenleme linki --}}
                            <a href="{{ route('tasks.edit', $task) }}" class="edit-button" style="margin-left: 5px;">Düzenle</a>

                            {{-- Görev silme formu --}}
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Bu görevi silmek istediğinize emin misiniz?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Sil</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection