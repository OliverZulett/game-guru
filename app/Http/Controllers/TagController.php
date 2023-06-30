<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->getAllTags();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $this->tagService->createTag($data);
        return Redirect::route('tags')->with('status', 'tag-created');
    }

    public function edit($id)
    {
        $tag = $this->tagService->getTagById($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $this->tagService->updateTag($id, $data);
        return Redirect::route('tags')->with('status', 'tag-updated');
    }

    public function destroy($id)
    {
        $this->tagService->deleteTag($id);
        return Redirect::route('tags')->with('status', 'tag-deleted');
    }
}
