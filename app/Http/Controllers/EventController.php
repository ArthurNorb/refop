<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();
        $sortDirection = 'desc';

        if ($request->filter === 'futuros') {
            $query->where('event_datetime', '>=', now());
            $sortDirection = 'asc';
        } elseif ($request->filter === 'passados') {
            $query->where('event_datetime', '<', now());
        }

       $events = $query->orderBy('event_datetime', $sortDirection)->paginate(10);

        $sortedEvents = $events->sortBy(function ($event) {
            return abs(Carbon::parse($event->event_datetime)->diffInSeconds(now()));
        });

        return view('eventos.index', ['events' => $sortedEvents]);
    }

    public function show(Event $event)
    {
        return view('eventos.show', compact('event'));
    }
    
    // --- MÉTODOS DE ADMIN ---

    public function create()
    {
        if (!auth()->user()->is_admin) abort(403);
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) abort(403);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location_name' => 'required|string|max:255',
            'event_datetime' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }
    
    public function edit(Event $event)
    {
        if (!auth()->user()->is_admin) abort(403);
        return view('eventos.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        if (!auth()->user()->is_admin) abort(403);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location_name' => 'required|string|max:255',
            'event_datetime' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        if ($request->hasFile('image')) {
            // Apaga a imagem antiga se existir
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }
        
        $event->update($data);

        return redirect()->route('eventos.show', $event)->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        if (!auth()->user()->is_admin) abort(403);
        
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }
}