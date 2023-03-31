<?php

namespace App\Http\Livewire;


use App\Facades\TaskServiceFacade as TaskService;
use Livewire\Component;

class TaskList extends Component
{
    public $tasks; // Store the pending tasks grouped by date
    protected $listeners = ['taskCompleted']; // Listen for the 'taskCompleted' event
    public $processing = false; // Indicates if a task is being marked as completed

    // Called when the component is mounted
    public function mount()
    {
        // Get the pending tasks grouped by date using TaskService
        $this->tasks = TaskService::getPendingTasksGroupedByDate();
    }

    // Marks a task as completed
    public function markAsCompleted($taskId)
    {
        $this->processing = true; // Set the processing flag to true
        TaskService::markAsCompleted($taskId); // Mark the task as completed using TaskService

        $this->emit('taskCompleted'); // Emit the 'taskCompleted' event
        $this->processing = false; // Set the processing flag to false

        // Flash a success message to the session
        session()->flash('success', 'Task marked as completed.');
    }


    // Render the component
    public function render()
    {   // Update the tasks list
        $this->tasks = TaskService::getPendingTasksGroupedByDate();
        return view('livewire.task-list');
    }

    // Called when the 'taskCompleted' event is emitted
    public function taskCompleted()
    {
        // Add logic to send an email for the completed task
    }

}
