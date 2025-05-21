<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Group;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        $groups = Group::all(); // Tüm grupları al

        // view'e hem görevleri hem de grupları aktar
        return view('tasks.index', compact('tasks', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            $groups = Group::all(); // Tüm grupları al
            return view('tasks.create', compact('groups')); // Grupları view'e aktar
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla eklendi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Şimdilik boş bırakıyoruz
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Şimdilik boş bırakıyoruz
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $task->update([
            'is_completed' => $request->input('is_completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Görev durumu güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) // Task modelini parametre olarak alıyoruz
    {
        // Görevi veritabanından sil
        $task->delete();

        // Görev silindikten sonra görev listesi sayfasına geri yönlendir
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla silindi!');
    }
}