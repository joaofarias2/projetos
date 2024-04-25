@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add Task!</a>
    </div>   
    
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div> 
    @empty
        <div>
            <h2>No tasks found</h2>
        </div>       
    @endforelse   

   @if ($tasks->count())
        <nav class="mt-4">
            {{$tasks->links()}}
        </nav>       
   @endif
@endsection

