<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Task; // Task modelini de kullanacağız
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Bu metot normalde tüm grupları listeler, ancak biz bunları sol menüde gösteriyoruz.
        // İstersen burada ayrı bir grup yönetim sayfası da yapabiliriz.
        // Şimdilik boş bırakalım veya sadece anasayfaya yönlendirelim.
        $groups = Group::all();
        $tasks = Task::all(); // Ana sayfada da görevleri göstermek için
        return view('tasks.index', compact('groups', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Yeni grup oluşturma formunu gösteren view'i döndür
        $groups = Group::all(); // Sol menü için
        return view('groups.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Gelen isteği doğrula
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name', // Grup adı zorunlu, metin ve benzersiz olmalı
        ]);

        Group::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Yeni grup başarıyla eklendi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        // Belirli bir gruba ait görevleri veya listeleri göstermek için kullanılır
        // Bu grup altındaki tüm listeleri ve o listelere ait görevleri alacağız.
        // Todolist modelinde 'hasMany' ilişkisi kuracağız.
        $groups = Group::all(); // Sol menü için
        return view('groups.show', compact('group', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $groups = Group::all(); // Sol menü için
        return view('groups.edit', compact('group', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $group->id, // Güncelleme yaparken kendi adını göz ardı et
        ]);

        $group->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Grup başarıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete(); // İlişkili listeler ve görevler cascade ile silinecek

        return redirect()->route('tasks.index')->with('success', 'Grup ve ilişkili tüm içerikleri başarıyla silindi!');
    }
}