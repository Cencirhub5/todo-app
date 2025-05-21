<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            display: flex; /* Flexbox kullanarak yan yana düzenleme */
            min-height: 100vh; /* Minimum tam ekran yüksekliği */
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.2);
            flex-shrink: 0; /* Küçülmesini engelle */
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #eee;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a:hover {
            background-color: #555;
        }
        .sidebar ul li a.active {
            background-color: #007bff;
        }
        .sidebar ul li a i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .content {
            flex-grow: 1; /* Kalan alanı kapla */
            padding: 20px;
        }
        /* Başarı mesajı */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
        /* Hata mesajları (form doğrulaması için) */
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        /* Genel Form Stilleri */
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: calc(100% - 22px); padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        textarea { resize: vertical; min-height: 80px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #45a049; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .delete-button { background-color: #dc3545; } /* Kırmızı sil butonu */
        .delete-button:hover { background-color: #c82333; }
        .edit-button { background-color: #ffc107; color: #333; } /* Sarı düzenle butonu */
        .edit-button:hover { background-color: #e0a800; }
        .task-actions { display: flex; align-items: center; }
        .task-checkbox { margin-right: 10px; transform: scale(1.2); }
        li.completed { background: #d4edda; text-decoration: line-through; color: #555; }

        /* Font Awesome (ikonlar için) */
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css");
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Todo Uygulaması</h2>
        <ul>
            <li><a href="#" class="active"><i class="fas fa-sun"></i> Günüm</a></li>
            <li><a href="#"><i class="fas fa-star"></i> Önemli</a></li>
            <li>
                <a href="#"><i class="fas fa-tasks"></i> Görevler Grupları</a>
                {{-- Gruplar buraya dinamik olarak gelecek --}}
                <ul style="margin-left: 20px; margin-top: 5px;">
                    @foreach ($groups as $group)
                        <li>
                            <a href="{{ route('groups.show', $group) }}">
                                <i class="fas fa-folder"></i> {{ $group->name }}
                            </a>
                            <div style="display: inline-block; margin-left: 5px;">
                                {{-- Grup düzenleme butonu --}}
                                <a href="{{ route('groups.edit', $group) }}" style="color: yellow; font-size: 0.8em;"><i class="fas fa-edit"></i></a>
                                {{-- Grup silme formu --}}
                                <form action="{{ route('groups.destroy', $group) }}" method="POST" onsubmit="return confirm('Bu grubu ve içindeki tüm listeleri ve görevleri silmek istediğinize emin misiniz?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer; padding: 0; font-size: 0.8em;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('groups.create') }}"><i class="fas fa-plus-circle"></i> Yeni Grup Ekle</a></li>
        </ul>
    </div>

    <div class="content">
        {{-- Başarı mesajı buraya gelecek --}}
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        {{-- Sayfa içeriği buraya gelecek --}}
        @yield('content')
    </div>
</body>
</html>