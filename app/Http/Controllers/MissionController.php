<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    public function createMission(Request $request)
    {
        $mission = new Mission();
        $user = auth()->user();

        $mission->teacher_id = $user->teacher->id;
        $mission->title = $request->title;
        $mission->category = $request->category;
        $mission->description = $request->description;
        $mission->points = $request->point;
        
        // $mission->due_date = $request->deadline;
        $date = $request->input('date');
        $time = $request->input('time');
        $mission->due_date = $date . ' ' . $time;

        $path = 'default-mission.jpg';
        $mission->image_path = $path;
        $mission->save();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->storeAs('images/'.$mission->id, 'picture', 'public');
            $mission->image_path = $path;
            $mission->save();
        }


        return redirect('/mission');
    }

    public function submissionAccept(Request $request)
    {
        $submission = Submission::find($request->id);
        $submission->status = 'accepted';
        $submission->comment = 'Submission kamu sudah diterima. Selamat yaa..';
        $submission->save();

        // delete in ongoing
        $submission->student->ongoingMissions()->detach($submission->mission);

        // add to completed
        $submission->student->completedMissions()->attach($submission->mission);

        // add point to student
        $submission->student->points += $submission->mission->points;

        $submission->student->save();

        return redirect('/detail-mission?mission=' . $submission->mission->id);
    }

    public function submissionReject(Request $request)
    {
        $submission = Submission::find($request->id);
        $submission->status = 'rejected';
        $submission->comment = 'Submission kamu ditolak. Coba lagi yaa..';
        $submission->save();

        // delete in ongoing
        $submission->student->ongoingMissions()->detach($submission->mission);

        // add to failed
        $submission->student->failedMissions()->attach($submission->mission);

        return redirect('/detail-mission?mission=' . $submission->mission->id);
    }

    public function submitMission(Request $request)
    {
        // if deadline is passed
        $mission = Mission::find($request->mission_id);
        if($mission->due_date < now()){
            return redirect()->back()->withErrors([
                "message" => "Deadline sudah lewat"
            ]);
        }

        $submission = Submission::where('student_id', $request->student_id)
            ->where('mission_id', $request->mission_id)
            ->first();
        // if from failed submission
        if($submission){
            // check in ongoing and delete
            $submission->student->ongoingMissions()->detach($submission->mission);

            // check in failed and delete
            $submission->student->failedMissions()->detach($submission->mission);

            if($submission){
                Storage::disk('public')->delete($submission->file_path);
                $submission->delete();
            }
        }

        $submission = new Submission();
        $submission->student_id = $request->student_id;
        $submission->mission_id = $request->mission_id;
        $submission->status = 'pending';
        $submission->comment = 'Submission kamu sedang di review. Mohon tunggu yaa..';

        $path = 'default-submission.jpg';
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $image = $request->file('image');
            $submission->file_path = $path;
            $submission->save();
            $path = $image->storeAs('images/mission/'.$submission->id, 'picture.'.$extension, 'public');
        } else{
            return redirect()->back()->withErrors([
                "message" => "Image is required"
            ]);
        }
        $submission->file_path = $path;
        $submission->save();

        // add to ongoing
        $submission->student->ongoingMissions()->attach($submission->mission);

        return redirect('/mission');    
    }
}
