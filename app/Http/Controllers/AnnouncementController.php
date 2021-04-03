<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcement = Announcement::all();
        return view('announcement.index', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncementRequest $request)
    {
        $request->validate([
            'title' => [
                'required', 'string',
            ],
            'content' => [
                'required', 'string'
            ],
            'image_path' => [
                'required', 'mimes:jpg,png,jpeg,gif,svg'
            ],
        ]);

        $request->image_path->move('storage/announcement', $request->file('image_path')->getClientOriginalName());
        $announcement = new Announcement;
        $announcement->title = $request['title'];
        $announcement->content = $request['content'];
        $announcement->image_path = '/storage/announcement/' . $request->file('image_path')->getClientOriginalName();
        $announcement->save();
        return redirect()->route('announcement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
        return view('announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
        return view('announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //
        $request->validate([
            'title' => [
                'required', 'string',
            ],
            'content' => [
                'required', 'string'
            ],
            'image_path' => [
                'required', 'mimes:jpg,png,jpeg,gif,svg'
            ],
        ]);
        if ($request->image_path) {
            $path = public_path() . $announcement->image_path;
            File::delete($path);
        }
        $request->image_path->move('storage/announcement', $request->file('image_path')->getClientOriginalName()); //to move the update file into storage
        $announcement->title = $request['title']; //get the updated title
        $announcement->content = $request['content']; //get the updated content
        $announcement->image_path = '/storage/announcement/' . $request->file('image_path')->getClientOriginalName(); //get the updated image path
        $announcement->update(); //update into database
        return redirect()->route('announcement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
        $path = public_path() . $announcement->image_path;
        File::delete($path);
        $announcement->delete();
        return redirect()->route('announcement.index');
    }
}
