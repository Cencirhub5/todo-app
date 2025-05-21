@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grup: {{ $group->name }}</h1>

        {{-- Başarı mesajı --}}
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <h3>Listeler</h3>
        {{-- İleride bu gruptaki listeleri burada göstereceğiz --}}
        @if ($group->todolists->isEmpty())
            <p>Bu grupta henüz hiç liste yok.</p>
        @else
            <ul>
                @foreach ($group->todolists as $todolist)
                    <li>
                        <a href="{{ route('todolists.show', $todolist) }}">{{ $todolist->name }}</a>
                        {{-- Liste düzenleme ve silme butonları buraya gelecek --}}
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('todolists.create', ['group_id' => $group->id]) }}" class="add-task-link" style="background-color: #17a2b8;">Yeni Liste Ekle</a>

        <hr style="margin: 30px 0;">

        <h3>Bu Grubun Görevleri (Henüz Bir Listeye Ait Olmayanlar)</h3>
        {{-- Bu gruba ait olup henüz bir listeye atanmamış görevleri göstereceğiz --}}
        @php
            // Group modelinde Todolist modeline ve Todolist modelinden Task modeline hasMany ilişkileri olmalı.
            // Bu kısımda, doğrudan bu gruba bağlı görevleri (yani todolist_id'si null olanları) göstermeliyiz.
            // Bu ilişkiler henüz kurulmadığı için Task::where... kullanıyoruz.
            // Daha sonra Task modeline 'group_id' eklemeyi düşünebiliriz veya filtreleme yapabiliriz.
            // Şimdilik, bu gruptaki listelere ait tüm görevleri veya bağımsız görevleri gösterelim.

            // Mevcut todolists ilişkisini kullanarak, bu gruba ait tüm listelerdeki görevleri alalım
            $tasksInGroupLists = collect();
            foreach ($group->todolists as $todolist) {
                $tasksInGroupLists = $tasksInGroupLists->merge($todolist->tasks);
            }
        @endphp

        @if ($tasksInGroupLists->isEmpty())
            <p>Bu gruptaki listelerde henüz hiç görev yok.</p>
        @else
            <ul>
                @foreach ($tasksInGroupLists as $task)
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


        <a href="{{ route('tasks.index') }}" class="back-link">Tüm Görevlere Geri Dön</a>
    </div>
@endsection