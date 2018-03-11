@component('mail::message')
# Announcement Created

An announcement has been **created** with the following information: 

@component('mail::panel')
## Announcement Information: 
<b>Type: </b> {{$anc->type == 0 ? 'Cancelled' : 'Delayed'}}<br>
<b>Note: </b> {{$anc->note}}<br>
<b>Active Until: </b> {{$anc->until}}<br>
<b>Created By: </b> {{$user->name}}<br>
<b>Created At: </b> {{$anc->created_at}}<br>
<hr>
## Course information:
<b>Course: </b> {{$anc->lecture->course}} <br>
<b>Instructor: </b> {{$anc->lecture->instructor->name}} <br>
<b>Hall: </b> {{$anc->lecture->hall->device->room}} <br>
<b>Start: </b> {{$anc->lecture->start()->format('H:i')}} <br>
<b>End: </b> {{$anc->lecture->end()->format('H:i')}} <br>


@endcomponent

You can edit the announcement by clicking the following button.

@component('mail::button', ['url' => route('announcements.edit', ['id'=> $anc->id])])
Edit Announcement
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent