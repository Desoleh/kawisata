<?php

namespace App\Http\Controllers;

use App\Models\Mailbox;
use App\Models\MailboxFlag;
use App\Models\MailboxReceiver;
use App\Models\MailboxTmpReceiver;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToArray;

class MailboxController extends Controller
{
    private $parent_name;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailboxes = Mailbox::all();
        $positions = Position::all();
        // dd($positions, $mailboxes);
        return view('memointernal.index',compact('mailboxes','positions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'perihal' => 'required',
            'receiver_id' => 'required',
            'approver_id' => 'required',
            'body' => 'required',
        ]);

        $data = $request->all();
        // dd($data);

        $nip = Auth::user()->nip;
        $positions = Position::where('holder_id',$nip)->first();
        $drafter_id =$positions->position_id;

        $mailbox=new Mailbox();
        $mailbox->body=$data['body'];
        $mailbox->perihal=$data['perihal'];
        $mailbox->approver_id=$data['approver_id'];
        $mailbox->draft_created_at=Carbon::now();
        $mailbox->drafter_id=$drafter_id;
        $mailbox->save();

            foreach ($data ['receiver_id'] as $item => $value) {
                $data2 = array(
                    'mailbox_id'    =>  $mailbox->id,
                    'receiver_id'   =>  $data['receiver_id'][$item],
                );
                // dd($data2);
                    MailboxTmpReceiver::create($data2);

        return back()->with('success','Memo tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function show(Mailbox $mailbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailbox $mailbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mailbox $mailbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mailbox  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailbox $mailbox)
    {
        //
    }

    public function compose()
    {

        // $mailboxes = Mailbox::all();
        $positions = Position::orderBy('hierarchy')->get();

        return view('memointernal.compose',compact('positions'));
    }

    private function save($submit, $receiver_ids, $mailbox)
    {

            // We will save two records in tables mailbox_user_folder and mailbox_flags
            // for both the sender and the receivers
            // For the sender perspective the message will be in the "Sent" folder
            // For the receiver perspective the message will be in the "Inbox" folder


            // 1. The sender
            // save folder as "Sent" or "Drafts" depending on button
            // $mailbox_user_folder = new MailboxUserFolder();

            // $mailbox_user_folder->mailbox_id = $mailbox->id;

            // $mailbox_user_folder->user_id = $mailbox->sender_id;

            // if click "Draft" button save into "Drafts" folder
            if($submit == 2) {
            //     $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Drafts")->first()->id;
            // } else {
            //     $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Sent")->first()->id;
            // }

            // $mailbox_user_folder->save();

            // save flags "is_unread=0"
            // $mailbox_flag = new MailboxFlag();

            // $mailbox_flag->mailbox_id = $mailbox->id;

            // $mailbox_flag->user_id = $mailbox->sender_id;;

            // $mailbox_flag->is_unread = 0;

            // $mailbox_flag->is_important = 0;

            // $mailbox_flag->save();


            // 2. The receivers
            // if there are receivers and sent button clicked then save into flags, folders and receivers
            if($submit == 1) {

                foreach ($receiver_ids as $receiver_id) {

                    // save receiver
                    $mailbox_receiver = new MailboxTmpReceiver();

                    $mailbox_receiver->mailbox_id = $mailbox->id;

                    $mailbox_receiver->receiver_id = $receiver_id;

                    $mailbox_receiver->save();


                    // save folder as "Inbox"
                    // $mailbox_user_folder = new MailboxUserFolder();

                    // $mailbox_user_folder->mailbox_id = $mailbox->id;

                    // $mailbox_user_folder->user_id = $receiver_id;

                    // $mailbox_user_folder->folder_id = MailboxFolder::where("title", "Inbox")->first()->id;

                    // $mailbox_user_folder->save();


                    // save flags "is_unread=1"
                    // $mailbox_flag = new MailboxFlags();

                    // $mailbox_flag->mailbox_id = $mailbox->id;

                    // $mailbox_flag->user_id = $receiver_id;

                    // $mailbox_flag->is_unread = 1;

                    // $mailbox_flag->save();
                }
            } else {

                // save into tmp receivers
                foreach ($receiver_ids as $receiver_id) {

                    // save receiver
                    $mailbox_receiver = new MailboxTmpReceiver();

                    $mailbox_receiver->mailbox_id = $mailbox->id;

                    $mailbox_receiver->receiver_id = $receiver_id;

                    dd($mailbox_receiver);

                    $mailbox_receiver->save();
                }
            }
        }
    }
}
