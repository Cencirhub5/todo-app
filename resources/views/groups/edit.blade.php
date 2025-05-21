@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grup Düzenle: {{ $group->name }}</h1>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('groups.update', $group) }}" method="POST">
            @csrf
            @method('PATCH') <div>
                <label for="name">Grup Adı:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $group->name) }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Grup Güncelle</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="back-link">Ana Sayfaya Geri Dön</a>
    </div>
@endsection