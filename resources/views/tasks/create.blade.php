@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yeni Görev Ekle</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Başlık:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Açıklama (İsteğe Bağlı):</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="reminder_at">Hatırlatıcı Tarihi ve Saati (İsteğe Bağlı):</label>
                <input type="datetime-local" id="reminder_at" name="reminder_at" value="{{ old('reminder_at') }}">
                @error('reminder_at')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            {{-- Görev hangi listeye ait olacak? Şimdilik gizli tutuyoruz, ileride seçilebilir yapacağız. --}}
            {{-- <input type="hidden" name="todolist_id" value="1"> --}}

            <button type="submit">Görevi Ekle</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="back-link">Görev Listesine Geri Dön</a>
    </div>
@endsection