<?php

namespace AliSalehi\Task\Http\Controllers\Api;

use AliSalehi\Task\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use AliSalehi\Task\Repositories\TaskRepositoryInterface;
use AliSalehi\Task\Http\Controllers\Api\Requests\StoreRequest;
use AliSalehi\Task\Http\Controllers\Api\Resources\TaskResource;

class TaskController extends ApiController
{
    private TaskRepositoryInterface $taskRepository;
    
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
//        $this->authorize('manage');
        $this->taskRepository = $taskRepository;
    }
    
    public function index(Request $request): JsonResponse
    {
        $tasks = $this->getFilteredTasks($request);
        $paginator = TaskResource::toPaginator($tasks, $request);
        return $this->successResponse($paginator);
    }
    
    public function show(Task $task): JsonResponse
    {
        $data = TaskResource::make($this->taskRepository->find($task));
        return $this->successResponse($data);
    }
    
    public function store(StoreRequest $request): JsonResponse
    {
        $this->taskRepository->create($request->all());
        return $this->successResponse([], 'task added successfully');
    }
    
    public function update(Task $task, StoreRequest $request): JsonResponse
    {
        try {
            $this->taskRepository->update($task, $request->all());
            return $this->successResponse([], 'task updated successfully');
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse([], 'Task not found or updating failed.', Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy(Task $task): JsonResponse
    {
        try {
            $this->taskRepository->delete($task);
            return $this->successResponse([], 'success delete');
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse([], 'Task not found or deletion failed.', Response::HTTP_NOT_FOUND);
        }
    }
    
    private function getFilteredTasks(Request $request)
    {
        $status = $request->get('status');
        
        if ($status == 'completed') {
            return $this->taskRepository->getTasksByCompletionStatus();
        } elseif ($status == 'incomplete') {
            return $this->taskRepository->getTasksByInCompletionStatus();
        }
        
        return $this->taskRepository->all();
    }
}
