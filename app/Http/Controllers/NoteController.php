<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\DummyUser;
use App\Models\Note;
use App\Models\Service;
use App\Models\User;
use App\Notifications\NoteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;

class NoteController extends Controller
{
    //
    public function store(StoreNoteRequest $request)
    {

        $dummy_user = DummyUser::find(Cookie::get("dummy_user_id"));



        $note =  $dummy_user->notes()->create([
            "note" => $request->note,
            "service_id" => $request->service_id,

        ]);

        $permissions = [
            'view notes',
            'delete notes',


        ];
        $users = User::permission($permissions)->get();

        Notification::send($users, new NoteNotification($note));

        return response()->json(["message" => __("note created successfully")]);
    }


    public function timeline($service_id)
    {
        $service = Service::find($service_id);

        $notes = $service->notes()->orderBy('updated_at', 'desc')->paginate(5)->withPath("/service/{$service->id}");

        return view("dummyUser.notes.timeline", ["notes" => $notes]);
    }
    public function admin_noteIndex(Request $request)
    {
        $this->authorize("view notes");
        $service_filter = null;
        if ($request->query("service_filter")) {
            Service::findOrFail($request->query("service_filter"));
            $service_filter = $request->query("service_filter");
        }
        return view("admin.notes.index", compact("service_filter"));
    }


    public function admin_noteList(Request $request)
    {
        $this->authorize("view notes");
        if ($request->query("service_filter")) {

            $notes = Service::find($request->query("service_filter"))->notes;
        } else {
            $notes = Note::all();
        }


        //----------------------------------------------------------------
        // this is because datatable not allow for large number of records
        //------------------------------------------------------------------
        // لازم اشيلها بعد ما اخد الترخيص
        //------------------------------------------------------------------

        $notes = $notes->take(500);




        return DataTables::of($notes)
            ->addIndexColumn()
            ->addColumn('note', function (Note $note) {
                return $note->note;
            })
            ->addColumn('name', function (Note $note) {
                return $note->dummyUser->name;
            })
            ->addColumn('phone', function (Note $note) {
                return $note->dummyUser->phone;
            })
            ->addColumn('service', function (Note $note) {
                
                $service = $note->service;
                if($service){

                    return '   <a href="' . route("service.show", [$service->id]) . '" target="_blank"
                        class="text-dark text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
            
                            ' . $service->title . '
                      
        
        
                    </a>';
                }
                return "";
          
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.notes.actions', compact('row'))->render();
            })
            ->rawColumns(['actions', "service"])
            ->make(true);
    }


    public function destroy(Note $note)
    {
        $this->authorize("delete notes");
        $note->delete();


        return response()->json(['status' => 200, "message" => __("The note deleted successfully")]);
    }
}
